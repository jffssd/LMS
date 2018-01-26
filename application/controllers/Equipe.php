<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipe extends CI_Controller {

	/**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */
	
	public function index(){

		$variaveis['equipes'] = $this->m_equipes->get_equipes();
		$variaveis['conteudo'] = $this->load->view('equipe/v_equipe', $variaveis, true);
		$variaveis['sidebar'] = $this->load->view('template/sidebar', $variaveis, true);
		$this->load->view('template/template', $variaveis);
	}

	public function create(){

		$status_equipe = array( 
			1 => 'Ativo',
			2 => 'Inativo'
		);
		$variaveis['status_equipe'] = $status_equipe;
		$variaveis['paises'] = $this->m_paises->get_paises();
		$variaveis['regioes'] = $this->m_base->get_regioes();
		$variaveis['sedes'] = $this->m_base->get_sedes();
		$variaveis['tecnicos'] = $this->m_base->get_tecnicos();
		$variaveis['conteudo'] = $this->load->view('equipe/v_cadastro_equipe', $variaveis, true);
		$variaveis['sidebar'] = $this->load->view('template/sidebar', $variaveis, true);
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
		                'field' => 'pais',
		                'label' => 'Pais',
		                'rules' => 'required'		                
		        ),
		        array(
		                'field' => 'regiao',
		                'label' => 'Região',
		                'rules' => 'required'		                
		        ),
		        array(
		                'field' => 'sede',
		                'label' => 'Sede',
		                'rules' => 'required'		                
		        ),
		        array(
		                'field' => 'logo',
		                'label' => 'Logo',
		                'rules' => 'required'		                
				),
		        array(
		                'field' => 'cor_primaria',
		                'label' => 'Cor Primária',
		                'rules' => 'required'		                
				),
		        array(
		                'field' => 'cor_secundaria',
		                'label' => 'Cor Secundária',
		                'rules' => 'required'		                
		        )
		);
		
		$this->form_validation->set_rules($regras);

		if ($this->form_validation->run() == FALSE) {
			$variaveis['titulo'] = 'NOVO REGISTRO DE EQUIPE';
			$variaveis['conteudo'] = $this->load->view('equipe/v_cadastro_equipe', $variaveis,true);
			$variaveis['sidebar'] = $this->load->view('template/sidebar', $variaveis, true);
			$this->load->view('template/template', $variaveis);
		} else {
			
			$id = $this->input->post('id');
			
			$dados = array(
			
				"nome" => $this->input->post('nome'),
				"sigla" => $this->input->post('sigla'),
				"pais_id" => $this->input->post('pais'),
				"regiao_id" => $this->input->post('regiao'),
				"sede_id" => $this->input->post('sede'),
				"logo" => $this->input->post('logo'),
				"pais_id" => $this->input->post('pais'),
				"cor_primaria" => $this->input->post('cor_primaria'),
				"cor_secundaria" => $this->input->post('cor_secundaria'),
				"valor" => 10,
				"status" => 'A'
			);
			if ($this->m_equipes->store($dados, $id)) {
				$variaveis['mensagem'] = "Dados gravados com sucesso!";
				$variaveis['msgid'] = 1;
				$this->load->view('equipe/v_equipe_store', $variaveis);
			} else {
				$variaveis['mensagem'] = "Ocorreu um erro. Por favor, tente novamente.";
				$variaveis['msgid'] = 0;
				$this->load->view('equipe/v_equipe_store', $variaveis);
			}
				
		}

	}



	public function edit($id = null){
		session_start();
		
		if ($id) {
			
			$equipes = $this->m_equipes->get_equipes($id);
			
			$status_equipe = array( 
				1 => 'Ativo',
				2 => 'Inativo'
			);

			if ($equipes->num_rows() > 0 ) {
				$variaveis['titulo'] = 'EDIÇÃO DE EQUIPE';
				$variaveis['id'] = $equipes->row()->id;
				$variaveis['nome'] = $equipes->row()->nome;
				$variaveis['sigla'] = $equipes->row()->sigla;
				$variaveis['regiao'] = $equipes->row()->regiao_id;
				$variaveis['pais'] = $equipes->row()->pais_id;
				$variaveis['status'] = $equipes->row()->status;
				$variaveis['logo'] = $equipes->row()->logo;
				$variaveis['cor_primaria'] = $equipes->row()->cor_primaria;
				$variaveis['cor_secundaria'] = $equipes->row()->cor_secundaria;
				$variaveis['paises'] = $this->m_paises->get_paises();
				$variaveis['regioes'] = $this->m_base->get_regioes();
				$variaveis['sedes'] = $this->m_base->get_sedes();
				$variaveis['tecnicos'] = $this->m_base->get_tecnicos();
				
				$variaveis['status_equipe'] = $status_equipe;

				$variaveis['conteudo'] = $this->load->view('equipe/v_cadastro_equipe', $variaveis, true);
				$variaveis['sidebar'] = $this->load->view('template/sidebar', $variaveis, true);
				$this->load->view('template/template', $variaveis);
			} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $variaveis);
			}
			
		}
		
	}

	public function view($id = null){
		
		if ($id) {

			// Busca equipe por id		
			$equipe = $this->m_equipes->get_equipes($id);
			
			// Busca jogadores vinculados à equipe
			$variaveis['jogador_equipe'] = $this->m_equipes->get_jogador_by_equipe($id);

			// Busca títulos de campeonatos vinculados à equipe
			$variaveis['equipe_titulos'] = $this->m_equipes->get_campeonato_titulos_by_equipe($id);

			// Busca comissão técnica vinculada à equipe
		

			//Verifica se há registros de equipe com este id	

			if ($equipe->num_rows() > 0 ) {
				$variaveis['titulo'] = 'Edição de Registro';

				$variaveis['id'] = $equipe->row()->id;
				$variaveis['nome'] = $equipe->row()->nome;
				$variaveis['sigla'] = $equipe->row()->sigla;
				$variaveis['regiao'] = $equipe->row()->regiao_id;
				$variaveis['pais'] = $equipe->row()->pais_id;
				$variaveis['status'] = $equipe->row()->status;
				$variaveis['sede'] = $equipe->row()->sede_id;
				$variaveis['logo'] = $equipe->row()->logo;
				$variaveis['cor_primaria'] = $equipe->row()->cor_primaria;
				$variaveis['cor_secundaria'] = $equipe->row()->cor_secundaria;
				$variaveis['valor'] = $equipe->row()->valor;

				$variaveis['site'] = $equipe->row()->site;
				$variaveis['social_fb'] = $equipe->row()->social_fb;
				$variaveis['social_tw'] = $equipe->row()->social_tw;
				$variaveis['social_in'] = $equipe->row()->social_in;

				$variaveis['paises'] = $this->m_paises->get_paises();
				$variaveis['regioes'] = $this->m_base->get_regioes();
				$variaveis['sedes'] = $this->m_base->get_sedes();

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
?>