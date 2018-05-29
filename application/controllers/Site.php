<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index()
	{
		//pagina
		$header['title'] = 'Souza Cafés';
		$header['page'] = '1';
		$this->load->view('template/commons/header',$header);
		$this->load->view('template/index');
		$this->load->view('template/commons/footer');
	}

	public function SolicitarContato()
	{
		if($this->input->post()){
			$dataRegister = $this->input->post();
			if (isset($dataRegister['nome_contato']) or isset($dataRegister['telefone']) or isset($dataRegister['email'])) {

				$data = date("Y-m-d H:i:s");
				$dataModel = array('email' => $dataRegister['email'],
									'nome_contato' => $dataRegister['nome_contato'],
									'telefone' => $dataRegister['telefone'],
									'data_contato' => $data
								);
				$res = $this->Crud_model->Insert('contato',$dataModel);
				
				if ($res) {
					$this->output->set_status_header('200');
				}else{
					$this->output->set_status_header('500');
				}	
			}else{
				$this->output->set_status_header('200');
			}
		}
	}
	
}
