<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campeonatos_Model extends CI_Model {

	public function get_campeonatos($id = null){
		if ($id) {
			$this->db->where('id', $id);
		}
		$this->db->order_by("id", 'desc');
		return $this->db->get('campeonato');
	}

	public function get_campeonato_info($id){

			$this->db->select('campeonato.id, campeonato.nome, campeonato.regiao_id, campeonato.ano, campeonato.temporada, campeonato.status, campeonato.logo, campeonato_formato.numDeTimes as fg_numDeTimes, campeonato_formato.numDeDivisoes, campeonato_formato.qtd_jogos_serie as fg_qtd_jogos_serie, campeonato_playoffs_tipos.noDeTimes as pl_numDeTimes, campeonato_playoffs_tipos.qtd_jogos_serie as pl_qtd_jogos_serie, campeonato_playoffs_tipos.qtd_jogos_serie_final as pl_qtd_jogos_serie_final, regiao.sigla as regiao_sigla');

			$this->db->join('campeonato_formato', 'campeonato.camp_formato_id = campeonato_formato.id');
			$this->db->join('campeonato_playoffs_tipos', 'campeonato.playoffs_id = campeonato_playoffs_tipos.id');
			$this->db->join('regiao', 'campeonato.regiao_id = regiao.id');

			$this->db->where('campeonato.id', $id);

			return $this->db->get('campeonato');
	}

	public function get_tabela_campeonato($id){

		$sql = 'CALL proc_get_tabela_campeonato('.$id.')';

		$result = $this->db->query($sql);
		$this->db->close();
		return $result->result_array();
	}

	public function get_series_campeonato($id){

		$sql = 'CALL proc_get_series_campeonato('.$id.')';

		$result = $this->db->query($sql);
		$this->db->close();
		return $result->result_array();
	}

	public function get_serie_jogos($id){

		$this->db->select('cj.serie_id, cj.jogo_num, cj.placar_equipe1, e1.logo as e1logo, e1.sigla as e1sigla, e1.nome as e1nome, e2.logo as e2logo, e2.sigla as e2sigla, e2.nome as e2nome, cj.placar_equipe2, cj.status');

		$this->db->join('equipe e1', 'cj.equipe_id1 = e1.id');
		$this->db->join('equipe e2', 'cj.equipe_id2 = e2.id');

		$this->db->where('cj.serie_id', $id);
		return $this->db->get('campeonato_jogo cj');
	}

	public function get_campeonato_formato($id){
		$this->db->where('id', $id);
		$query = $this->db->get('campeonato_formato');
		return $query->result_array();
	}

	public function inserir_campeonato_base($dados = null) {

		if ($this->db->insert('campeonato', $dados)) {
			$last_id = $this->db->insert_id();
			return $last_id;
		} else {
			return false;
		}
	}
}