<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carreira_Model extends CI_Model {

	public function get_campeonatos($id = null){

		if ($id) {
			$this->db->where('id', $id);
		}
		$this->db->order_by("id", 'asc');
		return $this->db->get('campeonato');
	}

	public function get_campeonatos_series($id){

		$this->db->where('campeonato_id', $id);
		$this->db->order_by("id", 'asc');
		return $this->db->get('campeonato_serie');
	}


	public function get_jogador_custom($id){
	
		$this->db->where('usuario_id', $id);
		$this->db->order_by("id", 'asc');
		return $this->db->get('jogador_custom');
	}

	public function possui_carreira_jogador_ativa($id){

		$this->db->where('usuario_id', $id);
		$this->db->where('status', 'A');

		$result = $this->db->get('jogador_custom');

		if ($result->num_rows() == 1) {
			return $result->row(0);
		}else{
			return false;
		}
	}
}