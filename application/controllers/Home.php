<?php
class Home extends CI_Controller{

	public function __construct(){
		
		parent::__construct();
	}

	public function index(){
		
        $data['title'] = 'Home Page';
        $referencia['item'] = '';
        $referencia['sub-item'] = '';

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidemenu', $referencia);
        $this->load->view('templates/page_start');
		$this->load->view('pages/home', $data);
        $this->load->view('templates/footer');

	}
}