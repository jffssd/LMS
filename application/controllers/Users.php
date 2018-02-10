<?php
	class Users extends CI_Controller{


		public function __construct(){
			
			parent::__construct();

		}

		public function dashboard(){

			if(!$this->session->userdata('login')) {
				redirect('users/login');
			}
			$data['title'] = 'Dashboard';

			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidemenu');
			$this->load->view('users/dashboard', $data);
			$this->load->view('templates/footer');
		}

		public function profile(){

			if(!$this->session->userdata('login')) {
				redirect('users/login');
			}
			$data['title'] = 'Profile';

			$data['mensagens'] = $this->User_Model->get_mensagens_usuario($this->session->userdata('usuario_id'));
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidemenu');
			$this->load->view('users/profile', $data);
			$this->load->view('templates/footer');
		}

		// Register User
		public function register(){

			if($this->session->userdata('login')) {
				redirect('index');
			}

			$data['title'] = 'Cadastrar';

			$this->form_validation->set_rules('usuario', 'Usuario', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'E-mail', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('senha', 'Senha', 'required');
			$this->form_validation->set_rules('senha2', 'Confirme a Senha', 'matches[senha]');

			if($this->form_validation->run() === FALSE){

				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');

			}else{

				$senha_encriptada = md5($this->input->post('senha'));
				$permissao = 2;
				$status = 1;

				$this->User_Model->register($senha_encriptada, $permissao, $status);

				//Set Message
				$this->session->set_flashdata('user_registered', 'Você foi registrado e já pode conectar!');
				redirect('users/login');
			}
		}

		// Login do usuário
		public function login(){

			if($this->session->userdata('login')) {
				redirect('users/dashboard');
			}

			$data['title'] = 'Conectar-se';

			$this->form_validation->set_rules('usuario', 'Usuário', 'required');
			$this->form_validation->set_rules('senha', 'Senha', 'required');

			if($this->form_validation->run() === FALSE){

				//$this->load->view('templates/header');
				//$this->load->view('templates/navbar');
				//$this->load->view('templates/sidemenu');
				$this->load->view('users/login', $data);
				//$this->load->view('templates/footer');

			}else{

				// Obtém usuário e senha encriptada
				$usuario = $this->input->post('usuario');
				$senha_encriptada = md5($this->input->post('senha'));

				$usuario_id = $this->User_Model->login($usuario, $senha_encriptada);
				
				if ($usuario_id) {
					
					// Cria sessão
					$user_data = array(
								'usuario_id' => $usuario_id->id,
				 				'usuario' => $usuario,
				 				'email' => $usuario_id->email,
								'login' => true,
								'permissao' => $usuario_id->permissao,
								'imagem_perfil' => $usuario_id->imagem_perfil
				 	);

				 	$this->session->set_userdata($user_data);

					 $ip = $this->input->ip_address();
					 $id = $this->session->userdata('usuario_id');
					 
					 try {
		 
						 $this->User_Model->usuario_login_log($id, $ip);
		 
					 } catch (Exception $e) {
						 
					 }

					// Define mensagem
					$this->session->set_flashdata('user_loggedin', 'Bem vindo!.');
					redirect('users/dashboard');
				}else{
					$this->session->set_flashdata('login_failed', 'Login inválido!');
					redirect('users/login');
				}
			}
		}

		// log user out
		public function logout(){

			if(!$this->session->userdata('login')) {
				redirect('users/home');
			}
			// unset user data
			$ip = $this->input->ip_address();
			$id = $this->session->userdata('usuario_id');
			
			try {

				$this->User_Model->usuario_logout_log($id, $ip);

			} catch (Exception $e) {
				
			}
			$this->session->unset_userdata('login');
			$this->session->unset_userdata('usuario_id');
			$this->session->unset_userdata('usuario');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('permissao');
			$this->session->unset_userdata('imagem_perfil');

			//Set Message
			$this->session->set_flashdata('user_loggedout', 'You are logged out.');
			redirect(base_url());
		}

		// Check user name exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is already taken, Please choose a different one.');

			if ($this->User_Model->check_username_exists($username)) {
				return true;
			}else{
				return false;
			}
		}


		// Check Email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'This email is already registered.');

			if ($this->User_Model->check_email_exists($email)) {
				return true;
			}else{
				return false;
			}
		}

	}