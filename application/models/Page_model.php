<?php 

	class Page_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}

		public function findPage($page_id){
			$query = $this->db->get_where('pages', array('id' => $page_id));
			return $query->row();
		}

		public function findAllPages(){
			$query = $this->db->get('pages');
			return $query->result_array();
		}

		public function findPageByImageId($image_id){
			$query = $this->db->get_where('images', array('id' => $image_id));
			$image = $query->row();
			$page_id = $image->page_id;
			$page = $this->db->get_where('pages', array('id' => $page_id));
			return $page->row();
		}

		public function findPageContent($page_name){
			$query = $this->db->get_where('pages', array('name' => $page_name));
			return $query->row();
		}

		public function findPagePointsByPageID($page_id){
			$query = $this->db->get_where('points', array('page_id' => $page_id));
			return $query->result_array();
		}

		public function findPageImagesByPageID($page_id, $limit = null){
			if ($limit) {
				$this->db->limit($limit);
				$query = $this->db->get_where('images', array('page_id' => $page_id));
			} else {
				$query = $this->db->get_where('images', array('page_id' => $page_id));
			}

			return $query->result_array();
		}
		public function insertImage($page_id, $img_name){



			$query = $this->db->get_where('images', array('page_id' => $page_id));

			$max_order = (int)0;

			if($query->num_rows() > 0){

				foreach ($query->result_array() as $image) {
				
					if((int)$image['image_position'] > (int)$max_order){
						$max_order = (int)$image['image_position'];
					}

				}

			}

			$this->db->set('image_position', ($max_order + 1));

			$this->db->set('page_id', $page_id);

			$this->db->set('url', $img_name);

			$this->db->insert('images');

		}

		public function deleteImage($image_id){
			
			$image = $this->db->get_where('images', array('id' => $image_id));


			unlink(FCPATH.'assets/images/posts/'.$image->row()->url);

			$this->db->where('id', $image_id);

			$this->db->delete('images');
		}

		public function update_point($point_content, $point_id, $page_id){
			$query = $this->db->get_where('points', array('page_id' => $page_id, 'id' => $point_id));
			$point = $query->row();
			$point_class = $point->icon_class;
			$this->db->replace('points', array('point_content' => $point_content, 'page_id' => $page_id, 'icon_class' => $point_class, 'id' => $point_id));
		}

		public function delete_point($point_id){
			$this->db->where('id', $point_id);
			$this->db->delete('points');
		}

		public function add_point($page_id, $point_content){

			$point = array('point_content' => $point_content, 'icon_class' => 'fas fa-check-square', 'page_id' => $page_id);

			$this->db->insert('points', $point);

		}

		public function edit_describtion($page_id, $describtion, $page_name, $page_name_rus){

			$this->db->replace('pages', array('id' => $page_id, 'text' => $describtion, 'name' => $page_name, 'name_rus' => $page_name_rus));

		}

		public function change_image_order($image, $type, $r_id){

			$response = $this->db->simple_query("UPDATE images SET image_position = {$image->order} WHERE ". $type ."id = {$r_id} AND id={$image->id}");
			return $response;
			

		}

		public function get_page_id_by_page_name($page_name){

			$query = $this->db->query("SELECT * FROM pages WHERE name='{$page_name}'");
			return $query->row()->id;

		}


	}