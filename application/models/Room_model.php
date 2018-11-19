<?php 

	class Room_model extends CI_Model {
		
		public function __construct(){
			$this->load->database();
		}

		public function findAllRooms(){
			$query = $this->db->get('rooms');
			return $query->result_array();
		}

		public function findRoom($room_type){
			$query = $this->db->get_where('rooms', array('type' => $room_type));
			return $query->row();
		}

		public function get_room_id_by_room_type($room_type){

			$query = $this->db->query("SELECT * FROM rooms WHERE type='{$room_type}'");

			return $query->row()->id;

		}

		public function findRoomById($room_id){
			$query = $this->db->get_where('rooms', array('id' => $room_id));
			return $query->row();
		}


		public function findRoomImagesByRoomId($room_id, $limit = null){
			if ($limit) {
				$this->db->limit($limit);
				$query = $this->db->get_where('images', array('room_id' => $room_id));
			} else {
				$query = $this->db->get_where('images', array('room_id' => $room_id));
			}

			return $query->result_array();
		}

		public function edit($room_id, $describtion, $price, $room_type, $room_type_rus, $free_content, $not_free_content){

			$this->db->replace('rooms', array('id' => $room_id, 'describtion' => $describtion, 'price' => $price,'type' => $room_type, 'type_rus' => $room_type_rus, 'free_content' => $free_content, 'not_free_content' => $not_free_content));

		}

		public function findRoomByImageId($image_id){

			$query = $this->db->get_where('images', array('id' => $image_id));
			$image = $query->row();
			$room_id = $image->room_id;
			$room = $this->db->get_where('rooms', array('id' => $room_id));
			return $room->row();

		}


		public function insertImage($room_id, $img_name){
			
			$query = $this->db->get_where('images', array('room_id' => $room_id));

			$max_order = (int)0;

			if($query->num_rows() > 0){

				foreach ($query->result_array() as $image) {
					
					if((int)$image['image_position'] > $max_order){
						$max_order = (int)$image['image_position'];
					}

				}
			}

			$this->db->set('image_position', ($max_order + 1));

			$this->db->set('room_id', $room_id);

			$this->db->set('url', $img_name);

			$this->db->insert('images');
		}

		public function deleteImage($image_id){

			$image = $this->db->get_where('images', array('id' => $image_id));

			unlink(FCPATH.'assets/images/posts/'.$image->row()->url);

			$this->db->where('id', $image_id);
			
			$this->db->delete('images');
		}
	}