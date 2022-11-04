<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->db_model->createTable();
		$this->crud->is_set();
		$this->load->model('admin_login');
		$this->load->model('message_model');
		$this->load->model('manage_category');
		$this->load->model('crud');
	}

	public function index()
	{
		$data['report'] = false;

		$this->load->view('utilities/header');
		$this->load->view('login',$data);
		$this->load->view('utilities/footer');
	}

	public function login_user(){

		if($this->input->post('submit')) {
				
		    $username = $this->input->post('username');
		    $password = $this->input->post('password');

	    	$data = array('username'=>$username,'password'=>$password);

	    	$query = $this->admin_login->get_one_record('admin_users',array('username'=>$username,'password'=>$password));
	    	//var_dump($query);

	    	if ($query) {
	    		//var_dump($query);

				$user['admin'] = array(
								'username' => $query['username'],
								'name' => $query['name'],
								'userID' => $query['id'],
								'login' => TRUE,
								'login_as'=>'admin',
							);

				//$user['login_as'] = 'admin';
				$this->crud->set_user_login_data($user);

		  		//Logging User Admin = ['alogin']
		    	if($this->crud->is_login('admin') == TRUE) {

		    	 	//var_dump($_SESSION);
	               $this->crud->loggin();

	               $this->load->view('utilities/header2');
	               $this->load->view('utilities/sidebar');
				   $this->load->view('home');
				   $this->load->view('utilities/footer2');

	    		}//END if($this->crud->is_login('admin') == TRUE) {
	    		
	    	}else{

		    	$messInfo = strtoupper('Invalid Login Details. Please try again');
	        	$data['report'] = $this->message_model->getMessageWrapper($messInfo, "danger", '12');

		    	$this->load->view('utilities/header');
				$this->load->view('login',$data);
				$this->load->view('utilities/footer');

	    	}//END if ($query) {

		}//if($this->input->post('submit')) {


	}//END public function login_user(){

	public function users(){

		$data['admin_users'] = false;

		$table_name = 'admin_users';
		$adminUsers = $this->manage_category->get_category($table_name,NULL);
		$data['admin_users'] = $adminUsers;

		$this->load->view('utilities/header2');
		$this->load->view('utilities/sidebar');
		$this->load->view('users',$data);
		$this->load->view('utilities/footer2');
		
	}//END public function users(){
	
	public function logout(){
		
		$this->crud->logout();
		
		unset($_SESSION["admin"]);
	
		redirect('Auth');
		
	}//public function logout(){
	
}//END class Auth extends CI_Controller {
