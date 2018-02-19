<?php
class Campeonatos extends CI_Controller{

	public function __construct(){
		
		parent::__construct();
	}

	public function index(){
		
		$data['title'] = 'Índice';
			
		$data['campeonatos'] = $this->Campeonatos_Model->get_campeonatos();
		$this->load->view('campeonato/v_campeonato', $data);
	}

	public function detalhes($id = null){
		
		if ($id) {
			$campeonato = $this->Campeonatos_Model->get_campeonato_info($id);
			//$data['tabela_campeonato'] = $this->Campeonatos_Model->get_tabela_campeonato($id);
			//$data['series_campeonato'] = $this->Campeonatos_Model->get_series_campeonato($id);

			if ($campeonato->num_rows() > 0 ) {

				$data['titulo'] = 'Visualizar Campeonato';

				$data['id'] = $campeonato->row()->id;
				$data['nome'] = $campeonato->row()->nome;
				$data['ano'] = $campeonato->row()->ano;
				$data['temporada'] = $campeonato->row()->temporada;
				$data['logo'] = $campeonato->row()->logo;

				$data['regiao_id'] = $campeonato->row()->regiao_id;
				$data['regiao_sigla'] = $campeonato->row()->regiao_sigla;

				 // Número de times na fase de grupos
				$data['fg_numDeTimes'] = $campeonato->row()->fg_numDeTimes;
				
				// Número de divisões do campeonato
				$data['numDeDivisoes'] = $campeonato->row()->numDeDivisoes; 

				// Quantidades de jogos numa série na fase de grupos
				$data['fg_qtd_jogos_serie'] = $campeonato->row()->fg_qtd_jogos_serie; 

				// Quantidades de times na fase de playoff
				$data['pl_numDeTimes'] = $campeonato->row()->pl_numDeTimes;

				// Quantidades de jogos na série na fase de playoff
				$data['pl_qtd_jogos_serie'] = $campeonato->row()->pl_qtd_jogos_serie;

				// Quantidades de jogos na série final na fase de playoff
				$data['pl_qtd_jogos_serie_final'] = $campeonato->row()->pl_qtd_jogos_serie_final;

			//	$data['regioes'] = $this->General_Model->get_regioes();

				$this->load->view('campeonato/v_campeonato_detalhes', $data);
			
			} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $data);
			}
		}else{
			redirect('campeonatos');
		}
	}
}