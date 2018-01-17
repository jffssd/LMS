<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jogador extends CI_Controller {

	/**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */
	
	public function index()
	{
		$variaveis['jogadores'] = $this->m_jogadores->get_jogadores();
		$variaveis['top_jogadores'] = $this->m_jogadores->get_top_jogadores();
		$variaveis['conteudo'] = $this->load->view('jogador/v_jogador', $variaveis, true);
		$variaveis['sidebar'] = $this->load->view('template/sidebar', $variaveis, true);
		$this->load->view('template/template', $variaveis);
	}/*

	public function create()
	{
		$variaveis['titulo'] = 'Cadastrar Jogador';
		$status_jogador = array( 
			1 => 'Ativo',
			2 => 'Inativo'
		);
		$variaveis['status_jogador'] = $status_jogador;
		$variaveis['paises'] = $this->m_paises->get_paises();
		$variaveis['sidebar'] = $this->load->view('template/sidebar', $variaveis, true);
		$variaveis['conteudo'] = $this->load->view('jogador/v_cadastro_jogador', $variaveis, true);
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
		                'field' => 'sobrenome',
		                'label' => 'Sobrenome',
		                'rules' => 'required'		                
				),
				array(
						'field' => 'nick',
						'label' => 'Nick',
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
			$variaveis['titulo'] = 'Novo Registro de Jogador';
			$this->load->view('equipe/v_cadastro_jogador', $variaveis);
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
			if ($this->m_jogador->store($dados, $id)) {
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
		
	}*/

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
				$variaveis['titulo'] = 'Visualizar Informações de Jogador';

				//Informações tabela jogador
				$variaveis['id'] = $jogadores->row()->id;
				$variaveis['nome'] = $jogadores->row()->nome;
				$variaveis['sobrenome'] = $jogadores->row()->sobrenome;
				$variaveis['nick'] = $jogadores->row()->nick;
				$variaveis['data_nasc'] = $jogadores->row()->data_nasc;
				$variaveis['genero'] = $jogadores->row()->genero;
				$variaveis['funcao_id'] = $jogadores->row()->funcao_id;
				$variaveis['funcao_nome'] = $jogadores->row()->funcao_nome;
				$variaveis['pais_id'] = $jogadores->row()->pais_id;
				$variaveis['pais_nome'] = $jogadores->row()->pais_nome;
				$variaveis['personalidade_id'] = $jogadores->row()->personalidade_id;
				$variaveis['personalidade_nome'] = $jogadores->row()->personalidade_nome;
				$variaveis['at_trab'] = $jogadores->row()->at_trab;
				$variaveis['at_ment'] = $jogadores->row()->at_ment;
				$variaveis['at_consist'] = $jogadores->row()->at_consist;
				$variaveis['at_mec'] = $jogadores->row()->at_mec;
				$variaveis['at_vis'] = $jogadores->row()->at_vis;
				$variaveis['foto'] = $jogadores->row()->foto;
				$variaveis['status_transacao'] = $jogadores->row()->status_transacao;

				$variaveis['sidebar'] = $this->load->view('template/sidebar', $variaveis, true);
				$variaveis['conteudo'] = $this->load->view('equipe/v_equipe_view', $variaveis,true);
				$this->load->view('template/template', $variaveis);
			} else {
				$variaveis['mensagem'] = "Não encontramos registros." ;
				$this->load->view('errors/html/v_erro', $variaveis);
			}
			
		}
		
	}


	public function delete($id = null) {
		if ($this->m_jogador->delete($id)) {
			$variaveis['mensagem'] = "Registro excluído com sucesso!";
			$this->load->view('v_sucesso', $variaveis);
		}
	}
}
