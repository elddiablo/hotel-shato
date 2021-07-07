<?php 

	class Phone extends CI_Controller {

		public function leavePhone(){



			$number = $this->security->xss_clean($this->input->post('phone'));
			$name = $this->security->xss_clean($this->input->post('name'));


			if (empty($number) || empty($name))
	            {
	                redirect('contacts');

	            } else {
				// Loading the Mail CodeIgniter library
				$this->load->library('email');

				// Email config
				$config['protocol'] = 'smtp';
				$config['charset'] = 'utf-8';
				$config['wordwrap'] = TRUE;
				$config['smtp_host'] = "mx1.mirohost.net";
				$config['smtp_user'] = "room@hotel-shato.od.ua";
				$config['smtp_pass'] = "XG1en6l4n7a7";
				$config['smtp_crypto'] = "ssl";
				$config['smtp_port'] = "465";
				

				// Setting the config
				$this->email->initialize($config);

				// Body of an Email
				$this->email->from('room@hotel-shato.od.ua', 'Сайт');
				$this->email->to('room@hotel-shato.od.ua');
				$this->email->subject('Служба Оставить телефон на Сайте');
				$this->email->message($name. ' оставил свой номер: '. $number);

				$this->email->send();

				redirect('Phone/success_page');

			}

			
			
		}

		/*
		public function leaveMessage(){


			
			$number = $this->security->xss_clean($this->input->post('phone'));
			$name = $this->security->xss_clean($this->input->post('name'));
			$message = $this->security->xss_clean($this->input->post('message'));
			$email = $this->security->xss_clean($this->input->post('email'));

			// Loading the Mail CodeIgniter library
			$this->load->library('email');

			// Email config
			$config['protocol'] = 'smtp';
			$config['charset'] = 'utf-8';
			$config['wordwrap'] = TRUE;
			$config['smtp_host'] = "mx1.mirohost.net";
			$config['smtp_user'] = "test@hotel-shato.od.ua";
			$config['smtp_pass'] = "27wC786hm69l";
			$config['smtp_crypto'] = "ssl";
			$config['smtp_port'] = "465";
			

			// Setting the config
			$this->email->initialize($config);

			// Body of an Email
			$this->email->from('room@hotel-shato.od.ua', 'Сайт');
			$this->email->to('room@hotel-shato.od.ua');
			$this->email->subject('Служба Запросить Бронь на Сайте');
			$this->email->message($name. ' оставил свой номер: '. $number. ' и запросил оставить бронь в сообщении: " '. $message . ' " ');

			$this->email->send();

			redirect('Phone/success_page');



			
			
		}
		*/

		public function success_page(){

				$data['message'] = "Ваша заявка принята! <br>Ожидайте звонка от наших менеджеров!";

				$this->load->view('templates/header');
				$this->load->view('phone/success', $data);
				$this->load->view('templates/footer');

			}

	}