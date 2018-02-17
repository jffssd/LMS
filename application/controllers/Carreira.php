<?php
class Carreira extends CI_Controller{

	public function __construct(){
		
		parent::__construct();
		if(!$this->session->userdata('login')) {
			redirect('home');
		}
    }

    public function index(){

        $id = $this->session->userdata('usuario_id');

		if ($this->Carreira_Model->possui_carreira_jogador_ativa($id)) {
     
            $data['title'] = 'Carreira - Continuar';
            $data['jogador_custom'] = $this->Carreira_Model->get_jogador_custom($id);
                
            $this->load->view('templates/header');
            $this->load->view('templates/carreira/navbar');
            $this->load->view('templates/carreira/page_start');
            $this->load->view('carreira/inicio', $data);
            $this->load->view('templates/carreira/footer');

        }else{

        }

    }
}