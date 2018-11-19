<?php 

	class Users extends CI_Controller{
		public function register(){
			$data['title'] = "Sign up";

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');	
			$this->form_validation->set_rules('password2', 'Confirm password', 'required|matches[password]');


			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				// Encrypt Password

				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				// Set a message before red

				$this->session->set_flashdata('user_registered', 'You are successfuly registered and can log in');

				redirect('posts');
			}

		}

		public function login(){
			$data['title'] = "Log in";

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');


			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {

				// Set a message before red

				// Get the username
				$username = $this->input->post('username');
				// Get the password
				// $password = md5($this->input->post('password'));
				$password = $this->input->post('password');
				// Get the user_id through the function
				$user_id = $this->user_model->login_user($username, $password);

				if ($user_id) {
					// Set a session and redirect
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true						
					);

					$this->session->set_userdata($user_data);

					$this->session->set_flashdata('login_success', 'Login is successful');

					redirect('posts');
				} else {

					$this->session->set_flashdata('login_failed', 'Login is invalid');
					redirect('users/login');
				}

				
			}

		}

		public function logout(){

			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('user_id');

			$this->session->set_flashdata('logout_success', 'Logged you out');
			redirect('posts');

		}

		public function check_username_exists($username){

			$this->form_validation->set_message('check_username_exists', 'that username is taken');

			if ($this->user_model->check_username_exists($username)) {
				return true;
			} else {
				return false;
			}
		}

		public function check_email_exists($email){

			$this->form_validation->set_message('check_email_exists', 'that email is taken');

			if ($this->user_model->check_email_exists($email)) {
				return true;
			} else {
				return false;
			}
		}
	}