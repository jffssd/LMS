<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pais extends CI_Controller {

	/**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */
	
	public function index()
	{
		$variaveis['paises'] = $this->m_paises->get_paises();
		$this->load->view('template/header', $variaveis);
		$this->load->view('template/sidebar', $variaveis);
		$this->load->view('v_pais', $variaveis);
		$this->load->view('template/footer', $variaveis);
	}
}
