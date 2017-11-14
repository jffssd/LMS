<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_paises extends CI_Model {
	
	public function get_paises($id = null){
		
		if ($id) {
			$this->db->where('id', $id);
		}
		$this->db->order_by("nome");
		return $this->db->get('pais');

	}

	public function store($dados = null, $id = null) {
		
		if ($dados) {
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update("pais", $dados)) {
					return true;
				} else {
					return false;
				}
			} else {
				if ($this->db->insert("pais", $dados)) {
					return true;
				} else {
					return false;
				}
			}
		}
		
	}

	public function delete($id = null){
		if ($id) {
			return $this->db->where('id', $id)->delete('pais');
		}
	}
}
