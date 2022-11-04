<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->load->model('message_model');
		$this->load->model('manage_category');
		$this->load->model('get_images');
		$this->load->model('crud');

		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('upload');

	}

	public function index()
	{
		$data['report'] = false;



		$this->load->view('utilities/header2');
		$this->load->view('utilities/sidebar');
		$this->load->view('imageUploadView',$data);
		$this->load->view('utilities/footer2');
	}

	public function upload_hairstyles(){

		$data['report'] = $data['hairCategory'] = $data['hairstyles_images'] = false;

		if($this->input->post('uploadImage')){
			// var_dump($_POST);
		
		    $category = $this->input->post('category_id');


		    $config['upload_path'] = $this->config->item('hairstyles_upload_url');
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '2048';
			$config['overwrite']  = false;

			$this->upload->initialize($config);
			$this->load->library('upload', $config);

			if ( !$this->upload->do_upload()) {		
				
				$msg = $this->upload->display_errors();
				$mess = $this->message_model->getMessageWrapper($msg,'danger','18');
			    $_SESSION['alert'] = $mess;
			   	redirect('Image/upload_hairstyles');

			}else{

				$data = $this->upload->data();
				//var_dump($data);
				$filename = $data['file_name'];

			    $infoData = array(
			        'category_id' => $category,
			        'image_url' => $filename,
			     );
			    $this->crud->set_data('hairstyle_images',$infoData);


				$msgInfo = 'IMAGE UPLOAD WAS DONE SUCCESSFULLY';
				$messInfo =   $this->message_model->getMessageWrapper($msgInfo,'success','18');
				$data['report'] = $messInfo;

			}//END if ( !$this->upload->do_upload()) {

		}//END if($this->input->post('uploadImage')){

		$tableName = 'hairstyle_images';
		$getHairstylesImages =  $this->get_images->getCategoryImages($tableName);
		$data['hairstyles_images'] = $getHairstylesImages;

		$status = 1;
		$table_name = 'hair_category';
		$hairCategory = $this->manage_category->select_category($table_name,array('status'=>$status));
		//var_dump($hairCategory);
		$data['hairCategory'] = $hairCategory;


		if(@$_SESSION['alert'])$data['report'] = $_SESSION['alert'];
		unset($_SESSION['alert']);

		$this->load->view('utilities/header2');
		$this->load->view('utilities/sidebar');
		$this->load->view('imageUploadView',$data);
		$this->load->view('utilities/footer2');

	}//END public function upload_hairstyles(){


	public function upload_hairstyles2(){

		$data['report'] = $data['hairCategory'] = false;
		$status = 1;
		$table_name = 'hair_category';
		$hairCategory = $this->manage_category->select_category($table_name,array('status'=>$status));
		//var_dump($hairCategory);
		$data['hairCategory'] = $hairCategory;

		if($this->input->post('uploadImage')){
			// var_dump($_POST);
		
		    $category = $this->input->post('category_id');


		    $config['upload_path'] = $this->config->item('hairstyles_upload_url');
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '2048';
			$config['overwrite']  = false;

			$this->upload->initialize($config);
			$this->load->library('upload', $config);

			if ( !$this->upload->do_upload()) {		
				
				$msg = $this->upload->display_errors();
				$mess = $this->message_model->getMessageWrapper($msg,'danger','18');
			    $_SESSION['alert'] = $mess;
			   	redirect('Image/upload_hairstyles');

			}else{

				$dataInfo = [];
			    $files = $_FILES;
			    $cpt = count($_FILES['userfile']['name']);
			    for($i=0; $i<$cpt; $i++) {

			        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
			        // $_FILES['userfile']['type']= $files['userfile']['type'][$i];
			        // $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
			        // $_FILES['userfile']['error']= $files['userfile']['error'][$i];
			        // $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

			        $this->upload->do_upload('userfile');
			        $dataInfo[] = $this->upload->data();

			    }//END for($i=0; $i<$cpt; $i++) {

			    $data = array(
			        'category_id' => $category,
			        'image_url' => $dataInfo['file_name'],
			     );
			    $this->crud->set_data('hairstyle_images',$data);

				//$data = $this->upload->data();
				//var_dump($data);

				$msgInfo = 'IMAGE UPLOAD WAS DONE SUCCESSFULLY';
				$messInfo =   $this->message_model->getMessageWrapper($msgInfo,'success','18');
				$data['report'] = $messInfo;

			}//END if ( !$this->upload->do_upload()) {

		}//END if($this->input->post('uploadImage')){


		if(@$_SESSION['alert'])$data['report'] = $_SESSION['alert'];
		unset($_SESSION['alert']);

		$this->load->view('utilities/header2');
		$this->load->view('utilities/sidebar');
		$this->load->view('imageUploadView',$data);
		$this->load->view('utilities/footer2');

	}//END public function upload_hairstyles(){

	public function upload_dresses(){

		$data['report'] = $data['dressCategory'] = $data['dresses_images'] = false;

		if($this->input->post('uploadImage')){
			// var_dump($_POST);
		
		    $category = $this->input->post('category_id');


		    $config['upload_path'] = $this->config->item('dresses_upload_url');
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '2048';
			$config['overwrite']  = false;

			$this->upload->initialize($config);
			$this->load->library('upload', $config);

			if ( !$this->upload->do_upload()) {		
				
				$msg = $this->upload->display_errors();
				$mess = $this->message_model->getMessageWrapper($msg,'danger','18');
			    $_SESSION['alert'] = $mess;
			   	redirect('Image/upload_dresses');

			}else{

				$data = $this->upload->data();
				//var_dump($data);
				$filename = $data['file_name'];

			    $infoData = array(
			        'category_id' => $category,
			        'image_url' => $filename,
			     );
			    $this->crud->set_data('dress_images',$infoData);


				$msgInfo = 'IMAGE UPLOAD WAS DONE SUCCESSFULLY';
				$messInfo =   $this->message_model->getMessageWrapper($msgInfo,'success','18');
				$data['report'] = $messInfo;

			}//END if ( !$this->upload->do_upload()) {

		}//END if($this->input->post('uploadImage')){

		$tableName = 'dress_images';
		$getDressesImages =  $this->get_images->getCategoryImages($tableName);
		$data['dresses_images'] = $getDressesImages;

		$status = 1;
		$table_name = 'dress_category';
		$dressCategory = $this->manage_category->select_category($table_name,array('status'=>$status));
		//var_dump($dressCategory);
		$data['dressCategory'] = $dressCategory;


		if(@$_SESSION['alert'])$data['report'] = $_SESSION['alert'];
		unset($_SESSION['alert']);

		$this->load->view('utilities/header2');
		$this->load->view('utilities/sidebar');
		$this->load->view('dressUploadView',$data);
		$this->load->view('utilities/footer2');

	}//END public function upload_dresses(){


	public function upload_nails(){

		$data['report'] = $data['nails_images'] = false;

		if($this->input->post('uploadNail')){

		    $config['upload_path'] = $this->config->item('nails_upload_url');
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '2048';
			$config['overwrite']  = false;

			$this->upload->initialize($config);
			$this->load->library('upload', $config);

			if ( !$this->upload->do_upload()) {		
				
				$msg = $this->upload->display_errors();
				$mess = $this->message_model->getMessageWrapper($msg,'danger','18');
			    $_SESSION['alert'] = $mess;
			   	redirect('Image/upload_nails');

			}else{

				$data = $this->upload->data();
				//var_dump($data);
				$filename = $data['file_name'];

			    $info_Data = array( 'image_url' => $filename);
			    $this->crud->set_data('nails_images',$info_Data);

				$msgInfo = 'IMAGE UPLOAD WAS DONE SUCCESSFULLY';
				$messInfo =   $this->message_model->getMessageWrapper($msgInfo,'success','18');
				$data['report'] = $messInfo;

			}//END if ( !$this->upload->do_upload()) {

		}//END if($this->input->post('uploadImage')){

		$tableName = 'nails_images';
		$getNailsImages =  $this->get_images->getCategoryImages($tableName);
		$data['nails_images'] = $getNailsImages;


		if(@$_SESSION['alert'])$data['report'] = $_SESSION['alert'];
		unset($_SESSION['alert']);

		$this->load->view('utilities/header2');
		$this->load->view('utilities/sidebar');
		$this->load->view('nailsUploadView',$data);
		$this->load->view('utilities/footer2');

	}//END public function upload_nails(){


	public function deleteImageUrl(){

		$catID =  $this->input->get('id',true);
		$deleteCat = $this->get_images->delete_hair_image($catID);

		if($deleteCat) {

			redirect('Image/upload_hairstyles');

		}//END if($deleteCat) {

	}//END public function deleteImageUrl(){

	public function deleteDressUrl(){

		$cat_ID =  $this->input->get('id',true);
		$deleteCat = $this->get_images->delete_dress_image($cat_ID);

		if($deleteCat) {

			redirect('Image/upload_dresses');

		}//END if($deleteCat) {

	}//END public function deleteImageUrl(){


	public function deleteNailUrl(){

		$cat_id =  $this->input->get('id',true);
		$deleteCatID = $this->get_images->delete_nails_image($cat_id);

		if($deleteCatID) {

			redirect('Image/upload_nails');

		}//END if($deleteCatID) {

	}//END public function deleteNailUrl(){


	
}//END class Image extends CI_Controller {
