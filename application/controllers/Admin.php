<?php 
	class Admin extends CI_Controller{

	//Controller principal do administrador

	public function __construct(){

		parent::__construct();
		if($this->session->userdata('permissao') != 1) {
			redirect('users/profile');
		}
	}

	public function view($page = 'index'){

		//Se já estiver logado, envia para a página de dashboard
		if($this->session->userdata('login')) {
			redirect('admin/dashboard');
		}
		//Se não encontrar a view referente ao controller envia
		if (!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
			show_404();
		}
			
		$data['title'] = ucfirst($page);
		$referencia['item'] = '';
		$referencia['sub-item'] = '';

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/admin/sidemenu', $referencia);
		$this->load->view('templates/page_start');
		$this->load->view('admin/'.$page, $data);
		$this->load->view('templates/footer');
	}
	

	public function home($page = 'home'){
	
		if (!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
			show_404();
		}
		
		$data['title'] = ucfirst($page);
		$referencia['item'] = '';
		$referencia['sub-item'] = '';
		
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/admin/sidemenu', $referencia);
		$this->load->view('templates/page_start');
		$this->load->view('admin/'.$page, $data);
		$this->load->view('templates/footer');
	}


	public function dashboard($page = 'dashboard'){
	
		if (!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
	 	    show_404();
	   }
	   $data['title'] = ucfirst($page);
	   $this->load->view('admin/header-script');
	   $this->load->view('admin/header');
	   $this->load->view('admin/header-bottom');
	   $this->load->view('admin/'.$page, $data);
	   $this->load->view('admin/footer');
	}


	public function adminLogin(){

		$data['title'] = 'Login de Administrador';

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('senha', 'Senha', 'required');

		if($this->form_validation->run() === FALSE){

			$this->load->view('admin/header-script');
			$this->load->view('admin/index', $data);
			$this->load->view('admin/footer');
		}else{
			// Recebe e-mail e senha (md5)
			$email = $this->input->post('email');
			$senha_encriptada = md5($this->input->post('senha'));

			//Recebe informações dos modals
			$id_usuario = $this->Administrator_Model->adminLogin($email, $senha_encriptada);
			$logo_site = $this->Administrator_Model->update_siteconfiguration(1);

			//Se for administrador, criará a sessão
			if ($id_usuario && $id_usuario->permissao == 1) {

				$user_data = array(
							'usuario_id' => $id_usuario->id,
			 				'usuario' => $id_usuario->usuario,
			 				'email' => $id_usuario->email,
			 				'login' => true,
			 				'permissao' => $id_usuario->permissao,
			 				'imagem_perfil' => $id_usuario->imagem_perfil,
			 				'logo_site' => $logo_site['logo']
			 	);

			 	$this->session->set_userdata($user_data);

				//Define mensagem de retorno
				$this->session->set_flashdata('success', 'Bem vindo ao Painel Principal! :D');
				redirect('admin/dashboard');
			}else{
				$this->session->set_flashdata('danger', 'Credenciais de login são inválidas!');
				redirect('admin/index');
			}
		}
	}

	public function logout(){

		$this->session->unset_userdata('login');
		$this->session->unset_userdata('usuario_id');
		$this->session->unset_userdata('usuario');
		$this->session->unset_userdata('permissao');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('imagem_perfil');
		$this->session->unset_userdata('logo_site');

		$this->session->set_flashdata('success', 'Você saiu da aplicação com sucesso!');
		redirect(base_url().'admin/index');
	}

	public function forget_password($page = 'forget-password'){
		if (!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
			show_404();
		}
		$data['title'] = ucfirst($page);
		$this->load->view('admin/header-script');
		$this->load->view('admin/'.$page, $data);
		$this->load->view('admin/footer');
	}

	
	//=========================================================================
	//								USUÁRIOS
	//=========================================================================
	
	public function usuarios($offset = 0){

		// Configuração da Página
		$config['base_url'] = base_url(). 'admin/usuarios/';
		$config['total_rows'] = $this->db->count_all('usuario');
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['attributes'] = array('class' => 'paginate-link');

		// Inicia a Paginação
		$this->pagination->initialize($config);
	
		$data['usuarios'] = $this->Administrator_Model->get_users(FALSE, $config['per_page'], $offset);

		$data['title'] = 'Últimos usuários';
		$referencia['item'] = '';
		$referencia['sub-item'] = '';

	    $this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/admin/sidemenu', $referencia);
		$this->load->view('templates/page_start');
	   	$this->load->view('admin/users', $data);
		$this->load->view('templates/footer');
	}

	// Atualizar usuário - VIEW
	public function atualizar_usuario($id = NULL){

		$data['usuario'] = $this->Administrator_Model->get_user($id);
			
		if (empty($data['usuario'])) {
			show_404();
		}
		$data['title'] = 'Atualizar usuário';
		$referencia['item'] = '';
		$referencia['sub-item'] = '';

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/admin/sidemenu', $referencia);
		$this->load->view('templates/page_start');
	   	$this->load->view('admin/atualizar_usuario', $data);
		$this->load->view('templates/footer');
	}

	// Atualizar usuário
	public function atualizar_dados_usuario($page = 'atualizar_usuario')
		{
		if (!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
		    show_404();
		}
		// Check login
		if(!$this->session->userdata('login')) {
			redirect('admin/index');
		}

		$data['title'] = 'Atualizar Usuário';
		$referencia['item'] = '';
		$referencia['sub-item'] = '';

		$this->form_validation->set_rules('usuario', 'Usuario', 'required');

		if($this->form_validation->run() === FALSE){

	  		$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/admin/sidemenu', $referencia);
			$this->load->view('templates/page_start');
	   		 $this->load->view('admin/'.$page, $data);
			$this->load->view('templates/footer');

		}else{
			//Upload Image
				
			$config['upload_path'] = './assets/images/users';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload()){
				$id = $this->input->post('id');
				$data['img'] = $this->Administrator_Model->get_user($id);
				$errors =  array('error' => $this->upload->display_errors());
				$post_image = $data['img']['imagem_perfil'];
			}else{
				$data =  array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
			}

			$this->Administrator_Model->update_user_data($post_image);
			//Set Message
			$this->session->set_flashdata('success', 'Usuário foi atualizado com sucesso!');
			redirect('admin/usuarios');
		}
	}

	public function cadastrar_usuario($page = 'cadastrar_usuario'){

		if (!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
			show_404();
	    }
		// Se não estiver logado, envia para a página de login.
		if(!$this->session->userdata('login')) {
			redirect('admin/index');
		}
		
		$data['title'] = 'Criar Usuário';
		$referencia['item'] = '';
		$referencia['sub-item'] = '';

		// Define as regras de validação
		$this->form_validation->set_rules('usuario', 'Usuario', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');

		// Se não rodar, envia para a página de cadastro novamente.
		if($this->form_validation->run() === FALSE){

	  		$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/admin/sidemenu', $referencia);
			$this->load->view('templates/page_start');
   			 $this->load->view('admin/'.$page, $data);
			$this->load->view('templates/footer');
		}else{
			//Faz upload da imagem
			$config['upload_path'] = './assets/images/users';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';
			//Carrega a bibliote ca de upload com os dados informados
			$this->load->library('upload', $config);

			// Se não conseguir fazer o upload, define mensagen de erro e atribui imagem padrão.
			// Se conseguir, define dados do upload
			if(!$this->upload->do_upload()){
				$errors =  array('error' => $this->upload->display_errors());
				$post_image = 'default-profile.png';
			}else{
				$data =  array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
			}

			//???
			$senha = md5('Test@123');

			$this->Administrator_Model->add_user($post_image,$senha);

			//Define Mensagem
			$this->session->set_flashdata('success', 'User has been created Successfull.');
			redirect('admin/usuarios');
		}
	}

		// Excluir usuário
	public function delete($id){

		$table = base64_decode($this->input->get('table'));
		$this->Administrator_Model->delete($id,$table);       
		$this->session->set_flashdata('success', 'Dados excluídos com sucesso!');
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	// Habilitar usuário
	public function enable($id){

		$table = base64_decode($this->input->get('table'));
		$this->Administrator_Model->enable($id,$table);       
		$this->session->set_flashdata('success', 'Desabilitado com sucesso!');
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	// Desabilitar usuário
	public function disable($id){

		$table = base64_decode($this->input->get('table'));
		//$table = $this->input->post('table');
		$this->Administrator_Model->disable($id,$table);       
		$this->session->set_flashdata('success', 'Habilitado com sucesso!');
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}






	// Verifica se o usuário já está cadastrado
	public function check_username_exists($usuario){

		$this->form_validation->set_message('check_username_exists', 'Este nome de usuário já existe.');

		if ($this->User_Model->check_username_exists($usuario)) {
			return true;
		}else{
			return false;
		}
	}


	// Verifica se o e-mail já está cadastrado
	public function check_email_exists($email){

		$this->form_validation->set_message('check_email_exists', 'Este e-mail já está cadastrado.');

		if ($this->User_Model->check_email_exists($email)) {
			return true;
		}else{
			return false;
		}
	}




	//Site configuration
	public function get_siteconfiguration($page = 'site-configuration'){

		if (!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
	    	show_404();
	   	}

		$data['siteconfiguration'] = $this->Administrator_Model->get_siteconfiguration();

		$data['title'] = 'Site Configuration';

		$this->load->view('admin/header-script');
	 	$this->load->view('admin/header');
		$this->load->view('admin/header-bottom');
		$this->load->view('admin/update-site-configuration', $data);
		$this->load->view('admin/footer');
	}

	public function update_siteconfiguration($id = NULL){

		$data['siteconfiguration'] = $this->Administrator_Model->update_siteconfiguration($id);
		$data['title'] = 'Update Configuration';

		$this->load->view('admin/header-script');
	 	$this->load->view('admin/header');
		$this->load->view('admin/header-bottom');
		$this->load->view('admin/update-site-configuration', $data);
		$this->load->view('admin/footer');
	}


	public function update_siteconfiguration_data($page = 'update-site-configuration'){

		if (!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
		    show_404();
	    }
		// Check login
		if(!$this->session->userdata('login')) {
			redirect('admin/index');
		}
		$data['title'] = 'Update Configuration';

		$this->form_validation->set_rules('site_title', 'Site Title', 'required');
		$this->form_validation->set_rules('site_name', 'Site Name', 'required');
			
		if($this->form_validation->run() === FALSE){
			 $this->load->view('admin/header-script');
	 	 	 $this->load->view('admin/header');
	  		 $this->load->view('admin/header-bottom');
	   		 $this->load->view('admin/'.$page, $data);
	  		 $this->load->view('admin/footer');
		}else{

			//Upload Image
			$config['upload_path'] = './assets/images';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload()){
				$errors =  array('error' => $this->upload->display_errors());
				$data['logo_imgs'] = $this->Administrator_Model->update_siteconfiguration($this->input->post('id'));
				$post_image = $data['logo_imgs']['logo_img'];
			}else{
				$data =  array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
			}
				
			 $this->Administrator_Model->update_siteconfiguration_data($post_image);
			//Set Message
			$this->session->set_flashdata('success', 'site configuration Details has been Updated Successfull.');
			redirect('admin/site-configuration/update/1');
		}
	}

	public function get_admin_data(){

		$data['changePassword'] = $this->Administrator_Model->get_admin_data();
		$data['title'] = 'Change Password';

		$this->load->view('admin/header-script');
	 	$this->load->view('admin/header');
	  	$this->load->view('admin/header-bottom');
	   	$this->load->view('admin/change-password', $data);
	  	$this->load->view('admin/footer');
	}

	public function change_password($page = 'change-password'){

		if (!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
		    show_404();
		}
		// Check login
		if(!$this->session->userdata('login')) {
			redirect('admin/index');
		}

		$data['title'] = 'Change password';

		//$data['add-user'] = $this->Administrator_Model->get_categories();

		$this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_match_old_password');
		$this->form_validation->set_rules('new_password', 'New Password Field', 'required');
		$this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'matches[new_password]');

		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/header-script');
		 	$this->load->view('admin/header');
			$this->load->view('admin/header-bottom');
			$this->load->view('admin/'.$page, $data);
			$this->load->view('admin/footer');
		}else{
			$this->Administrator_Model->change_password($this->input->post('new_password'));
			//Set Message
			$this->session->set_flashdata('success', 'Password Has Been Changed Successfull.');
			redirect('administrator/change-password');
		}
	}

	// Check user name exists
	public function match_old_password($old_password){
			
		$this->form_validation->set_message('match_old_password', 'Current Password Does not matched, Please Try Again.');
		$password = md5($old_password);
		$que = $this->Administrator_Model->match_old_password($password);
		if ($que) {
			return true; 
		}else{
			return false;
		}
	}

	//forget password functions start
	public function forget_password_mail(){
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|callback_validate_credentials');

        //check if email is in the database
        $this->load->model('Administrator_Model');
        if($this->Administrator_Model->email_exists()){
            //$them_pass is the varible to be sent to the user's email
            $temp_pass = md5(uniqid());
            //send email with #temp_pass as a link
            $this->load->library('email', array('mailtype'=>'html'));
            $this->email->from('admin1234567@gmail.com', "Site");
            $this->email->to($this->input->post('email'));
            $this->email->subject("Reset your Password");

            $message = "<p>This email has been sent as a request to reset our password</p>";
            $message .= "<p><a href='".base_url()."admin/reset-password/$temp_pass'>Click here </a>if you want to reset your password,
                        if not, then ignore</p>";
            $this->email->message($message);

            if($this->email->send()){
                $this->load->model('Administrator_Model');
                if($this->Administrator_Model->temp_reset_password($temp_pass)){
                    echo "check your email for instructions, thank you";
                }
            }else{
                echo "email was not sent, please contact your administrator";
            }
        }else{
            echo "your email is not in our database";
        }
	}

	public function reset_password($temp_pass){
		$this->load->model('Administrator_Model');
		if($this->Administrator_Model->is_temp_pass_valid($temp_pass)){

			$this->load->view('reset-password');
		//once the user clicks submit $temp_pass is gone so therefore I can't catch the new password and   //associated with the user...

		}else{
			echo "the key is not valid";    
		}
	}

	public function update_password(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
        if($this->form_validation->run()){
            echo "passwords match";
       }else{
            echo "passwords do not match";  
        }
	}
}