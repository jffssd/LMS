<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_equipes extends CI_Model {

	public function get_equipes($id = null){
		
		if ($id) {

			$this->db->where('id', $id);
		}



		$this->db->order_by("id", 'desc');
		return $this->db->get('equipe');

	}

	public function get_jogador_by_equipe($id = null){
		
		if ($id) {
			$this->db->select('jogador_id as j_id,jogador.nick, jogador.at_trab, jogador.at_ment, jogador.at_consist, jogador.at_mec, jogador.at_vis, jogador.foto, jogador.funcao_id, jogador.pais_id, funcao.nome as f_nome, pais.flag as pflag, equipe_jogador.titular as titular');
			$this->db->join('equipe', 'equipe_jogador.equipe_id = equipe.id');
			$this->db->join('jogador', 'equipe_jogador.jogador_id = jogador.id');
			$this->db->join('funcao', 'jogador.funcao_id = funcao.id');
			$this->db->join('pais', 'jogador.pais_id = pais.id');
			$this->db->where('equipe_jogador.equipe_id', $id);
			$this->db->order_by("jogador.funcao_id", 'asc');
			$this->db->order_by("equipe_jogador.titular", 'desc');
			
		}
		return $this->db->get('equipe_jogador');

	}

	public function get_campeonato_titulos_by_equipe($id = null){
		if ($id) {
			$this->db->select('c.ano as camp_ano, c.nome as camp_nome, e.nome as equipe_nome, ec.posicao as ec_posicao');
			$this->db->join('campeonato c', 'ec.campeonato_id = c.id');		
			$this->db->join('equipe e', 'ec.equipe_id = e.id');
			$this->db->where('ec.equipe_id', $id);
			$this->db->order_by('c.ano', 'asc');
			$this->db->order_by('ec.posicao', 'asc');
			
		}
		return $this->db->get('equipe_campeonato ec');

	}

	public function get_tecnico_by_equipe($id = null){
		
		if ($id) {
			$this->db->select('tecnico.nome, tecnico.nick, tecnico.sobrenome, tecnico.foto');
			$this->db->join('equipe', 'equipe.tecnico_id = tecnico.id');
			$this->db->where('equipe.id', $id);
			$this->db->order_by("tecnico.nome", 'desc');
			
		}
		return $this->db->get('tecnico');
	}

	public function store($dados = null, $id = null) {
		
		if ($dados) {
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update("equipe", $dados)) {
					return true;
				} else {
					return false;
				}
			} else {
				if ($this->db->insert("equipe", $dados)) {
					return true;
				} else {
					return false;
				}
			}
		}
		
	}

	public function delete($id = null){
		if ($id) {
			return $this->db->where('id', $id)->delete('equipe');
		}
	}
}
