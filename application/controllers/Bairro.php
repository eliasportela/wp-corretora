<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bairro extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library(['mycrud']);
	}

	//CIDADES
	//Cadastro de bairros
	public function CadastrarBairro()
	{
		if($resposta = $this->mycrud->Insert('bairro',$this->input->post())){
			$this->output->set_status_header('200');
			echo $resposta;
		}else{
			$this->output->set_status_header('400');
		}
	}
	//editar bairros
	public function EditarBairro()
	{
		$dados = $this->input->post();

		if($resposta = $this->mycrud->Update('bairro','id_bairro',$this->input->post())){
			$this->output->set_status_header('200');
			echo $resposta;
		}else{
			$this->output->set_status_header('400');
		}	
	}
	//remover bairros
	public function RemoverBairro()
	{
		if($resposta = $this->mycrud->Remove('bairro','id_bairro',$this->input->post())){
			$this->output->set_status_header('200');
			echo $resposta;
		}else{
			$this->output->set_status_header('400');
		}	
	}
	
	//listar bairros
	public function BuscarBairros()
	{
		if ($this->input->get('id')) {
			$where = "b.id_cidade = ".$this->input->get('id');
		}else{
			$where = '1=1';
		}
		$sql="SELECT b.id_bairro, b.nome_bairro, b.id_cidade, c.nome_cidade, c.sigla_estado FROM bairro b INNER JOIN cidade c ON (b.id_cidade = c.id_cidade) WHERE $where and b.fg_ativo = 1";
		if($resposta = $this->mycrud->Query($sql)){	
			echo $resposta;
		}else{
			$this->output->set_status_header('400');
		}
		
	}


}