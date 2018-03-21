<?php
class Jogador extends CI_Controller{

	public function __construct(){
		
		parent::__construct();
		if($this->session->userdata('permissao') != 1) {
			redirect('users/profile');
        }
    }
    
    public function index(){
		
    	$data['jogadores'] = $this->Jogadores_Model->get_jogadores();

        $data['title'] = 'Todos os Jogadores';
        $referencia['item'] = 'jogadores';
        $referencia['sub-item'] = 'todos';

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/usuario/sidemenu', $referencia);
        $this->load->view('templates/page_start');
        $this->load->view('jogador/v_jogador', $data);
        $this->load->view('templates/footer');
    }
    
	public function create(){
        
        $data['paises'] = $this->Paises_Model->get_paises();
        $data['funcoes'] = $this->Jogadores_Model->get_funcoes();
        $data['personalidades'] = $this->Jogadores_Model->get_personalidades();
       
        $data['title'] = 'Cadastrar Jogador';
        $referencia['item'] = 'jogadores';
        $referencia['sub-item'] = 'cadastrar';

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/usuario/sidemenu', $referencia);
        $this->load->view('templates/page_start');
        $this->load->view('jogador/v_jogador_cadastro', $data);
        $this->load->view('templates/footer');

    }

    public function edit($id = null){
		
		if ($id) {
			$jogador = $this->Jogadores_Model->get_jogadores($id);

			if ($jogador->num_rows() > 0 ) {

				$data['id'] = $jogador->row()->id;
				$data['nome'] = $jogador->row()->nome;
				$data['nick'] = $jogador->row()->nick;
				$data['sobrenome'] = $jogador->row()->sobrenome;
                $data['pais'] = $jogador->row()->pais_id;
                $data['genero'] = $jogador->row()->genero;
				$data['status'] = $jogador->row()->status;
				$data['funcao'] = $jogador->row()->funcao_id;
				$data['personalidade'] = $jogador->row()->personalidade_id;
	
                $data['paises'] = $this->Paises_Model->get_paises();
                $data['funcoes'] = $this->Jogadores_Model->get_funcoes();
                $data['personalidades'] = $this->Jogadores_Model->get_personalidades();


                $data['title'] = 'Edição de Jogador';
                $referencia['item'] = 'jogadores';
                $referencia['sub-item'] = 'editar';

                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('templates/usuario/sidemenu', $referencia);
                $this->load->view('templates/page_start');
                $this->load->view('jogador/v_jogador_edicao', $data);
                $this->load->view('templates/footer');

			} else {
				$data['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $data);
			}
		}
	}

    public function store(){
        
        $data['title'] = 'NOVO REGISTRO DE EQUIPE';

        $this->load->library('form_validation');

        $regras = array(
                        array(
                                'field' => 'nick',
                                'label' => 'Nick',
                                'rules' => 'required'		                
                        ),
                        array(
                                'field' => 'pais',
                                'label' => 'Pais',
                                'rules' => 'required'		                
                        ),
                        array(
                                'field' => 'funcao',
                                'label' => 'Função',
                                'rules' => 'required'		                
                        ),
                        array(
                                'field' => 'personalidade',
                                'label' => 'Personalidade',
                                'rules' => 'required'		                
                        )
                );

        $this->form_validation->set_rules($regras);
        
        if ($this->form_validation->run() == FALSE) {
        
        $data['paises'] = $this->Paises_Model->get_paises();
        $data['funcoes'] = $this->Jogadores_Model->get_funcoes();
        $data['personalidades'] = $this->Jogadores_Model->get_personalidades();
                   
        $data['title'] = 'Cadastrar Jogador';
        $referencia['item'] = 'jogadores';
        $referencia['sub-item'] = 'cadastrar';

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('templates/usuario/sidemenu', $referencia);
        $this->load->view('templates/page_start');
        $this->load->view('jogador/v_jogador_cadastro', $data);
        $this->load->view('templates/footer');
        
        } else {
                    
            $id = $this->input->post('id');

            $dados = array(
                        
                        'nome' => $this->input->post('nome'),
                        'nick' => $this->input->post('nick'),
                        'sobrenome' => $this->input->post('sobrenome'),
                        'pais_id' => $this->input->post('pais'),
                        'funcao_id' => $this->input->post('funcao'),
                        'personalidade_id' => $this->input->post('personalidade'),
                        'genero' => $this->input->post('genero'),
                        'at_trab' => 0,
                        'at_ment' => 0,
                        'at_consist' => 0,
                        'at_mec' => 0,
                        'at_vis' => 0,
                        'foto' => 'default.jpg',
                        'status' => 1
            );


            if ($this->Jogadores_Model->store($dados, $id)) {
                $this->session->set_flashdata('success', 'Equipe cadastrada com sucesso!');
                redirect('jogador');
            } else {
                $this->session->set_flashdata('error', 'Erro ao cadastrar equipe.');
                redirect('jogador');
            }
        }
    }


    public function detalhes($id = null){
		
		if ($id) {
			
			// Busca model para buscar equipe por id		
			$jogador = $this->Jogadores_Model->get_jogadores($id);
			
			if ($jogador->num_rows() > 0 ) {

				//Informações tabela jogador
				$data['id'] = $jogador->row()->id;
				$data['nome'] = $jogador->row()->nome;
				$data['sobrenome'] = $jogador->row()->sobrenome;
				$data['nick'] = $jogador->row()->nick;
				$data['idade'] = $jogador->row()->idade;
				$data['genero'] = $jogador->row()->genero;
				$data['funcao_id'] = $jogador->row()->funcao_id;
				$data['pais_id'] = $jogador->row()->pais_id;
				$data['personalidade_id'] = $jogador->row()->personalidade_id;
				$data['at_trab'] = $jogador->row()->at_trab;
				$data['at_ment'] = $jogador->row()->at_ment;
				$data['at_consist'] = $jogador->row()->at_consist;
				$data['at_mec'] = $jogador->row()->at_mec;
				$data['at_vis'] = $jogador->row()->at_vis;
				$data['foto'] = $jogador->row()->foto;
				$data['status'] = $jogador->row()->status;

                $data['title'] = 'Detalhes do Jogador';
                $referencia['item'] = 'jogadores';

                $this->load->view('templates/header');
                $this->load->view('templates/navbar');
                $this->load->view('templates/usuario/sidemenu', $referencia);
                $this->load->view('templates/page_start');
                $this->load->view('jogador/v_jogador_detalhes', $data);
                $this->load->view('templates/footer');

			} else {
				$data['mensagem'] = "Não encontramos registros." ;
				$this->load->view('errors/html/v_erro', $data);
			}
		}
    }
    
    public function delete($id = null) {
		if ($this->Jogadores_Model->delete($id)) {
                $this->session->set_flashdata('success', 'Equipe cadastrada com sucesso!');
                redirect('jogador');
		}
	}
}