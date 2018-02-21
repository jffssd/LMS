<?php
class Configuracoes extends CI_Controller{

	public function __construct(){
		
		parent::__construct();
	}

	public function index(){
		
		$data = NULL;
		$this->load->view('configs/v_temas', $data);

	}
}