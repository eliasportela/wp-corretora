<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtor extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library(['form_validation','upload','image_lib']);
	} 
	
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

	//Inserindo registros
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

//Inserindo registros
public function Register() {

	$nivel_user = 1;

	if (($this->session->userdata('logged')) and ($this->session->userdata('administrativo') >= $nivel_user)):
		$dataRegister = $this->input->post();
		if ($dataRegister):
			$dataModel = array(
				'produtor' => $dataRegister['produtor'],
				'produtor' => $dataRegister['produtor'],
				'produtor' => $dataRegister['produtor']
			);
			$res = $this->Crud_model->Insert('produtor',$dataModel);
			if($res):
				$this->output->set_status_header('200');
				return;
			endif;
		endif;
	else:
		$this->output->set_status_header('400');
	endif;

}


//Inserindo registros
public function Edit() {

	$nivel_user = 2;

	if (($this->session->userdata('logged')) and ($this->session->userdata('administrativo') >= $nivel_user)):
		$dataId = (int)$this->input->post("id");

		if($dataId > 0):
			$res = $this->Crud_model->ReadPar('produtor',array('id_produtor' => $dataId));
		endif;

		if ($res):
			$dataModel = array(
				'produtor' => $dataRegister['produtor'],
				'produtor' => $dataRegister['produtor'],
				'produtor' => $dataRegister['produtor']
			);
			$res = $this->Crud_model->Update('produtor',$dataModelEndereco,$id_endereco_imovel);
			if($res):
				$this->output->set_status_header('200');
				return;
			endif;
		endif;
	else:
		$this->output->set_status_header('400');
	endif;

}

	/// editar os detalhes do imovel
public function RegisterDetalhes() {

		$nivel_user = 1; //Nivel requirido para visualizar a pagina

		if (($this->session->userdata('logged')) and ($this->session->userdata('id_tu') <= $nivel_user)){

			$dataRegister = $this->input->post();

			//verifica o id da tabela onde ira inserir
			$res = $this->Crud_model->Query("SELECT id_detalhes_imovel FROM imovel where id_imovel =".$dataRegister['idImovelDetalhes']); 

			$id_detalhes = array('id_detalhes_imovel' => $res[0]->id_detalhes_imovel);


				//insere na tabela detalhes imovel
			$dataModelDetalhes = array('detalhes' => $dataRegister['detalhes'],
				'area' => $dataRegister['area'],
				'n_banheiro' => $dataRegister['n_banheiro'],
				'n_cozinha' => $dataRegister['n_cozinha'],
				'n_suite' => $dataRegister['n_suite'],
				'n_vagas_garagem' => $dataRegister['n_vagas_garagem'],
				'n_dormitorio' => $dataRegister['n_dormitorio'],
				'n_sala' => $dataRegister['n_sala'],
				'url_maps' => $dataRegister['url_maps']
			);

				//editando registros na tabela enderenco imovel
			$res2 = $this->Crud_model->Update('detalhes_imovel',$dataModelDetalhes,$id_detalhes);

			if($res2):
					//inserindo a log
				date_default_timezone_set('America/Sao_Paulo');
				$datalog = array('tabela' => 'Detalhes Imovel', 'comando' => 'Update', 'data' => date("Y-m-d H:i:s"), 'user' => $this->session->userdata('user'));
				$res3 = $this->Crud_model->Insert('log_sql',$datalog);
				
			endif;

			if($res2){
				echo $dataRegister['idImovelDetalhes'];
			}
		}

	}

	
	public function Remove(){
		
		
		$nivel_user = 1; //Nivel requirido para visualizar a pagina

		if (($this->session->userdata('logged')) and ($this->session->userdata('id_tu') <= $nivel_user)) {
			
			//Se a url nao tiver o parametro de consulta
			if ($this->input->get('id')) {
				// Id recebe o paramentro da url
				$id = (int) $this->input->get('id');
				$par = array('id_imovel' => $id);
				$res = $this->Crud_model->Read('imovel',$par);
				if ($res) {
					
					$resDetalhe = $this->Crud_model->Delete('detalhes_imovel', array('id_detalhes_imovel' => $res->id_detalhes_imovel));
					$resEndereco = $this->Crud_model->Delete('endereco_imovel', array('id_endereco_imovel' => $res->id_endereco_imovel));
					$resGaleria = $this->Crud_model->Delete('galeria_imagem', array('id_imovel' => $res->id_imovel));
					$resImovel = $this->Crud_model->Delete('imovel', array('id_imovel' => $res->id_imovel));
					//removendo as pastas
					if ($resDetalhe and $resEndereco and $resImovel) {
						# code...
						$path = './assets/img/imoveis/galeria/'.$res->referencia_imovel.'/';

						if(is_dir($path)) {

							array_map('unlink', glob("$path/*.*"));
							rmdir($path);

						}
					}
					
				}

				//Se ocorrer a remocao
				if ($resImovel) {
					$this->output->set_status_header('200');
				}else{
					$this->output->set_status_header('400');
				}
			}

		}else{
			$this->output->set_status_header('400');
		}
	}

}