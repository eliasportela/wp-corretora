<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller {

	public function index()
	{
	
		if($this->input->get("pagina")){
			$data['idpagina'] = (int) $this->input->get("pagina");
			$data['paginaPesquisa'] = $data['idpagina'];
			$data['conteudos'] = $this->Crud_model->Query('SELECT * FROM conteudo where id_pagina = '.$data['idpagina']);		
		}else{
			$data['idpagina'] = FALSE;
			$data['conteudos'] = FALSE;
		}

		//die(var_dump($data['paginaPesquisa']));
		//pagina
		$menu['id_page'] = 4;
		$header['title'] = 'Dash | Site';
		$header['page'] = '1';
		
		//paginas
		
		$data['paginas'] = $this->Crud_model->ReadAll('pagina');



		$this->load->view('dashboard/template/commons/header',$header);
		$this->load->view('dashboard/template/commons/menu',$menu);
		$this->load->view('dashboard/site/home',$data);
		$this->load->view('dashboard/template/commons/footer');
	}

}