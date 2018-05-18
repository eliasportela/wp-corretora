<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtor extends CI_Controller {
		
	function __construct(){
		parent::__construct();
		$this->load->library(['form_validation','upload','image_lib']);
	} 
	
	//Tela Produtor
	public function index(){

		$nivel_user = 1; //Nivel requirido para visualizar a pagina

		if (($this->session->userdata('logged')) and ($this->session->userdata('administrativo') >= $nivel_user)) {

			$data["produtores"] = false;
			$header['title'] = "Dash | Produtor";
			$menu['id_page'] = 3;

			$this->load->view('dashboard/template/commons/header',$header);
			$this->load->view('dashboard/template/commons/menu',$menu);
			$this->load->view('dashboard/produtor/home',$data);
			$this->load->view('dashboard/template/commons/footer');
			
		}else{
			redirect(base_url('login'));
		}
	}

	//Tela Cadastro Produtor
	public function Cadastro() {

		$nivel_user = 1; //Nivel requirido para visualizar a pagina

		if (($this->session->userdata('logged')) and ($this->session->userdata('administrativo') >= $nivel_user)){	
			
			$data["produtores"] = false;
			
			//Estados
			$data["estados"] = $this->Crud_model->ReadAll("estado");


			$header['title'] = "Dash | Produtor";
			$menu['id_page'] = 3;

			$this->load->view('dashboard/template/commons/header',$header);
			$this->load->view('dashboard/template/commons/menu',$menu);
			$this->load->view('dashboard/produtor/cadastro',$data);
			$this->load->view('dashboard/template/commons/footer');
			
		}else{
			redirect(base_url('login'));
		}

	}

	//Select com Paginacao
	public function Get(){
		$ref = $this->uri->segment(4);
		$page = $ref * 20 - 20;
		
		$res = $this->Crud_model->Count('produtor');
		$qtd = 0;

		if ($res->total > 20):
			$qtd = intdiv($res->total,20);
		elseif($res->total > 0):
			$qtd = 1;
		endif;

		if ($ref > 0):
			$sql = "SELECT * FROM produtor LIMIT 20 OFFSET $page";
			$res = $this->Crud_model->Query($sql);
			if ($res):
				$json = json_encode($res,JSON_UNESCAPED_UNICODE);
				echo '{"pages":'.$qtd.',"result":'.$json.'}';
				return;
			endif;
		else:
			$this->output->set_status_header('500');
		endif;
	}

	//Inserindo registros
	public function Register() {

		$nivel_user = 1;

		//if (($this->session->userdata('logged')) and ($this->session->userdata('administrativo') >= $nivel_user)):
		$dataRegister = $this->input->post();
		if ($dataRegister AND $dataRegister['nome_produtor'] != NULL):
			$dataModel = array(
				'nome_produtor' => trim($dataRegister['nome_produtor']),
				'id_tipo_pessoa' => trim($dataRegister['id_tipo_pessoa']),
				'cpf_cnpj' => trim($dataRegister['cpf_cnpj']),
				'rg_inscricao_estadual' => trim($dataRegister['rg_inscricao_estadual']),
				'data_nascimento' => trim($dataRegister['data_nascimento']),
				'escolaridade' => trim($dataRegister['escolaridade']),
				'membros_familia' => trim($dataRegister['membros_familia']),
				'email' => trim($dataRegister['email']),
				'telefone' => trim($dataRegister['telefone']),
				'foto_produtor' => trim($dataRegister['foto_produtor']),
				'endereco' => trim($dataRegister['endereco']),
				'numero' => trim($dataRegister['numero']),
				'complemento' => trim($dataRegister['complemento']),
				'cep' => trim($dataRegister['cep']),
				'bairro' => trim($dataRegister['bairro']),
				'id_cidade' => trim($dataRegister['id_cidade']),
				'comprovante_bancario' => trim($dataRegister['comprovante_bancario']),
				'certificados' => trim($dataRegister['certificados']));
			$res = $this->Crud_model->Insert('produtor',$dataModel);
			if($res):
				$this->output->set_status_header('200');
				return;
			endif;
		endif;
		//else:
			//$this->output->set_status_header('400');
		//endif;

	}

	//Inserindo registros
	public function Edit() {

		$nivel_user = 2;

		if (($this->session->userdata('logged')) and ($this->session->userdata('administrativo') >= $nivel_user)):
			
			$dataId = (int)$this->uri->segment(5);
			$dataRegister = $this->input->post();

			if (($dataId > 0) AND ($dataRegister != NULL) AND ($dataRegister['nome_produtor'] != NULL)):

				$dataModel = array(
					'nome_produtor' => trim($dataRegister['nome_produtor']),
					'id_tipo_pessoa' => trim($dataRegister['id_tipo_pessoa']),
					'cpf_cnpj' => trim($dataRegister['cpf_cnpj']),
					'rg_inscricao_estadual' => trim($dataRegister['rg_inscricao_estadual']),
					'data_nascimento' => trim($dataRegister['data_nascimento']),
					'escolaridade' => trim($dataRegister['escolaridade']),
					'membros_familia' => trim($dataRegister['membros_familia']),
					'email' => trim($dataRegister['email']),
					'telefone' => trim($dataRegister['telefone']),
					'foto_produtor' => trim($dataRegister['foto_produtor']),
					'endereco' => trim($dataRegister['endereco']),
					'numero' => trim($dataRegister['numero']),
					'complemento' => trim($dataRegister['complemento']),
					'cep' => trim($dataRegister['cep']),
					'bairro' => trim($dataRegister['bairro']),
					'id_cidade' => trim($dataRegister['id_cidade']),
					'comprovante_bancario' => trim($dataRegister['comprovante_bancario']),
					'certificados' => trim($dataRegister['certificados']));
				
				$res = $this->Crud_model->Update('produtor',$dataModel, array('id_produtor' => $dataId));
				
				if($res):
					$this->output->set_status_header('200');
					return;
				endif;
			endif;

		else:
			$this->output->set_status_header('400');
		endif;

	}

	//Delete registro
	public function Remove(){
		
		$nivel_user = 2;

		if (($this->session->userdata('logged')) and ($this->session->userdata('administrativo') >= $nivel_user)):
			
			$dataId = (int)$this->uri->segment(5);
			
			if ($dataId > 0):

				$res = $this->Crud_model->Delete('produtor',array('id_produtor' => $dataId));
				
				if($res):
					$res = $this->Crud_model->Delete('propriedade',array('id_produtor' => $dataId));
					
					$this->output->set_status_header('200');
					
					return;
				endif;
			endif;

		else:
			$this->output->set_status_header('400');
		endif;

	}

}