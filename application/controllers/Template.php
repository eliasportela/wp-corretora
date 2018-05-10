<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$data = array('title' => 'Template');
		$this->parser->parse('template/index',$data);
	}


}