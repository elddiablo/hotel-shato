<?php



class Admin extends CI_Controller
{



	public function index()
	{

		// Check if the user is not logged in.
		if (!$this->user_model->isLoggedIn()) {

			redirect('admin/login');
		} else {

			$data = 	[

				'title' => "Главная",
				'rooms' => $this->room_model->findAllRooms(),
				'pages' => $this->page_model->findAllPages()

			];

			$this->load->view('admin/templates/header');

			$this->load->view('admin/templates/navigation', $data);

			$this->load->view('admin/dashboard', $data);

			$this->load->view('admin/templates/footer');
		}
	}

	public function show($table)
	{

		// Check if Logged In
		if (!$this->user_model->isLoggedIn()) {
			redirect('admin/login');
		} else {

			$data['table'] = $table;
			$data['rooms'] = $this->room_model->findAllRooms();

			if ($table == 'pages') {

				$data['pages'] = $this->admin_model->findContent($table);
				$data['points'] = $this->admin_model->findContentPoints();
			} else if ($table == 'rooms') {

				$data['rooms'] = $this->admin_model->findContent($table);
			}




			$this->load->view('admin/templates/header');
			$this->load->view('admin/templates/navigation', $data);
			$this->load->view('admin/show', $data);
			$this->load->view('admin/templates/footer');
		}
	}

	public function login()
	{





		if ($this->user_model->isLoggedIn()) {

			redirect('admin/index');
			// header('location: http://hotel-shato.od.ua/admin/index');
			// echo base_url();

		} else {

			$this->form_validation->set_rules('username', 'Username', 'required');

			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() === FALSE) {

				$this->load->view('admin/templates/header');
				$this->load->view('admin/login');
				$this->load->view('admin/templates/footer');
			} else {
				// Get and Sanitize input 
				$password = $this->security->xss_clean($this->input->post('password'));
				$username = $this->security->xss_clean($this->input->post('username'));
				// Hash the given password

				// $password = $this->hashPassword($password);
				// Find a user_id if the hashedPassword and username matches
				$user_id = $this->user_model->login_user($username, $password);

				if ($user_id) {
					// Set a session and redirect
					$user_data = array(

						'user_id' => $user_id,
						'username' => $username

					);

					$this->session->set_userdata($user_data);


					redirect('admin/index');
					// redirect('http://hotel-shato.od.ua/admin/index');
				} else {

					$this->session->set_flashdata('login_failed', 'Login is invalid');
					redirect('admin/login');
					// redirect('http://hotel-shato.od.ua/admin/login');
				}
			}
		}
	}

	public function logout()
	{


		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');

		redirect('admin/login');
	}


	public function hashPassword($password)
	{
		// HAsh format
		$hash_format = "$2y$10$";

		// could be anything you want
		$salt = "peakyBlindersAreawesom";

		// Combining
		$hash_and_salt = $hash_format . $salt;

		// Putting new hashed password instead of the old one
		$password = crypt($password, $hash_and_salt);

		return $password;
	}
}
