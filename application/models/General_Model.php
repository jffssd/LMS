<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General_Model extends CI_Model {

	public function get_regioes($id = null){

		if ($id) {
			$this->db->where('id', $id);
		}
		$this->db->order_by("id", 'desc');
		return $this->db->get('regiao');

    }

    public function get_tecnicos($id = null){

		if ($id) {
			$this->db->where('id', $id);
		}
		$this->db->order_by("id", 'desc');
		return $this->db->get('profissional');

		}

}
