<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */
	
	public function index()
	{
		
		$variaveis['cadastros'] = $this->m_cadastros->get_cadastros();
		$this->load->view('template/header', $variaveis);
		$this->load->view('template/sidebar', $variaveis);
		$this->load->view('v_home', $variaveis);
		$this->load->view('template/footer', $variaveis);
	}
}
