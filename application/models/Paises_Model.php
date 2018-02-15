<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paises_Model extends CI_Model {
	
	public function get_paises($id = null){
        
        if($id){
            $this->db->where('id',$id);
        }

		$this->db->order_by("nome");
		return $this->db->get('pais');
	}

	public function store($id = null, $dados = null) {
        
        //Verifica se são passados os dados
		if ($dados) {
            //Se possuir parametro 'id' é considerado como update
			if ($id) {
				$this->db->where('id', $id);
				if ($this->db->update("pais", $dados)) {
					return true;
				} else {
					return false;
                }

            //Se não possuir parametro 'id' é considerado como insert
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