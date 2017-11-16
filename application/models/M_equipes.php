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
