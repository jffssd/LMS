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
			$this->db->select('jogador.nick, jogador.at_trab, jogador.at_ment, jogador.at_consist, jogador.at_mec, jogador.at_vis, jogador.foto, jogador.funcao, jogador.pais_id');
			$this->db->join('equipe', 'equipe_jogador.equipe_id = equipe.id');
			$this->db->join('jogador', 'equipe_jogador.jogador_id = jogador.id');
			$this->db->where('equipe_jogador.equipe_id', $id);
			$this->db->order_by("jogador.nick", 'desc');
			
		}
		return $this->db->get('equipe_jogador');

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
