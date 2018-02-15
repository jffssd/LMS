<?php
class Pais extends CI_Controller{

	public function __construct(){
		
		parent::__construct();
		if($this->session->userdata('permissao') != 1) {
			redirect('users/profile');
		}
	}

	public function index(){
		
		$data['title'] = 'Índice';
			
		$data['paises'] = $this->Paises_Model->get_paises();
		$this->load->view('templates/header');
		$this->load->view('pais/v_pais', $data);
		$this->load->view('templates/footer');
	}

	public function create(){

		$data['title'] = 'Cadastrar País';
		
		$this->load->view('templates/header');
		$this->load->view('pais/v_pais_cadastro', $data);
		$this->load->view('templates/footer');
	}


	public function store(){

		$data['title'] = 'Cadastrar';

		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('flag', 'Flag', 'required');
			

		if($this->form_validation->run() === FALSE){

			$data['title'] = 'Cadastrar';
			$this->load->view('templates/header');
			$this->load->view('pais/v_pais_cadastro', $data);
			$this->load->view('templates/footer');

		}else{

			$id = $this->input->post('id');
				
			$dados = array(
				
				"nome" => $this->input->post('nome'),
				"name" => $this->input->post('name'),
				"flag" => $this->input->post('flag'),
		
			);

			$this->Paises_Model->store($id, $dados);

			$this->session->set_flashdata('user_registered', 'O país foi registrado/alterado com sucesso!');
			redirect('pais');
		}
	}

	public function edit($id = null){
			
		if ($id) {
			$paises = $this->Paises_Model->get_paises($id);
			if ($paises->num_rows() > 0 ) {
				$data['titulo'] = 'Edição de Registro';

				$data['id'] = $paises->row()->id;
				$data['nome'] = $paises->row()->nome;
				$data['name'] = $paises->row()->name;
				$data['flag'] = $paises->row()->flag;
				$this->load->view('templates/header');
				$this->load->view('pais/v_pais_cadastro', $data);
				$this->load->view('templates/footer');
			} else {
				$data['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $data);
			}
		}
	}

	public function delete($id = null){
		if ($id) {
			return $this->db->where('id', $id)->delete('pais');
		}
	}
}