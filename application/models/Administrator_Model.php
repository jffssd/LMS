<?php
	class Administrator_Model extends CI_Model{

	public function __construct(){
			
		$this->load->database();
	}

	// Logar como administrador
	public function adminLogin($email, $senha_encriptada){
		
		//Validação
		$this->db->where('email', $email);
		$this->db->where('senha', $senha_encriptada);

		$result = $this->db->get('usuario');

		if ($result->num_rows() == 1) {
			return $result->row(0);
		}else{
			return false;
		}
	}

	// Excluir usuário
	public function delete($id,$table){

		$this->db->where('id', $id);
		$this->db->delete($table);
		return true;
	}

	// Adicionar usuário comum
	public function add_user($post_image,$password){

		$data = array(
						'usuario' => $this->input->post('usuario'),
						'email' => $this->input->post('email'),
						'senha' => $senha,
						'permissao' => '2',
						'status' => $this->input->post('status'),
						'imagem_perfil' => $post_image,
						'register_date' => date("Y-m-d H:i:s")
					  );

		return $this->db->insert('usuario', $data);
	}

	// Busca lista de usuários cadastrados	
	public function get_users($username = FALSE, $limit = FALSE, $offset = FALSE){

			if ($limit) {
				$this->db->limit($limit, $offset);
			}

			if($username === FALSE){
			$this->db->order_by('usuario.id', 'DESC');
			$query = $this->db->get('usuario');
			return $query->result_array(); 
		}
		$query = $this->db->get_where('usuario', array('usuario' => $usuario));
		return $query->row_array();
	}

	//Habilitar Usuário
	public function enable($id,$table){
	
		$data = array(
			'status' => 0
		    );
		$this->db->where('id', $id);
		return $this->db->update($table, $data);
	}
	
	//  Desabilitar usuário
	public function disable($id,$table){
	
		$data = array(
			'status' => 1
		    );
		$this->db->where('id', $id);
		return $this->db->update($table, $data);
	}

	// Busca lista de usuários
	public function get_user($id = FALSE){

		if($id === FALSE){
			$query = $this->db->get('usuario');
			return $query->result_array(); 
		}

		$query = $this->db->get_where('usuario', array('id' => $id));
		return $query->row_array();
	}

	// Atualiza dados do usuário
	public function update_user_data($post_image){

		$data = array(
						'usuario' => $this->input->post('usuario'),
						'email' => $this->input->post('email'),
						'status' => $this->input->post('status'),
						'permissao' => $this->input->post('permissao'),
						'imagem_perfil' => $post_image,
						'data_registro' => date("Y-m-d H:i:s")
					  );

		$this->db->where('id', $this->input->post('id'));
		$d = $this->db->update('usuario', $data);
	}

	// Busca configurações do site
	public function get_siteconfiguration($id = FALSE){

		if($id === FALSE){
			$query = $this->db->get('config_site');
			return $query->result_array(); 
		}

		$query = $this->db->get_where('config_site', array('id' => $id));
		return $query->row_array();
	}

	// Atualiza configurações do site
	public function update_siteconfiguration($id = FALSE){

		if($id === FALSE){
			$query = $this->db->get('config_site');
			return $query->result_array(); 
		}

		$query = $this->db->get_where('config_site', array('id' => $id));
		return $query->row_array();
	}

	// Realiza alteração nos dados de configuração do site
	public function update_siteconfiguration_data($post_image){

		$data = array('titulo_site' => $this->input->post('titulo_site'),
					  'nome_site' => $this->input->post('nome_site'),
					  'logo' => $post_image
					);

		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('config_site', $data);
	}

	// Busca informações do administrador
	public function get_admin_data(){

		$id = $this->session -> userdata('user_id');
		if($id === FALSE){
			$query = $this->db->get('usuario');
			return $query->result_array(); 
		}

		$query = $this->db->get_where('usuario', array('id' => $id));
		return $query->row_array();
	}

	// Muda a senha do usuário
	public function change_password($nova_senha){

			$data = array(
			'senha' => md5($nova_senha)
		    );
		$this->db->where('id', $this->session->userdata('user_id'));
		return $this->db->update('usuario', $data);
	}

	// Compara o campo senha antiga com a cadastrada no banco
	public function match_old_password($senha){

		$id = $this->session -> userdata('user_id');
		if($id === FALSE){
			$query = $this->db->get('usuario');
			return $query->result_array(); 
		}

		$query = $this->db->get_where('usuario', array('senha' => $senha));
		return $query->row_array();
	}

	// Verifica se o e-mail informado existe
	public function email_exists(){
	
		$email = $this->input->post('email');
		$query = $this->db->query("SELECT email, senha FROM usuario WHERE email='$email'");    
		if($row = $query->row()){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	// Verifica senha temporária
	public function temp_reset_password($temp_pass){
		$data =array(
					'email' =>$this->input->post('email'),
					'reset_pass'=>$temp_pass
					);
					
					$email = $data['email'];

		if($data){
			$this->db->where('email', $email);
			$this->db->update('usuario', $data);  
			return TRUE;
		}else{
			return FALSE;
		}
	}


	// Verifica se a senha temporária é valida
	public function is_temp_pass_valid($temp_pass){
		$this->db->where('reset_pass', $temp_pass);
		$query = $this->db->get('usuario');
		if($query->num_rows() == 1){
			return TRUE;
		}
		else return FALSE;
	}
}