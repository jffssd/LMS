<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transferencia extends CI_Controller {

	/**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */
	
	public function index()
	{
		$variaveis['transf_jogadores'] = $this->m_transferencias->get_transferencias_jogadores();
		$variaveis['conteudo'] = $this->load->view('transferencias/v_transferencias', $variaveis, true);
		$variaveis['sidebar'] = $this->load->view('template/sidebar', $variaveis, true);
		$this->load->view('template/template', $variaveis);
	}
}
