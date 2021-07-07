<?php

class Upload extends CI_Controller {


        public function index($table = null, $id = null)
        {       
                if (!$this->user_model->isLoggedIn()) {
                                        
                redirect('admin/login');

                } else {
                        $data = [];
                        $data['rooms'] = $this->room_model->findAllRooms();

                        $this->load->view('admin/templates/header');
                        $this->load->view('admin/templates/navigation', $data);
                        $this->load->view('image_upload/upload_form', array('error' => ' ', 'table' => $table, 'id' => $id ));
                        $this->load->view('admin/templates/footer');

                }
        }

        public function do_upload()
        {

                if (!$this->user_model->isLoggedIn()) {
                                        
                        redirect('admin/login');

                } else {

                $config['upload_path']          = 'assets/images/posts';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 5000;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfile'))
                        {
                                $error = array('error' => $this->upload->display_errors());
                                $data = [];
                                $data['rooms'] = $this->room_model->findAllRooms();

                                $this->load->view('admin/templates/header');
                                $this->load->view('admin/templates/navigation', $data);
                                $this->load->view('image_upload/upload_form', $error);
                                $this->load->view('admin/templates/footer');
                        }
                else
                        {       

                        if ($this->input->post('table') == 'pages') {
                                $this->page_model->insertImage($this->input->post('id'), $this->upload->data('file_name'));
                                $page = $this->page_model->findPage($this->input->post('id'));
                                $page_name = $page->name;

                                $this->session->set_flashdata('image_added', 'Фото было успешно добавлено');

                                redirect('pages/edit/'. $page_name);

                        } else {
                                $this->room_model->insertImage($this->input->post('id'), $this->upload->data('file_name'));
                                $room = $this->room_model->findRoomById($this->input->post('id'));
                                $room_type = $room->type;

                                $this->session->set_flashdata('image_added', 'Фото было успешно добавлено');
                                

                                redirect('rooms/edit/'. $room_type);
                        }

                                

                                

                                
                        }

                }
        }


}