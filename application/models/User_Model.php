<?php
	class User_Model extends CI_Model{

	public function register($senha_encriptada, $permissao, $status){

		$data = array(
						'usuario' => $this->input->post('usuario'), 
						'email' => $this->input->post('email'),
						'senha' => $senha_encriptada,
						'permissao' => $permissao,
						'status' => $status
					);

		return $this->db->insert('usuario', $data);
	}

	public function login($usuario, $senha_encriptada){

		$this->db->where('usuario', $usuario);
		$this->db->where('senha', $senha_encriptada);
		$result = $this->db->get('usuario');

		if ($result->num_rows() == 1) {
			return $result->row(0);
		}else{
			return false;
		}
	}

	public function check_username_exists($usuario){

		$query = $this->db->get_where('usuario', array('usuario' => $usuario));

		if(empty($query->row_array())){
			return true;
		}else{
			return false;
		}
	}

	public function check_email_exists($email){

		$query = $this->db->get_where('usuario', array('email' => $email));
		if(empty($query->row_array())){
			return true;
		}else{
			return false;
		}
	}

	public function get_mensagens_usuario($id){

		$index = array($id, 1);

		$this->db->where_in('usuario_id',$index);
		$this->db->order_by("data_envio");
		return $this->db->get('mensagem_usuario');
	}

	public function usuario_login_log($id, $ip){

		$data = array(
			'usuario_id' => $id, 
			'ip' => $ip,
			'tipo' => 'Ação',	
			'msg' => 'O usuário realizou login com sucesso',
		);

		$this->db->insert('usuario_log', $data);
	}

	public function usuario_logout_log($id, $ip){
		
		$data = array(
			'usuario_id' => $id, 
			'ip' => $ip,
			'tipo' => 'Ação',	
			'msg' => 'O usuário realizou logout com sucesso',
		);
		
		$this->db->insert('usuario_log', $data);
	}
}