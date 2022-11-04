<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->load->model('message_model');
		$this->load->model('crud');
		$this->load->model('manage_category');
	}

	public function hair_category(){

		$data['report'] = $data['hairstyles_category'] = false;

		if($this->input->post('create')){
			// var_dump($_POST);
		
		    $category = $this->input->post('category');
		    $status = $this->input->post('status');

		    if($category && $status){

		    	$data = array('category_name'=>$category,'status'=>$status);

		        $hairCategory = $this->crud->set_data('hair_category', $data);

			    if($hairCategory) {

			        $messInfo = strtoupper('Category Created Successfully');
			        $data['report'] = $this->message_model->getMessageWrapper($messInfo, "success", '18');

			    }else{

			    	$messInfo = strtoupper('Something went wrong. Please try again');
			    	$data['report'] = $this->message_model->getMessageWrapper($messInfo, "danger", '18');

			    }// if($hairCategory)

		    }//END if($category && $status){


		}//END if($this->input->post('create')){

		$table_name = 'hair_category';
		$hairCategory = $this->manage_category->get_category($table_name,NULL);
		//var_dump($hairCategory);
		$data['hairstyles_category'] = $hairCategory;

		if(@$_SESSION['alert'])$data['report'] = $_SESSION['alert'];
		unset($_SESSION['alert']);

		$this->load->view('utilities/header2');
		$this->load->view('utilities/sidebar');
		$this->load->view('add_hair_category',$data);
		$this->load->view('utilities/footer2');

	}//END public function hair_category(){

	public function edit_hair_category() {

		$data['report'] = false;

		$table_name = 'hair_category';
		$cat_ID =  $this->input->get('id',true);

		$editCategory =  $this->manage_category->editcategory($table_name,$cat_ID);
		if($editCategory){

			$data['editCategory'] = $editCategory;
			$data['categoryID']=  $cat_ID;

		}else{

			$data['editCategory']=  false;
			
		}

		if($this->input->post('update')) {
		    $categoryID = $this->input->post('category_id');
		    $category = $this->input->post('category');
		    $status = $this->input->post('status');
		    $update = array('category_name'=>$category,'status'=>$status);
		    $this->crud->set_data('hair_category',$update,array('id'=>$categoryID));

		    $info = strtoupper('Category Updated Successfully');
			$mess =   $this->message_model->getMessageWrapper($info,"success","18");
			$_SESSION['alert'] = $mess;
		    redirect('Category/hair_category');

		}//END if($this->input->post('update')) {

		$this->load->view('utilities/header2');
		$this->load->view('utilities/sidebar');
		$this->load->view('edit_hair_category', $data);
		$this->load->view('utilities/footer2');

	}//END public function edit_hair_category() {

	public function dress_category(){


		$data['report'] = $data['dress_category'] = false;

		if($this->input->post('create')){
			// var_dump($_POST);
		
		    $category = $this->input->post('category');
		    $status = $this->input->post('status');

		    if($category && $status){

		    	$data = array('category_name'=>$category,'status'=>$status);

		        $hairCategory = $this->crud->set_data('dress_category', $data);

			    if($hairCategory) {

			        $messInfo = strtoupper('Category Created Successfully');
			        $data['report'] = $this->message_model->getMessageWrapper($messInfo, "success", '18');

			    }else{

			    	$messInfo = strtoupper('Something went wrong. Please try again');
			    	$data['report'] = $this->message_model->getMessageWrapper($messInfo, "danger", '18');

			    }// if($hairCategory)

		    }//END if($category && $status){


		}//END if($this->input->post('create')){

		$table_name = 'dress_category';
		$dressCategory = $this->manage_category->get_category($table_name,NULL);
		//var_dump($hairCategory);
		$data['dress_category'] = $dressCategory;

		if(@$_SESSION['alert'])$data['report'] = $_SESSION['alert'];
		unset($_SESSION['alert']);

		$this->load->view('utilities/header2');
		$this->load->view('utilities/sidebar');
		$this->load->view('add_dress_category',$data);
		$this->load->view('utilities/footer2');
	
	}//END public function dress_category(){


	public function edit_dress_category(){

		$data['report'] = false;

		$table_name = 'dress_category';
		$CatID =  $this->input->get('cat_id',true);

		$editCategory =  $this->manage_category->editcategory($table_name,$CatID);
		if($editCategory){

			$data['editCategory'] = $editCategory;
			//$data['categoryID']=  $CatID;

		}else{

			$data['editCategory'] =  false;
			
		}

		if($this->input->post('update')) {

		    $categoryID = $this->input->post('category_ID');
		    $category = $this->input->post('dress_category');
		    $status = $this->input->post('status');
		    $updateRecord = array('category_name'=>$category,'status'=>$status);
		    $this->crud->set_data('dress_category',$updateRecord,array('id'=>$categoryID));

		    $info = strtoupper('Category Updated Successfully');
			$messAlert =   $this->message_model->getMessageWrapper($info,"success","18");
			$_SESSION['alert'] = $messAlert;
		    redirect('Category/dress_category');

		}//END if($this->input->post('update')) {

		$this->load->view('utilities/header2');
		$this->load->view('utilities/sidebar');
		$this->load->view('edit_dress_category', $data);
		$this->load->view('utilities/footer2');

	}//END public function edit_dress_category() {


	public function deleteHairCategory() {

		$catID =  $this->input->get('id',true);
		$deleteCat = $this->manage_category->delete_hair_category($catID);

		if($deleteCat) {

			redirect('Category/hair_category');

		}//END if($deleteCat) {

	}//END public function deleteHairCategory($id) {


	public function deleteDressCategory() {

		$catID =  $this->input->get('id',true);
		$deleteCat = $this->manage_category->delete_dress_category($catID);

		if($deleteCat) {

			redirect('Category/dress_category');

		}//END if($deleteCat) {

	}//END public function deleteHairCategory($id) {

	
}//END class Dashboard extends CI_Controller {
