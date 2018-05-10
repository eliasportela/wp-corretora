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
	
}
