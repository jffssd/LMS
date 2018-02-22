<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transferencia extends CI_Controller {

	public function index(){

        $data['transf_profissional'] = $this->Transferencias_Model->get_transferencias_profissionais();
		$data['transf_jogadores'] = $this->Transferencias_Model->get_transferencias_jogadores();


		$data['title'] = 'Detalhes das Transferências';
		$referencia['item'] = 'transferencia';
		$referencia['sub-item'] = 'todos';

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/administrador/sidemenu', $referencia);
		$this->load->view('templates/page_start');
        $this->load->view('transferencia/v_transferencia', $data);
		$this->load->view('templates/footer');

	}

	public function create(){
		
		$data['tipos'] = array( 
								1 => 'Entrada',
								2 => 'Saída',
								3 => 'Empréstimo Ida',
								4 => 'Empréstimo Volta',
		);
		
		$data['equipes'] = $this->Equipes_Model->get_equipes();
		$data['tecnicos'] = $this->General_Model->get_tecnicos();
		$data['jogadores'] = $this->Jogadores_Model->get_jogadores();


		$data['title'] = 'Registrar nova Transferência';
		$referencia['item'] = 'transferencia';
		$referencia['sub-item'] = 'cadastro';

		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/administrador/sidemenu', $referencia);
		$this->load->view('templates/page_start');
		$this->load->view('transferencia/v_transferencia_cadastro', $data);
		$this->load->view('templates/footer');


	}

	public function store(){
		
		$this->load->library('form_validation');
		
		if($this->input->post('pessoa') == 1){
			$regras = array(
				array(
						'field' => 'jogador',
						'label' => 'Jogador',
						'rules' => 'required'
				),
				array(
						'field' => 'equipe',
						'label' => 'Equipe',
						'rules' => 'required'		                
				),
				array(
						'field' => 'tipo',
						'label' => 'Tipo',
						'rules' => 'required'		                
				)
		);
		}else{
			$regras = array(
				array(
						'field' => 'tecnico',
						'label' => 'Técnico',
						'rules' => 'required'
				),
				array(
						'field' => 'equipe',
						'label' => 'Equipe',
						'rules' => 'required'		                
				),
				array(
						'field' => 'tipo',
						'label' => 'Tipo',
						'rules' => 'required'		                
				),
				array(
						'field' => 'cargo',
						'label' => 'Cargo',
						'rules' => 'required'		                
				)
		);
		}

		$this->form_validation->set_rules($regras);
		
		if ($this->form_validation->run() == FALSE) {

			$data['tipos'] = array( 
				1 => 'Entrada',
				2 => 'Saída',
				3 => 'Empréstimo Ida',
				4 => 'Empréstimo Volta',
			);

			$data['equipes'] = $this->Equipes_Model->get_equipes();
			$data['tecnicos'] = $this->General_Model->get_tecnicos();
			$data['jogadores'] = $this->Jogadores_Model->get_jogadores();

			$data['title'] = 'Registrar nova Transferência';
			$referencia['item'] = 'transferencia';
			$referencia['sub-item'] = 'cadastro';

			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/administrador/sidemenu', $referencia);
			$this->load->view('templates/page_start');
			$this->load->view('transferencia/v_transferencia_cadastro', $data);
			$this->load->view('templates/footer');
		
			} else {
					
			$id = $this->input->post('id');

			$pessoa = $this->input->post('pessoa');

			if($pessoa == 1){
				$dados = array(
					"jogador_id" => $this->input->post('jogador'),
					"tipo" => $this->input->post('tipo'),
					"equipe_base_id" => $this->input->post('equipe'),
					"data_transacao" => $this->input->post('data_transf'),
					"status" => 1,
					"jogador_custom_id" => 1
				);
			}elseif($pessoa == 2){
				$dados = array(
					"profissional_id" => $this->input->post('tecnico'),
					"tipo" => $this->input->post('tipo'),
					"equipe_base_id" => $this->input->post('equipe'),
					"data_transacao" => $this->input->post('data_transf'),
					"cargo_id" => $this->input->post('cargo'),
					"status" => 1,
					"jogador_custom_id" => 1
				);
			}else{
				$this->session->set_flashdata('error', 'Erro ao realizar transferencia.');
				redirect('transferencia');
			}

			if($pessoa == 1){
				if ($this->Transferencias_Model->store_jogador($dados, $id)) {

					$this->session->set_flashdata('success', 'Transferencia de jogador cadastrada com sucesso!');
					redirect('transferencia');
				} else {
	
					$this->session->set_flashdata('error', 'Erro ao realizar transferencia de jogador.');
					redirect('transferencia');
				}
			}else{
				if ($this->Transferencias_Model->store_profissional($dados, $id)) {

					$this->session->set_flashdata('success', 'Transferencia de técnico cadastrada com sucesso!');
					redirect('transferencia');
				} else {
	
					$this->session->set_flashdata('error', 'Erro ao realizar transferencia de técnico.');
					redirect('transferencia');
				}
			}

		}
	}

    public function delete($id = null,$pessoa) {
		if($pessoa == 1){
			if ($this->Transferencias_Model->delete_transf_jogador($id)) {
                $this->session->set_flashdata('success', 'Transferência de jogador excluída com sucesso!');
                redirect('transferencia');
			}
		}elseif($pessoa == 2){
			if ($this->Transferencias_Model->delete_transf_tecnico($id)) {
                $this->session->set_flashdata('success', 'Transferência de técnico excluída com sucesso!');
                redirect('transferencia');
			}
		}else{
			$this->session->set_flashdata('error', 'Um erro aconteceu ao tentar processar a exclusão da Transferência.');
			redirect('transferencia');
		}

	}
}
