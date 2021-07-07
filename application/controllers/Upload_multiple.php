<?php 

	class Upload_multiple extends CI_Controller{

		public function index(){

			$table = $this->input->post('table');
			if ($table == 'pages') {
				$id = $this->input->post('page_id');
			} else {
				$id = $this->input->post('room_id');
			}

			$data = [

				'table' => $table,
				'id' => $id,
				'rooms' => $this->room_model->findAllRooms()

			];

			$this->load->view('admin/templates/header');
            $this->load->view('admin/templates/navigation', $data);
			$this->load->view('image_upload/upload_multiple', $data);
			$this->load->view('admin/templates/footer');

			

			

		}

		public function upload($table = null, $id = null)
		 {
		  sleep(3);
		  if($_FILES["files"]["name"] != '')
		  {
		   $output = '';
		   $config["upload_path"] = 'assets/img';
		   $config["allowed_types"] = 'gif|jpg|png';
		   
		   $this->upload->initialize($config);

		   for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
		   {
		    $_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
		    $_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
		    $_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
		    $_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
		    $_FILES["file"]["size"] = $_FILES["files"]["size"][$count];

		    // $this->image_model->checkIfImageExists();


		    if($this->upload->do_upload('file'))
		    {

		    	if ($table == 'pages') {
		    		$this->page_model->insertImage($id,$data["file_name"]);
		    	} else if($table == 'rooms'){
		    		$this->room_model->insertImage($id,$data["file_name"]);
		    	}
		     

		     $data = $this->upload->data();
		     $output .= '
		     <div class="col-md-3">
		      <img src="'.base_url().'assets/img/'.$data["file_name"].'" class="img-responsive img-thumbnail" />
		     </div>
		     ';
		    }
		   }
		   echo $output;   
		  }
		 }


	}