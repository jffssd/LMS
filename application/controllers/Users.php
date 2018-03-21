<?php
	class Users extends CI_Controller{


		public function __construct(){
			
			parent::__construct();

		}

		public function dashboard(){

			if(!$this->session->userdata('login')) {
				redirect('entrar');
			}
			$data['title'] = 'Painel Principal';
			$referencia['item'] = 'inicio';

			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/usuario/sidemenu', $referencia);
			$this->load->view('users/dashboard', $data);
			$this->load->view('templates/footer');
		}

		public function mensagens(){

			if(!$this->session->userdata('login')) {
				redirect('entrar');
			}
			$data['title'] = 'Mensagens';
			$referencia['item'] = 'mensagens';

			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/usuario/sidemenu', $referencia);
			$this->load->view('templates/page_start');
			$this->load->view('users/mensagens', $data);
			$this->load->view('templates/footer');
		}

		public function profile(){

			if(!$this->session->userdata('login')) {
				redirect('entrar');
			}
			$data['title'] = 'Perfil';
			$referencia['item'] = 'perfil';

			$data['mensagens'] = $this->User_Model->get_mensagens_usuario($this->session->userdata('usuario_id'));
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/usuario/sidemenu', $referencia);
			$this->load->view('templates/page_start');
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

				$this->load->view('templates/login/registrar', $data);

			}else{

				$senha_encriptada = md5($this->input->post('senha'));
				$permissao = 2;
				$status = 1;

				$this->User_Model->register($senha_encriptada, $permissao, $status);

				//Set Message
				$this->session->set_flashdata('usuario_cadastrado', 'Olá '.$this->input->post('usuario').'! Você foi registrado com sucesso e já pode se conectar!');
				redirect('users/login');
			}
		}

		public function login(){

			if($this->session->userdata('login')) {
				redirect('inicio');
			}

			$data['title'] = 'Conectar-se';
			$this->load->view('templates/login/login', $data);
		}

		// Login do usuário
		public function processa_login(){

			if($this->session->userdata('login')) {
				redirect('inicio');
			}

			$data['title'] = 'Conectar-se';

			$this->form_validation->set_rules('usuario', 'Usuário', 'required');
			$this->form_validation->set_rules('senha', 'Senha', 'required');

			if($this->form_validation->run() === FALSE){
			
				$this->session->set_flashdata('falha_login', 'Login ou senha inválidos');

				$this->load->view('templates/login/login', $data);

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

					$this->session->set_flashdata('falha_login', 'E-mail ou senha inválidos!');
					redirect('users/login');
				}
			}
		}

		// log user out
		public function logout(){

			if(!$this->session->userdata('login')) {
				redirect('home');
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
			$this->form_validation->set_message('check_username_exists', 'O nome de usuário <strong>'.$username.'</strong> já foi utilizado. Por favor, tente um diferente.');

			if ($this->User_Model->check_username_exists($username)) {
				return true;
			}else{
				return false;
			}
		}


		// Check Email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'O e-mail <strong>'.$email.'</strong> já foi cadastrado anteriormente.');

			if ($this->User_Model->check_email_exists($email)) {
				return true;
			}else{
				return false;
			}
		}

	public function reset_password($temp_pass, $email){
		
		$this->load->model('Administrator_Model');
		
		//$this->session->set_userdata['temp_email'] = '';

		$plain_temp_email = base64_decode($email);

		if($this->Administrator_Model->is_temp_pass_valid($temp_pass, $plain_temp_email)){
		
			$data['email'] = $plain_temp_email;
			$data['chave_temporaria'] = $temp_pass;
			$this->load->view('templates/login/submeter_nova_senha', $data);

		}else{
			echo "the key is not valid";    
		}
	}

	public function cadastrar_nova_senha(){
		
		$this->load->model('Administrator_Model');

		$data['title'] = 'Cadastrar nova Senha';

		$this->form_validation->set_rules('senha', 'Senha', 'required');
		$this->form_validation->set_rules('senha2', 'Confirme a Senha', 'matches[senha]');

		if($this->form_validation->run() === FALSE){

			$this->load->view('templates/login/submeter_nova_senha', $data);

		}else{

			$chave_temporaria = $this->input->post('chave_temporaria');
			$email = $this->input->post('email');
			$nova_senha_encriptada = md5($this->input->post('senha'));

			if($this->Administrator_Model->cadastrar_nova_senha($chave_temporaria, $email, $nova_senha_encriptada)){

				$this->session->set_flashdata('sucesso', 'Sua senha foi alterada com êxito!');
				redirect('login');
				
			}else{
				
				$this->session->set_flashdata('erro', 'Houve um erro ao tentar processar sua solicitação');
				redirect('login');
			}
		}
	}

	public function relembrar_senha($page = 'relembrar_senha'){

		$data['title'] = ucfirst($page);
		$this->load->view('templates/login/'.$page, $data);
	}

	public function forget_password_mail(){
    	$this->load->library('form_validation');
    	
    	$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');

        //check if email is in the database
        $this->load->model('Administrator_Model');
        if($this->Administrator_Model->email_exists()){

            //$them_pass is the varible to be sent to the user's email
            $temp_pass = md5(uniqid());

            $email_key = str_replace("=","", base64_encode($this->input->post('email')));
 
             //send email with #temp_pass as a link
            $config = Array(
            	'protocol' => 'smtp',
            	'smtp_host' => 'ssl://smtp.googlemail.com',
            	'validation' => TRUE,
            	'smtp_port' => 465,
            	'smtp_user' => '',
            	'smtp_pass' => '',
            	'mailtype' => 'html',
            	'charset' => 'utf-8',
            	'wordwrap' => TRUE,
            	'newline' => "\r\n"
            );

			$this->load->library('email', $config);
            $this->email->from('jffssd@gmail.com', 'Centro e-Sports!');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Centro e-Sports! - Redefinir sua senha');

            $message = "<p>Este e-mail foi enviado devido a uma requisição de redefinição de senha no site Centro e-Sports!</p>";
            $message .= "<p><a href='".base_url()."users/reset_password/$temp_pass/$email_key'>Clique aqui </a> para redefinir sua senha, se não tiver conhecimento sobre esta ação, ignore-a.</p>";
            $this->email->message($message);

            if($this->email->send()){

                $this->load->model('Administrator_Model');
                if($this->Administrator_Model->temp_reset_password($temp_pass)){

                echo '</pre>';
                $data['msg_tipo'] = "Mensagem";
            	$data['mensagem'] = "Enviamos um e-mail para <strong>".$this->input->post('email')."</strong> contendo as instruções para a alteração da sua senha, caso não receba, verifique sua caixa de spam.";
				$this->load->view('templates/login/recuperar_senha_info', $data);

                }
            }else{

                echo '</pre>';
            	$data['msg_tipo'] = "Erro";
            	$data['mensagem'] = "Houve um erro ao tentar enviar o e-mail, entre em contato com o administrador do sistema e reporte o ocorrido.";
				$this->load->view('templates/login/recuperar_senha_info', $data);
            }
        }else{

            $this->session->set_flashdata('erro', 'O e-mail informado não está cadastrado');
				redirect('users/relembrar_senha');
        }
	}
}