<?php
class Carreira extends CI_Controller{

	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata('login')) {
			redirect('home');
		}
    }

    public function index(){
		
		$data['title'] = 'Carreira - Início';
			
		$data['equipes'] = $this->Equipes_Model->get_equipes();
        
        $this->load->view('templates/header');
        $this->load->view('templates/carreira/navbar');
        $this->load->view('templates/carreira/page_start');
        $this->load->view('carreira/inicio', $data);
        $this->load->view('templates/carreira/footer');
    }
    
    public function criar(){

        if(!$this->session->userdata('login')) {
            redirect('home');
        }
        $data['title'] = 'Iniciar Carreira';
        $data['tipo'] = array(  1 => 'Jogador',
                                2 => 'Técnico'
        );
        $data['paises'] = $this->Paises_Model->get_paises();
        $data['funcoes'] = $this->Jogadores_Model->get_funcoes();
        $data['personalidades'] = $this->Jogadores_Model->get_personalidades();
        
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidemenu');
        $this->load->view('carreira/criar', $data);
        $this->load->view('templates/footer');
    }
}