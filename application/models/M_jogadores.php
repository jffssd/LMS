<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jogadores extends CI_Model {

	public function get_jogadores($id = null){
		
		if ($id) {

			$this->db->where('id', $id);
		}



		$this->db->order_by("id", 'desc');
		return $this->db->get('jogador');

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
