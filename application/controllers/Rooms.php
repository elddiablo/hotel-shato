<?php
class Rooms extends CI_Controller
{

	public function show($room_type)
	{

		switch ($room_type) {
			case $room_type == 'standart':
				$data['title'] = 'Стандарт';
				break;

			case $room_type == 'standart_plus':
				$data['title'] = 'Стандарт+';
				break;

			case $room_type == 'semi_prem':
				$data['title'] = 'Полу-Люкс';
				break;

			case $room_type == 'prem':
				$data['title'] = 'Люкс';
				break;
			
			case $room_type == 'steamroom1':
				$data['title'] = 'Баня категории 1';
				break;
			
			case $room_type == 'steamroom2':
				$data['title'] = 'Баня категории 2';
				break;

			default:
				show_404();
				break;
		}


		$data['room'] = $this->room_model->findRoom($room_type);
		$room_id = $data['room']->id;
		
		$data['images'] = $this->sortArrayImages($this->room_model->findRoomImagesByRoomId($room_id));
		$data['is_slider'] = true;

		$this->load->view('templates/header');
		$this->load->view('rooms/show', $data);
		$this->load->view('templates/footer');
	}

	public function edit($room_type)
	{

		// if the form was not submitted, show the form

		$data = [
			'room' => $this->room_model->findRoom($room_type),
			'rooms' => $this->room_model->findAllRooms(),
			'title' => 'Редактировать:'
		];

		$data['images'] = $this->room_model->findRoomImagesByRoomId($data['room']->id);

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/navigation', $data);
		$this->load->view('admin/edit_room', $data);
		$this->load->view('admin/templates/footer');
	}

	public function edit_describtion($room_id)
	{

		if (!$this->user_model->isLoggedIn()) {

			redirect('admin/login');
		} else {

			$describtion = $this->input->post('describtion');

			$room_type = $this->input->post('room_type');

			$room = $this->room_model->findRoom($room_type);

			$this->room_model->edit($room_id, $describtion, $room->price, $room_type, $room->type_rus, $room->free_content, $room->not_free_content);

			$this->session->set_flashdata('describtion_edited', 'Описание было успешно обновлено');

			redirect('rooms/edit/' . $room_type);
		}
	}

	public function edit_price($room_id)
	{

		$room_price = $this->input->post('price');

		$room_type = $this->input->post('room_type');

		$room = $this->room_model->findRoom($room_type);

		$this->room_model->edit($room_id, $room->describtion, $room_price, $room_type, $room->type_rus, $room->free_content, $room->not_free_content);

		redirect('rooms/edit/' . $room_type);
	}

	public function edit_free_content($room_id)
	{

		$free_content = $this->input->post('free_content');

		$room_type = $this->input->post('room_type');

		$room = $this->room_model->findRoom($room_type);

		$this->room_model->edit($room_id, $room->describtion, $room->price, $room_type, $room->type_rus, $free_content, $room->not_free_content);

		redirect('rooms/edit/' . $room_type);
	}

	public function edit_not_free_content($room_id)
	{

		$not_free_content = $this->input->post('not_free_content');

		$room_type = $this->input->post('room_type');

		$room = $this->room_model->findRoom($room_type);

		$this->room_model->edit($room_id, $room->describtion, $room->price, $room_type, $room->type_rus, $room->free_content, $not_free_content);

		redirect('rooms/edit/' . $room_type);
	}

	public function delete_image($image_id)
	{

		if (!$this->user_model->isLoggedIn()) {

			redirect('admin/login');
		} else {

			$room = $this->room_model->findRoomByImageId($image_id);

			$this->room_model->deleteImage($image_id);

			$this->session->set_flashdata('image_deleted', 'Удаление успешно');

			redirect('rooms/edit/' . $room->type);
		}
	}

	protected function sortArrayImages($images)
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
