<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cidade extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(['mycrud']);
	}

	//CIDADES
	//Cadastro de cidades
	public function CadastrarCidade()
	{
		if($resposta = $this->mycrud->Insert('cidade',$this->input->post())){
			$this->output->set_status_header('200');
			echo $resposta;
		}else{
			$this->output->set_status_header('400');
		}
	}
	//editar cidades
	public function EditarCidade()
	{
		$dados = $this->input->post();

		if($resposta = $this->mycrud->Update('cidade','id_cidade',$this->input->post())){
			$this->output->set_status_header('200');
			echo $resposta;
		}else{
			$this->output->set_status_header('400');
		}	
	}
	//remover cidades
	public function RemoverCidade()
	{
		if($resposta = $this->mycrud->Remove('cidade','id_cidade',$this->input->post())){
			$this->output->set_status_header('200');
			echo $resposta;
		}else{
			$this->output->set_status_header('400');
		}	
	}
	//listar cidades
	public function BuscarCidades()
	{
		if($this->mycrud->ReadAll('cidade')){
			echo $this->mycrud->ReadAll('cidade');
		}
	}



}