<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->load->model('message_model');
	}

	public function index()
	{
		$data['report'] = false;

		$this->load->view('utilities/header2');
		$this->load->view('utilities/sidebar');
		$this->load->view('home',$data);
		$this->load->view('utilities/footer2');
	}

	
}//END class Dashboard extends CI_Controller {
