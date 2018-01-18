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
		$variaveis['conteudo'] = $this->load->view('equipe/v_equipe', $variaveis, true);
		$variaveis['sidebar'] = $this->load->view('template/sidebar', $variaveis, true);
		$this->load->view('template/template', $variaveis);
	}

	public function create()
	{
		$variaveis['titulo'] = 'Cadastrar Equipe';
		$status_equipe = array( 
			1 => 'Ativo',
			2 => 'Inativo'
		);
		$variaveis['status_equipe'] = $status_equipe;
		$variaveis['paises'] = $this->m_paises->get_paises();
		$variaveis['regioes'] = $this->m_base->get_regioes();
		$variaveis['sedes'] = $this->m_base->get_sedes();
		$variaveis['tecnicos'] = $this->m_base->get_tecnicos();
		$variaveis['sidebar'] = $this->load->view('template/sidebar', $variaveis, true);
		$variaveis['conteudo'] = $this->load->view('equipe/v_cadastro_equipe', $variaveis, true);
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
		                'field' => 'sigla',
		                'label' => 'Sigla',
		                'rules' => 'required'		                
				),
				array(
						'field' => 'regiao',
						'label' => 'Sigla',
						'rules' => 'required'	
				),
        
				array(
						'field' => 'sede',
						'label' => 'Sede',
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
				$variaveis['mensagem'] = 1;
				$this->load->view('equipe/v_equipe_store', $variaveis);
				
			} else {
				$variaveis['mensagem'] = 0;
				$this->load->view('errors/html/v_erro', $variaveis);
			}
				
		}

	}

	public function edit($id = null){
		
		if ($id) {
			
			$equipes = $this->m_equipes->get_equipes($id);
			
			$status_equipe = array( 
				1 => 'Ativo',
				2 => 'Inativo'
			);

			if ($equipes->num_rows() > 0 ) {
				$variaveis['titulo'] = 'Edição de Registro';
				$variaveis['id'] = $equipes->row()->id;
				$variaveis['nome'] = $equipes->row()->nome;
				$variaveis['sigla'] = $equipes->row()->sigla;
				$variaveis['regiao'] = $equipes->row()->regiao_id;
				$variaveis['pais'] = $equipes->row()->pais_id;
				$variaveis['status'] = $equipes->row()->status;
				$variaveis['sede'] = $equipes->row()->sede_id;
				$variaveis['tecnico'] = $equipes->row()->tecnico_id;
				$variaveis['comissao'] = $equipes->row()->qtd_comissao;
				$variaveis['logo'] = $equipes->row()->logo;
				$variaveis['cor_primaria'] = $equipes->row()->cor_primaria;
				$variaveis['cor_secundaria'] = $equipes->row()->cor_secundaria;
				$variaveis['paises'] = $this->m_paises->get_paises();
				$variaveis['regioes'] = $this->m_base->get_regioes();
				$variaveis['sedes'] = $this->m_base->get_sedes();
				$variaveis['tecnicos'] = $this->m_base->get_tecnicos();
				
				$variaveis['status_equipe'] = $status_equipe;

				$variaveis['conteudo'] = $this->load->view('equipe/v_cadastro_equipe', $variaveis, true);
				$this->load->view('template/template', $variaveis);
			} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $variaveis);
			}
			
		}
		
	}

	public function view($id = null){
		
		if ($id) {

			// Busca model para buscar equipe por id		
			$equipes = $this->m_equipes->get_equipes($id);
			
			// Busca model para buscar jogadores vinculados a id da equipe
			$variaveis['jogador_equipe'] = $this->m_equipes->get_jogador_by_equipe($id);

			// Busca model para buscar jogadores vinculados a id da equipe
			$variaveis['equipe_titulos'] = $this->m_equipes->get_campeonato_titulos_by_equipe($id);
		
			// Atribui status da equipe
			$status_equipe = array( 
				1 => 'Ativo',
				2 => 'Inativo'
			);

			//Verifica se há registros de equipe com este id	

			if ($equipes->num_rows() > 0 ) {
				$variaveis['titulo'] = 'Edição de Registro';
				$variaveis['id'] = $equipes->row()->id;
				$variaveis['nome'] = $equipes->row()->nome;
				$variaveis['sigla'] = $equipes->row()->sigla;
				$variaveis['regiao'] = $equipes->row()->regiao_id;
				$variaveis['valor'] = $equipes->row()->valor;
				$variaveis['pais'] = $equipes->row()->pais_id;
				$variaveis['status'] = $equipes->row()->status;
				$variaveis['sede'] = $equipes->row()->sede_id;
				$variaveis['comissao'] = $equipes->row()->qtd_comissao;
				$variaveis['logo'] = $equipes->row()->logo;
				$variaveis['cor_primaria'] = $equipes->row()->cor_primaria;
				$variaveis['cor_secundaria'] = $equipes->row()->cor_secundaria;
				$variaveis['cor_terciaria'] = $equipes->row()->cor_terciaria;
				$variaveis['paises'] = $this->m_paises->get_paises();
				$variaveis['regioes'] = $this->m_base->get_regioes();
				$variaveis['sedes'] = $this->m_base->get_sedes();
				$variaveis['tecnico'] = $this->m_equipes->get_tecnico_by_equipe($id);
				$variaveis['status_equipe'] = $status_equipe;

				$variaveis['sidebar'] = $this->load->view('template/sidebar', $variaveis, true);
				$variaveis['conteudo'] = $this->load->view('equipe/v_equipe_view', $variaveis,true);
				$this->load->view('template/template', $variaveis);
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
