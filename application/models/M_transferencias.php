<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transferencias extends CI_Model {

	public function get_transferencias_jogadores($id = null){
		
		if ($id) {

			$this->db->where('tj.id', $id);
		}else{

			$this->db->select("j.nick, j.foto, j.funcao_id, f.nome as funcao_nome, p.flag as pais_flag, p.nome as pais_nome, e.nome as equipe_nome, e.logo as equipe_logo, tj.data_transacao, tj.tipo");
			$this->db->join('jogador j','tj.jogador_id = j.id');
			$this->db->join('equipe e','tj.equipe_base_id = e.id');
			$this->db->join('funcao f','j.funcao_id = f.id');
			$this->db->join('pais p','j.pais_id = p.id');
			$this->db->order_by("tj.data_transacao", 'desc');
			$this->db->order_by("tj.tipo", 'asc');
		}

		return $this->db->get('transferencia_jogador tj');
	}

	public function store($dados = null, $id = null) {
		
		if ($dados) {
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update("jogador", $dados)) {
					return true;
				} else {
					return false;
				}
			} else {
				if ($this->db->insert("jogador", $dados)) {
					return true;
				} else {
					return false;
				}
			}
		}
		
	}

	public function delete($id = null){
		if ($id) {
			return $this->db->where('id', $id)->delete('jogador');
		}
	}
}
