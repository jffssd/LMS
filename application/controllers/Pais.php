<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pais extends CI_Controller {

	/**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */
	
	public function index()
	{
		$variaveis['paises'] = $this->m_paises->get_paises();
		$variaveis['conteudo'] = $this->load->view('pais/v_pais', $variaveis,true);
		$this->load->view('template/template', $variaveis);
	}

	public function create()
	{
		$variaveis['titulo'] = 'Cadastrar País';
		$variaveis['conteudo'] = $this->load->view('pais/v_cadastro_pais', $variaveis,true);
		$this->load->view('template/template', $variaveis);
	}
	
	public function store(){
		
		$this->load->library('form_validation');
		
		$regras = array(
		        array(
		                'field' => 'nome',
		                'label' => 'Nome',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'name',
		                'label' => 'Name',
		                'rules' => 'required'		                
		        ),
		        array(
		                'field' => 'flag',
		                'label' => 'Flag',
		                'rules' => 'required'		                
		        )
		);
		
		$this->form_validation->set_rules($regras);

		if ($this->form_validation->run() == FALSE) {
			$variaveis['titulo'] = 'Novo Registro de País';
			$variaveis['conteudo'] = $this->load->view('pais/v_cadastro_pais', $variaveis,true);
			$this->load->view('template/template', $variaveis);
		} else {
			
			$id = $this->input->post('id');
			
			$dados = array(
			
				"nome" => $this->input->post('nome'),
				"name" => $this->input->post('name'),
				"name" => $this->input->post('flag'),
			
			);
			if ($this->m_paises->store($dados, $id)) {
				$variaveis['mensagem'] = "Dados gravados com sucesso!";
				$this->load->view('v_sucesso', $variaveis);
			} else {
				$variaveis['mensagem'] = "Ocorreu um erro. Por favor, tente novamente.";
				$this->load->view('errors/html/v_erro', $variaveis);
			}
				
		}

	}

	public function edit($id = null){
		
		if ($id) {
			
			$paises = $this->m_paises->get_paises($id);
			
			if ($paises->num_rows() > 0 ) {
				$variaveis['titulo'] = 'Edição de Registro';
				$variaveis['id'] = $paises->row()->id;
				$variaveis['nome'] = $paises->row()->nome;
				$variaveis['name'] = $paises->row()->name;
				$variaveis['conteudo'] = $this->load->view('pais/v_cadastro_pais', $variaveis,true);
				$this->load->view('template/template', $variaveis);
			} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $variaveis);
			}
			
		}
		
	}

	public function delete($id = null) {
		if ($this->m_paises->delete($id)) {
			$variaveis['mensagem'] = "Registro excluído com sucesso!";
			$this->load->view('v_sucesso', $variaveis);
		}
	}
}
