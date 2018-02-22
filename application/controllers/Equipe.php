<?php
class Equipe extends CI_Controller{

	public function __construct(){
		
		parent::__construct();
		if($this->session->userdata('permissao') != 1) {
			redirect('users/profile');
		}
	}

	public function index(){
		
		$data['equipes'] = $this->Equipes_Model->get_equipes();

        $data['title'] = 'Todos as Equipes';
        $referencia['item'] = 'equipe';
        $referencia['sub-item'] = 'todos';

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/administrador/sidemenu', $referencia);
        $this->load->view('templates/page_start');
		$this->load->view('equipe/v_equipe', $data);
        $this->load->view('templates/footer');

	}

	public function create(){

		$status_equipe = array( 
								1 => 'Ativo',
								2 => 'Inativo'
		);
		$data['status_equipe'] = $status_equipe;
		$data['paises'] = $this->Paises_Model->get_paises();
		$data['regioes'] = $this->General_Model->get_regioes();
		$data['sedes'] = $this->General_Model->get_sedes();
		$data['tecnicos'] = $this->General_Model->get_tecnicos();


		$data['title'] = 'Cadastrar Equipe';
        $referencia['item'] = 'equipe';
        $referencia['sub-item'] = 'cadastro';

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/administrador/sidemenu', $referencia);
        $this->load->view('templates/page_start');
		$this->load->view('equipe/v_equipe_cadastro', $data);
        $this->load->view('templates/footer');

	}

	public function store_create(){

		$this->load->library('form_validation');

		$regras = array(
		        array(
		                'field' => 'nome',
		                'label' => 'Nome',
		                'rules' => 'required|callback_check_nome_equipe_exists'
		        ),
		        array(
		                'field' => 'sigla',
		                'label' => 'Sigla',
		                'rules' => 'required|callback_check_sigla_equipe_exists'		                
		        ),
		        array(
		                'field' => 'pais',
		                'label' => 'Pais',
		                'rules' => 'required'		                
		        ),
		        array(
		                'field' => 'regiao',
		                'label' => 'Região',
		                'rules' => 'required'		                
		        ),
		        array(
		                'field' => 'sede',
		                'label' => 'Sede',
		                'rules' => 'required'		                
		        ),
		        array(
		                'field' => 'logo',
		                'label' => 'Logo',
		                'rules' => 'required'		                
				),
		        array(
		                'field' => 'cor_primaria',
		                'label' => 'Cor Primária',
		                'rules' => 'required'		                
				),
		        array(
		                'field' => 'cor_secundaria',
		                'label' => 'Cor Secundária',
		                'rules' => 'required'		                
		        )
		);
		
		$this->form_validation->set_rules($regras);

		if ($this->form_validation->run() == FALSE) {

			$status_equipe =  array( 
						1 => 'Ativo',
						2 => 'Inativo'
						);
			$data['status_equipe'] = $status_equipe;
			$data['paises'] = $this->Paises_Model->get_paises();
			$data['regioes'] = $this->General_Model->get_regioes();
			$data['sedes'] = $this->General_Model->get_sedes();
			$data['tecnicos'] = $this->General_Model->get_tecnicos();


			$data['title'] = 'Cadastrar Equipe';
	        $referencia['item'] = 'equipe';
	        $referencia['sub-item'] = 'cadastro';

	        $this->load->view('templates/header');
	        $this->load->view('templates/navbar');
	        $this->load->view('templates/administrador/sidemenu', $referencia);
	        $this->load->view('templates/page_start');
			$this->load->view('equipe/v_equipe_cadastro', $data);
	        $this->load->view('templates/footer');

		} else {
			
			$dados = array(
			
				"nome" => $this->input->post('nome'),
				"sigla" => $this->input->post('sigla'),
				"pais_id" => $this->input->post('pais'),
				"regiao_id" => $this->input->post('regiao'),
				"sede_id" => $this->input->post('sede'),
				"logo" => $this->input->post('logo'),
				"pais_id" => $this->input->post('pais'),
				"cor_primaria" => $this->input->post('cor_primaria'),
				"cor_secundaria" => $this->input->post('cor_secundaria'),
				"site" => $this->input->post('site'),
				"social_fb" => $this->input->post('social_fb'),
				"social_tw" => $this->input->post('social_tw'),
				"social_in" => $this->input->post('social_in'),
				"valor" => 10,
				"status" => 'A'
			);
			if ($this->Equipes_Model->store($dados, $id)) {
				$this->session->set_flashdata('success', 'Equipe cadastrada com sucesso!');
				redirect('equipe');
			} else {
				$this->session->set_flashdata('error', 'Erro ao cadastrar equipe.');
				redirect('equipe');
			}
		}
	}

	public function store_edit(){

		$data['title'] = 'NOVO REGISTRO DE EQUIPE';

		$this->load->library('form_validation');

		$regras = array(
				array(
					'field' => 'pais',
					'label' => 'Pais',
					'rules' => 'required'		                
				),
				array(
					'field' => 'regiao',
					'label' => 'Região',
					'rules' => 'required'		                
				),
				array(
					'field' => 'sede',
					'label' => 'Sede',
					'rules' => 'required'		                
				),
				array(
					'field' => 'logo',
					'label' => 'Logo',
					'rules' => 'required'		                
					),
				array(
					'field' => 'cor_primaria',
					'label' => 'Cor Primária',
					'rules' => 'required'		                
					),
				array(
					'field' => 'cor_secundaria',
					'label' => 'Cor Secundária',
					'rules' => 'required'		                
				)
		);
		
		$this->form_validation->set_rules($regras);

		if ($this->form_validation->run() == FALSE) {

			$status_equipe =  array( 
						1 => 'Ativo',
						2 => 'Inativo'
						);
			$data['status_equipe'] = $status_equipe;
			$data['paises'] = $this->Paises_Model->get_paises();
			$data['regioes'] = $this->General_Model->get_regioes();
			$data['sedes'] = $this->General_Model->get_sedes();
			$data['tecnicos'] = $this->General_Model->get_tecnicos();

			$data['title'] = 'Cadastrar Equipe';
	        $referencia['item'] = 'equipe';
	        $referencia['sub-item'] = 'cadastro';

	        $this->load->view('templates/header');
	        $this->load->view('templates/navbar');
	        $this->load->view('templates/administrador/sidemenu', $referencia);
	        $this->load->view('templates/page_start');
			$this->load->view('equipe/v_equipe_cadastro', $data);
	        $this->load->view('templates/footer');

		} else {
			
			$id = $this->input->post('id');
			
			$dados = array(
			
				"pais_id" => $this->input->post('pais'),
				"regiao_id" => $this->input->post('regiao'),
				"sede_id" => $this->input->post('sede'),
				"logo" => $this->input->post('logo'),
				"pais_id" => $this->input->post('pais'),
				"cor_primaria" => $this->input->post('cor_primaria'),
				"cor_secundaria" => $this->input->post('cor_secundaria'),
				"site" => $this->input->post('site'),
				"social_fb" => $this->input->post('social_fb'),
				"social_tw" => $this->input->post('social_tw'),
				"social_in" => $this->input->post('social_in'),
				"valor" => 10,
				"status" => 'A'
			);
			if ($this->Equipes_Model->store($dados, $id)) {
				$this->session->set_flashdata('success', 'Equipe cadastrada com sucesso!');
				redirect('equipe');
			} else {
				$this->session->set_flashdata('error', 'Erro ao cadastrar equipe.');
				redirect('equipe');
			}
		}
	}

	public function edit($id = null){
		
		if ($id) {
			$equipes = $this->Equipes_Model->get_equipes($id);
			$status_equipe = array( 
				1 => 'Ativo',
				2 => 'Inativo'
			);

			if ($equipes->num_rows() > 0 ) {

				$data['id'] = $equipes->row()->id;
				$data['nome'] = $equipes->row()->nome;
				$data['sigla'] = $equipes->row()->sigla;
				$data['regiao'] = $equipes->row()->regiao_id;
				$data['pais'] = $equipes->row()->pais_id;
				$data['status'] = $equipes->row()->status;
				$data['logo'] = $equipes->row()->logo;
				$data['cor_primaria'] = $equipes->row()->cor_primaria;
				$data['cor_secundaria'] = $equipes->row()->cor_secundaria;

				$data['site'] = $equipes->row()->site;
				$data['social_fb'] = $equipes->row()->social_fb;
				$data['social_tw'] = $equipes->row()->social_tw;
				$data['social_in'] = $equipes->row()->social_in;

				$data['paises'] = $this->Paises_Model->get_paises();
				$data['regioes'] = $this->General_Model->get_regioes();
				$data['sedes'] = $this->General_Model->get_sedes();
				$data['tecnicos'] = $this->General_Model->get_tecnicos();
				
				$data['status_equipe'] = $status_equipe;


				$data['title'] = 'Editar Equipe';
		        $referencia['item'] = 'equipe';
		        $referencia['sub-item'] = 'editar';

		        $this->load->view('templates/header');
		        $this->load->view('templates/navbar');
		        $this->load->view('templates/administrador/sidemenu', $referencia);
		        $this->load->view('templates/page_start');
				$this->load->view('equipe/v_equipe_edicao', $data);
		        $this->load->view('templates/footer');

			} else {
				$data['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $data);
			}
		}
	}

	public function delete($id = null) {

		if ($this->Equipes_Model->delete($id)) {
			$this->session->set_flashdata('success', 'Equipe excluída sucesso!');
			redirect('equipe');
		} else {
			$this->session->set_flashdata('error', 'Erro ao excluir equipe.');
			redirect('equipe');
		}
	}

	public function detalhes($id = null){
		
		if ($id) {
			$equipe = $this->Equipes_Model->get_equipes($id);
			$data['jogador_equipe'] = $this->Equipes_Model->get_jogador_by_equipe($id);
			$data['equipe_titulos'] = $this->Equipes_Model->get_campeonato_titulos_by_equipe($id);

			if ($equipe->num_rows() > 0 ) {

				$data['id'] = $equipe->row()->id;
				$data['nome'] = $equipe->row()->nome;
				$data['sigla'] = $equipe->row()->sigla;
				$data['regiao'] = $equipe->row()->regiao_id;
				$data['pais'] = $equipe->row()->pais_id;
				$data['status'] = $equipe->row()->status;
				$data['sede'] = $equipe->row()->sede_id;
				$data['logo'] = $equipe->row()->logo;
				$data['cor_primaria'] = $equipe->row()->cor_primaria;
				$data['cor_secundaria'] = $equipe->row()->cor_secundaria;
				$data['valor'] = $equipe->row()->valor;

				$data['site'] = $equipe->row()->site;
				$data['social_fb'] = $equipe->row()->social_fb;
				$data['social_tw'] = $equipe->row()->social_tw;
				$data['social_in'] = $equipe->row()->social_in;

				$data['paises'] = $this->Paises_Model->get_paises();
				$data['regioes'] = $this->General_Model->get_regioes();
				$data['sedes'] = $this->General_Model->get_sedes();

				$data['title'] = 'Detalhes da Equipe';
		        $referencia['item'] = 'equipe';
		        $referencia['sub-item'] = 'todos';

		        $this->load->view('templates/header');
		        $this->load->view('templates/navbar');
		        $this->load->view('templates/administrador/sidemenu', $referencia);
		        $this->load->view('templates/page_start');
				$this->load->view('equipe/v_equipe_detalhes', $data);
		        $this->load->view('templates/footer');
			} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $data);
			}
		}
	}

	public function check_nome_equipe_exists($nome){

		$this->form_validation->set_message('check_nome_equipe_exists', 'Este nome de equipe já existe.');

		if ($this->Equipes_Model->check_nome_equipe_exists($nome)) {
			return true;
		}else{
			return false;
		}
	}

	public function check_sigla_equipe_exists($sigla){

		$this->form_validation->set_message('check_sigla_equipe_exists', 'Esta sigla já existe.');

		if ($this->Equipes_Model->check_sigla_equipe_exists($sigla)) {
			return true;
		}else{
			return false;
		}
	}

}