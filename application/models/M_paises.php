<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pais extends CI_Model {
	
	public function get_pais($id = null){
		
		if ($id) {
			$this->db->where('id', $id);
		}
		$this->db->order_by("id", 'desc');
		return $this->db->get('pais');

	}
}
