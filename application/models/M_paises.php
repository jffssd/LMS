<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_paises extends CI_Model {
	
	public function get_paises($id = null){
		
		if ($id) {
			$this->db->where('id', $id);
		}
		$this->db->order_by("id", 'desc');
		return $this->db->get('pais');

	}
}
