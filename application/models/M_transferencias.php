<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transferencias extends CI_Model {

	public function get_jogadores($id = null){
		
		if ($id) {
			$this->db->where('j.id', $id);
		}else{
			$this->db->select('j.nome,j.nick,j.sobrenome,j.foto, f.nome as funcao_nome, j.funcao_id, p.flag as pais_flag, p.nome as pais_nome');
			$this->db->join('funcao f','j.funcao_id = f.id');
			$this->db->join('pais p','j.pais_id = p.id');
			$this->db->order_by("j.id", 'desc');
		}
		return $this->db->get('jogador j');
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
