<?php 	

	class Admin_model extends CI_Model{

		public function __construct(){

			$this->load->database();

		}

		public function findContent($table, $id = null){

			if (!empty($id)) {

				$query = $this->db->get_where($table, array('id' => $id));
				return $query->row();

			} else {

				$query = $this->db->get($table);
				return $query->result_array();

			}
			

		}

		public function findContentPoints($page_id = null){


			if (!empty($page_id)) {

				$query = $this->db->get_where('points', array('page_id' => $page_id));
				return $query->result_array();

			} else {

				$query = $this->db->get('points');
				return $query->result_array();

			}
			

		}

	}