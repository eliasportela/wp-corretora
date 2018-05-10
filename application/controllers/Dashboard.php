<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	} 

	public function index()
	{

		$nivel_user = 3;		
		if (($this->session->userdata('logged')) and ($this->session->userdata('id_tu') <= $nivel_user)):

		$header = array('title' => 'Dashboard | Home');
		$menu = array('id_page' => 1);
		$this->load->view('dashboard/template/commons/header',$header);
		$this->load->view('dashboard/template/commons/menu',$menu);
		$this->load->view('dashboard/template/home');
		$this->load->view('dashboard/template/commons/footer');	
		
		else: redirect(base_url('login'));
		endif;


	}

}