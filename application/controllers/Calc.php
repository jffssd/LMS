<?php 
	class Calc extends CI_Controller{

	public function index(){
    	
    	$data['jogadores'] = $this->Jogadores_Model->get_jogadores();

		$this->load->view('templates/header');
		$this->load->view('pages/calc', $data);
		$this->load->view('templates/footer');
	}

	public function soma(){
		$n1 = $this->input->post('numero1');
		$n2 = $this->input->post('numero2');
		echo $n1 + $n2;
	}

	public function profile(){
		$id = intval($this->input->post('id'));
		$profile_pic = $this->Jogadores_Model->get_profile_pic_by_id($id);
		echo $profile_pic->foto;
	}

		public function pfl(){
		$id = intval($this->input->post('id'));
		$profile_pic = $this->Jogadores_Model->get_profile_pic_by_id($id);
		echo json_encode($profile_pic);
	}
}