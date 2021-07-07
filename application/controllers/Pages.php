<?php

class Pages extends CI_Controller
{

	public function view($page = "home")
	{
		$data = null;
		$data['error'] = false;

		switch ($page) {
			case 'rooms':
				$data['title'] = 'Типы Комнат';
				$data['page'] = $this->page_model->findPageContent($page);
				break;

			case 'about':
				$data['title'] = 'Про нас';
				$data['is_slider'] = true;
				$data['page'] = $this->page_model->findPageContent($page);
				break;

			case 'contacts':
				$data['title'] = 'Наши Контакты';
				$data['is_slider'] = false;
				$data['page'] = $this->page_model->findPageContent($page);
				break;

			case 'kitchen':
				$data['title'] = 'Кухня';
				$data['is_slider'] = true;
				$data['page'] = $this->page_model->findPageContent($page);
				break;

			case 'territory':
				$data['title'] = 'Территория';
				$data['is_slider'] = true;
				$data['page'] = $this->page_model->findPageContent($page);
				break;

			case 'occasions':
				$data['title'] = 'Мероприятия';
				$data['is_slider'] = true;
				$data['page'] = $this->page_model->findPageContent($page);
				break;

			case 'advantages':
				$data['title'] = 'Преимущества';
				$data['page'] = NULL;
				break;

			case 'gallery':
				$data['title'] = 'Галерея';
				$data['page'] = $this->page_model->findPageContent($page);
				break;

			case 'steamroom':
				$data['title'] = "Баня";
				$data['is_slider'] = true;
				$data['page'] = $this->page_model->findPageContent($page);
				break;
			
			case 'menu':
				$data['title'] = "Меню";
				$data['is_slider'] = true;
				$data['page'] = $this->page_model->findPageContent($page);
				break;

			case 'home':
				$data['title'] = NULL;
				$data['is_slider'] = false;
				$data['page'] = $this->page_model->findPageContent($page);
				break;
			default:
				$data['error'] = true;
				break;
		}

		if (!$data['error']) {
			// Load header
			$this->load->view('templates/header');

			if (is_object($data['page']) && !empty($data['page'])) {
				$page_id = (int)$data['page']->id;
			} else {
				$page_id = (int)$data['page']['id'];
			}

			$data['points'] = $this->page_model->findPagePointsByPageID($page_id);

			if ($page) {
				$data['images'] = $this->sortArrayImages($this->page_model->findPageImagesByPageID($page_id));
			}



			// Load the room page or the index page 
			if (
				$page == 'rooms'
				|| $page == 'home'
				|| $page == 'advantages'
				|| $page == 'gallery'
				|| $page == 'contacts'
				|| $page == 'steamroom'
				|| $page == 'menu'
			) {
				// Load the page content from the database
				$this->load->view('pages/' . $page, $data);
			} else {
				$this->load->view('pages/index', $data);
			}

			// Load footer
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
			$this->load->view('templates/error_page');
			$this->load->view('templates/footer');
		}
	}

	public function edit($page_name)
	{

		if (!$this->user_model->isLoggedIn()) {

			redirect('admin/login');
		} else {

			$data = [
				'title' => 'Редактировать:',
				'page' => $this->page_model->findPageContent($page_name),
				'rooms' => $this->room_model->findAllRooms()
			];

			$data['points'] = $this->page_model->findPagePointsByPageID($data['page']->id);
			$data['images'] = $this->page_model->findPageImagesByPageID($data['page']->id);

			$this->load->view('admin/templates/header');
			$this->load->view('admin/templates/navigation', $data);
			$this->load->view('admin/edit_page', $data);
			$this->load->view('admin/templates/footer');
		}
	}

	public function delete_image($image_id)
	{
		if (!$this->user_model->isLoggedIn()) {

			redirect('admin/login');
		} else {

			$page_name = $this->page_model->findPageByImageId($image_id)->name;

			$this->page_model->deleteImage($image_id);

			$this->session->set_flashdata('image_deleted', 'Удаление успешно');

			redirect('pages/edit/' . $page_name);
		}
	}

	public function edit_point($point_id)
	{

		if (!$this->user_model->isLoggedIn()) {

			redirect('admin/login');
		} else {

			$point_content = $this->input->post('point_content');

			$page_name = $this->input->post('page_name');

			$page_id = $this->input->post('page_id');

			if (!empty($point_content)) {

				$this->page_model->update_point($point_content, $point_id, $page_id);

				$this->session->set_flashdata('point_edited', 'Изменение успешно');
			} else if (empty($point_content)) {

				$this->session->set_flashdata('point_error', 'Введите другое название оссобенности.');
			}

			redirect('pages/edit/' . $page_name);
		}
	}

	public function delete_point($point_id, $page_name)
	{

		if (!$this->user_model->isLoggedIn()) {

			redirect('admin/login');
		} else {


			$this->page_model->delete_point($point_id);

			$this->session->set_flashdata('point_deleted', 'Оссобенность удалена успешно');

			redirect('pages/edit/' . $page_name);
		}
	}

	public function add_point($page_id)
	{

		if (!$this->user_model->isLoggedIn()) {

			redirect('admin/login');
		} else {

			$point_content = $this->input->post('point_content');

			$page_name = $this->input->post('page_name');

			if (!empty($point_content)) {

				$this->page_model->add_point($page_id, $point_content);

				$this->session->set_flashdata('point_added', 'Оссобеность была успешно добавлена');
			} else if (empty($point_content)) {
				$this->session->set_flashdata('point_error', 'Введите оссобенность перед добавлением.');
			}



			redirect('pages/edit/' . $page_name);
		}
	}

	public function edit_describtion($page_id)
	{

		if (!$this->user_model->isLoggedIn()) {

			redirect('admin/login');
		} else {

			$describtion = $this->input->post('describtion');

			$page_name_rus = $this->input->post('page_name_rus');

			$page_name = $this->input->post('page_name');

			$this->page_model->edit_describtion($page_id, $describtion, $page_name, $page_name_rus);

			$this->session->set_flashdata('describtion_edited', 'Описание было успешно обновлено');

			redirect('pages/edit/' . $page_name);
		}
	}

	public function edit_image_order()
	{

		if (!$this->user_model->isLoggedIn()) {

			redirect('admin/login');
		} else {

			$image_id = (int)$this->input->post('image_id');

			$order = (int)$this->input->post('order');


			if (!is_null($this->input->post('page_name'))) {

				$type = "page_";

				$r_pr_id = $this->page_model->get_page_id_by_page_name($this->input->post('page_name'));

				$redirect_link = 'pages/edit/' . $this->input->post('page_name');
			} else if (!is_null($this->input->post('room_type'))) {

				$type = "room_";

				// echo "room_type: ".$this->input->post('room_type');

				$r_pr_id = $this->room_model->get_room_id_by_room_type($this->input->post('room_type'));

				$redirect_link = 'rooms/edit/' . $this->input->post('room_type');
			}

			// r_pr_id --> reference page/room id




			$image = (object)['id' => $image_id, 'order' => $order];

			if ($this->page_model->change_image_order($image, $type, $r_pr_id)) {

				redirect($redirect_link, 'refresh');
			} else {

				show_404();
			}
		}
	}

	public function sortArrayImages($images)
	{

		function sortByTheOrder($image1, $image2)
		{

			if ($image1['image_position'] == $image2['image_position']) return 0;
			return ($image1['image_position'] > $image2['image_position']) ? 1 : -1;
		}

		usort($images, 'sortByTheOrder');
		return $images;
	}
}
