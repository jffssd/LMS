<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipe extends CI_Controller {

	/**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */
	
	public function index()
	{
		$variaveis['equipes'] = $this->m_equipes->get_equipes();
		$this->load->view('template/header', $variaveis);
		$this->load->view('template/sidebar', $variaveis);
		$this->load->view('equipe/v_equipe', $variaveis);
		$this->load->view('template/footer', $variaveis);
	}

	public function create()
	{
		$variaveis['titulo'] = 'Cadastrar Equipe';
		$this->load->view('equipe/v_cadastro_equipe', $variaveis);
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
		                'field' => 'sigla',
		                'label' => 'Sigla',
		                'rules' => 'required'		                
		        )
		);
		
		$this->form_validation->set_rules($regras);

		if ($this->form_validation->run() == FALSE) {
			$variaveis['titulo'] = 'Novo Registro de Equipe';
			$this->load->view('equipe/v_cadastro_equipe', $variaveis);
		} else {
			
			$id = $this->input->post('id');
			
			$dados = array(
			
				"nome" => $this->input->post('nome'),
				"sigla" => $this->input->post('sigla'),
				"regiao_id" => $this->input->post('regiao'),
				"pais_id" => $this->input->post('pais'),
				"status" => $this->input->post('status'),
				"sede_id" => $this->input->post('sede'),
				"tecnico_id" => $this->input->post('tecnico'),
				"qtd_comissao" => $this->input->post('comissao'),
				"logo" => $this->input->post('logo'),
				"cor_primaria" => $this->input->post('cor_primaria'),
				"cor_secundaria" => $this->input->post('cor_secundaria'),
			
			);
			if ($this->m_equipes->store($dados, $id)) {
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
			
			$equipes = $this->m_equipes->get_equipes($id);
			
			if ($equipes->num_rows() > 0 ) {
				$variaveis['titulo'] = 'Edição de Registro';
				$variaveis['id'] = $equipes->row()->id;
				$variaveis['sigla'] = $equipes->row()->sigla;
				$variaveis['regiao'] = $equipes->row()->regiao;
				$variaveis['pais'] = $equipes->row()->pais;
				$variaveis['status'] = $equipes->row()->status;
				$variaveis['sede'] = $equipes->row()->status;
				$variaveis['tecnico'] = $equipes->row()->tecnico;
				$variaveis['comissao'] = $equipes->row()->comissao;
				$variaveis['logo'] = $equipes->row()->logo;
				$variaveis['cor_primaria'] = $equipes->row()->cor_primaria;
				$variaveis['cor_secundaria'] = $equipes->row()->cor_secundaria;

				$this->load->view('equipe/v_cadastro_equipe', $variaveis);
			} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $variaveis);
			}
			
		}
		
	}

	public function delete($id = null) {
		if ($this->m_equipes->delete($id)) {
			$variaveis['mensagem'] = "Registro excluído com sucesso!";
			$this->load->view('v_sucesso', $variaveis);
		}
	}
}
