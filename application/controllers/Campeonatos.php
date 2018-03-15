<?php
class Campeonatos extends CI_Controller{

	public function __construct(){

		parent::__construct();
	}

	public function index(){

		$data['title'] = 'Índice';
		$referencia['item'] = 'campeonatos';
		$referencia['sub-item'] = 'todos';

		$data['campeonatos'] = $this->Campeonatos_Model->get_campeonatos();

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidemenu', $referencia);
		$this->load->view('templates/page_start');
		$this->load->view('campeonato/v_campeonato', $data);
		$this->load->view('templates/footer');
	}

	public function detalhes($id = null){

		if ($id) {
			$campeonato = $this->Campeonatos_Model->get_campeonato_info($id);
			$data['tabela_campeonato'] = $this->Campeonatos_Model->get_tabela_campeonato($id);
			$data['series_campeonato'] = $this->Campeonatos_Model->get_series_campeonato($id);

			if ($campeonato->num_rows() > 0 ) {

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

				$data['titulo'] = 'Visualizar Campeonato';
				$referencia['item'] = 'campeonatos';
				$referencia['sub-item'] = 'todos';

				$this->load->view('templates/header');
				$this->load->view('templates/navbar');
				$this->load->view('templates/sidemenu', $referencia);
				$this->load->view('templates/page_start');
				$this->load->view('campeonato/v_campeonato_detalhes', $data);
				$this->load->view('templates/footer');

			} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $data);
			}
		}else{
			redirect('campeonatos');
		}
	}

	public function detalhes_serie($id = null){

		if ($id) {

			$data['titulo'] = 'Visualizar Campeonato';
			$referencia['item'] = 'campeonatos';
			$referencia['sub-item'] = 'todos';

			$data['serie'] = $this->Campeonatos_Model->get_serie_jogos($id);

			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidemenu', $referencia);
			$this->load->view('templates/page_start');
			$this->load->view('campeonato/v_campeonato_serie_detalhes', $data);
			$this->load->view('templates/footer');

		} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $data);
		}
	}


	public function cadastrar(){
		$this->load->view('templates/header');

		$this->load->view('campeonato/v_campeonato_cadastro');
	}

	public function processar_inclusao(){

		$dados = array(

			"nome" => $this->input->post('nome'),
			"ano" => $this->input->post('ano'),
			"temporada" => $this->input->post('temporada'),
			"playoffs_id" => $this->input->post('playoffs_id'),
			"camp_formato_id" => $this->input->post('camp_formato_id'),
			"regiao_id" => $this->input->post('regiao_id'),
			"logo" => NULL,
			"status" => 'A'
		);

		$equipes = $this->input->post('equipes');
		/*
		*	campos: id, descricao, numDeTimes, qtd_jogos_serie, jogarInterDiv, series_semana
		*	call $camp_formato[0]['numDeTimes']
		*/
		$camp_formato = $this->Campeonatos_Model->get_campeonato_formato($dados['camp_formato_id']);

		/*
		*	campos: id, descricao, noDeTimes, qtd_jogos_serie, qtd_jogos_serie_final, duplaEliminacao,
		*	call $playoffs_info[0]['qtd_jogos_serie']
		*/
		$playoffs_info = $this->Campeonatos_Model->get_playoffs_formato($dados['playoffs_id']);

		//Cadastra campeonato e recebe o seu id
		$id_camp =  $this->Campeonatos_Model->inserir_campeonato_base($dados);


		$count = 0;
		foreach($equipes as $value){
			$count++;
			$tabela[$count] = array(
								'campeonato_id' => $id_camp,
								'equipe_id' => $value
							);
		}
		// Cria uma a tabela de pontos corridos do campeonato
		if($this->Campeonatos_Model->gerar_tabela_pontuacao($tabela)){

			$qtd_semanas = count($equipes) - 1;
			$qtd_serie_semana = 4;


			/*Algoritimo Gerar series*/
			$qtde_times = count($equipes); // Quantidade de Times
			$num_rodadas = $qtde_times - 1; //numero de rodadas
			$times_por_rodada = 2 * (int) ($qtde_times / 2); //Calcula quantidade de times por rodada
			$casa = array(); //guarda os jogos de quem joga em casa
			$fora = array(); // guarda os jogos de quem joga fora
			$jogos = array(); // guarda os jogos no final
			$jogos_temp = array(); //array temporário, verifica quem já jogou em cada rodada
			for ($i = 0; $i < $qtde_times; $i++) { //For para caminhar entre os times
				for ($j = $i; $j < $qtde_times; $j++) { //For para caminha entre os adversários
					if ($equipes[$i] != $equipes[$j]) { //verifica pra não deixar jogar um time contra ele mesmo
						if ($j % 2 == 0) { //if pra ver quem joga em casa ou fora
							$casa[] = $equipes[$i];
							$fora[] = $equipes[$j];
						} else {
							$casa[] = $equipes[$j];
							$fora[] = $equipes[$i];
						}
					}
				}
			}

			//parte que verifica quem já jogou em qual rodada
			for ($rodada = 0; $rodada < $num_rodadas; $rodada++) {
				for ($t = 0; $t < count($casa); $t++) {
					if (($casa[$t] != "") and ((in_array($casa[$t], $jogos_temp)) == false) and (((in_array($fora[$t], $jogos_temp)) == false))) {
						$jogos_temp[] = $casa[$t];
						$jogos_temp[] = $fora[$t];
						$casa[$t] = "";
						$fora[$t] = "";
					}
				}
				$jogos[($rodada + 1)] = $jogos_temp;
				$jogos_temp = array();
			}

			$fase = 1;
			$temporada = 1;
			$qtd_jogos_serie = 3;
			$equipe_vit = 1;
			$status = 'A';
			for ($rod = 0; $rod < $num_rodadas; $rod++) {
				$semana =  ($rod + 1);
				for ($jog = 0; $jog < $times_por_rodada; $jog+=2) {
					$time1 = $jogos[($rod + 1)][$jog];
					$time2 = $jogos[($rod + 1)][($jog + 1)];
					if(!$this->Campeonatos_Model->gera_series_fase_grupos($id_camp, $semana, $time1, $time2, $equipe_vit, $fase, $temporada, $qtd_jogos_serie, $status)){
						echo 'Um erro acontenceu ao tentar gerar as séries da fase de grupo';
					}else{
						continue;
					}
				}
			}
			echo 'aparentemente deu certo...';
		}else{

		}
	}
}