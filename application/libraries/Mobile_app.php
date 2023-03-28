<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mobile_app
{

    protected $CI;

    public function __construct($param = null)
    {
        $this->CI = &get_instance();

        $this->CI->load->model('admin_login');
        $this->CI->load->model('get_images');
        $this->CI->load->model('manage_category');

    }
    
    
    //TO REGISTER MOBILE APP USERS
    public function registerAppUsers(){

        //GET JSON INPUT DATA FROM REGISTRATION FORM
        $json = file_get_contents('php://input');
     
        // decoding the received JSON and store into $obj variable.
        $obj = json_decode($json,true);

        $data['register_user'] = false;
         
        // Form Data to be submitted into Database.
        $firstname = trim($obj['firstname']);
        $lastname = trim($obj['lastname']);
        $email = trim($obj['email']);
        $phone= trim($obj['phone']);
        $password = trim($obj['password']);
        
        $userData = array( 'firstname'=>$firstname,
                           'lastname'=>$lastname,
                           'email'=>$email,
                           'phone'=>$phone,
                           'password'=>$password,
                        );

        $table_name = 'mobile_app_users';

        //to check for Empty Email
        if($email !=""){

            $result = $this->CI->manage_category->check_email($table_name,array('email'=>$email));
                        
            if($result){

                $data['register_user'] = 'This User Email already exist'; 

            }else{     

               //$registerUser = $this->CI->crud->set_data($table_name, $data);
               $this->CI->crud->set_data($table_name, $userData);
               $data['register_user'] = 'User Registered Successfully';
            
            }//END if($result){
        
            
        }else{
                    
            $data['register_user'] = 'Email is required';
                    
        }//END if($email !=""){

        echo json_encode($data);
        
    }//END public function registerAppUsers(){
    
    
    //TO LOGIN MOBILE APP USERS
    public function loginAppUser(){
        
        //GET JSON INPUT DATA FROM LOGIN FORM
        $json = file_get_contents('php://input');   
        $obj = json_decode($json,true);

        $email = $obj['email'];
        $password = $obj['password'];
        
        //Incorrect Login Details
        //$email = 'adexson2010@yahoo.com';
        //$password = 'tosinade2023';
        
        //Correct Login Details
        //$email = 'davtoss1992@hotmail.com';
        //$password = 'davis35';
        
        $data = false;

        $loginUser = array('email'=>$email,'password'=>$password);

        $userRecord = $this->CI->admin_login->get_user($loginUser);

        if ($userRecord == false) {
            
            $data = 'Wrong Login Details, Please Try Again';
        
        }else{

            $data = 'User Logged in Successfully';
            //$data['user_profile'] = $userRecord;

        }//END if ($userRecord == false) {
            
        echo json_encode($data);
        
    }//END public function loginAppUser(){
    
    //GET ALL THE REGISTERED USERS
    public function getAppUsers(){

        $data['app_users'] = false;

        $appUserRecords = $this->CI->admin_login->get_all_users();

        $data['app_users'] = $appUserRecords;

        echo json_encode($data);
        
    }//public function getAppUsers(){
    
    //GET ONE REGISTERED USER
    public function getAppUser(){
        
        //GET JSON INPUT DATA FROM LOGIN FORM
        $json = file_get_contents('php://input');   
        $obj = json_decode($json,true);

        $id = $obj['id'];
        //$id = 3;
        $loginID = array('id'=>$id);

        $data['app_user'] = false;

        $appUserRecord = $this->CI->admin_login->get_one_user($loginID);
        
        if ($appUserRecord == false) {
            
            $data['app_user'] = 'Wrong Login Details, Please Try Again';
        
        }else{

            $data['app_user'] = $appUserRecord;

        }//END if ($appUserRecord == false) {

        echo json_encode($data);
        
    }//public function getAppUsers(){
    
    
    //TO GET THE USER PROFILE DATA
    public function get_user_profile(){

        //GET JSON INPUT DATA FROM APP
        $json = file_get_contents('php://input');   
        $obj = json_decode($json,true);

        $email = $obj['email']; 
        $password = $obj['password'];
        //$email = 'davtoss1992@hotmail.com';
        //$password = 'davis35';
        
        $data['user_profile'] = false;

        $app_User = array('email'=>$email,'password'=>$password);

        $user_profile = $this->CI->admin_login->get_user($app_User);

        if ($user_profile == false) {
            
            $data['user_profile'] = 'User Record was not found. Try Again';
        
        }else{

            $data['user_profile'] = $user_profile;

        }//END if ($user_profile == false) {
            
        echo json_encode($data);

    }//public function get_user_profile(){
    
    
    //TO GET HAIRSTYLES CATEGORIES WITH IMAGES FOR HOME PAGE
    public function get_HairItems(){
        
        $data['hairstyles_items'] = false;
        
        //HAIRSTYLES 
        $table_name = 'hair_category';
        $hairCategory = $this->CI->manage_category->getHairstylesImagesApp($table_name,2);
        $data['hairstyles_items'] = $hairCategory;

        echo json_encode($data);

    }//END public function get_HairItems(){

    //TO GET DRESSES CATEGORIES WITH IMAGES FOR HOME PAGE
    public function get_DressItems(){
        
        $data['dress_items'] = false;
        
        //DRESSES
        $table_namee = 'dress_category';
        $dressCategory = $this->CI->manage_category->getDressesImagesApp($table_namee,2);
        $data['dress_items'] = $dressCategory;

        echo json_encode($data);

    }//END public function get_DressItems(){


    //TO GET NAILS IMAGES FOR HOME PAGE
    public function get_NailItems(){
        
        $data['nails_items'] = false;
        
        //NAILS
        $TableName = 'nails_images';
        $getNailsImages =  $this->CI->get_images->getCategoryImages($TableName,2);
        $data['nails_items'] = $getNailsImages;

        echo json_encode($data);

    }//END public function get_NailItems(){
    
    
    //TO GET HAIRSTYLES CATEGORIES
    public function get_hairstyles_category(){

        $data['hairstyles_category'] = false;

        $table_name = 'hair_category';
        $hairCategory = $this->CI->manage_category->getHairstylesImagesApp($table_name);
        //var_dump($hairCategory);
        
        $data['hairstyles_category'] = $hairCategory;

        echo json_encode($data);

    }//END public function get_hairstyles_category(){
    

    //TO GET HAIRSTYLES IMAGES
    public function get_hairstyles_images($categoryID_info){

        $data['hairstyles_images'] = false;
        
        $tableName = 'hairstyle_images';
        $categoryID = $categoryID_info['category_id'];
        
        $getHairstylesImages =  $this->CI->get_images->getCategoryImagesMobile($tableName, array('category_id'=>$categoryID));
        
        //var_dump($getHairstylesImages);
        $data['hairstyles_images'] = $getHairstylesImages;

        echo json_encode($data);

    }//END public function get_hairstyles_images(){


    //TO GET DRESSES CATEGORIES
    public function get_dresses_category(){

        $data['dress_category'] = false;
        
        $table_name = 'dress_category';
        $dressCategory = $this->CI->manage_category->getDressesImagesApp($table_name);
        //var_dump($hairCategory);
        $data['dress_category'] = $dressCategory;

        echo json_encode($data);

    }//END public function get_dresses_category(){


    //TO GET DRESSES IMAGES
    public function get_dresses_images($category_id_info){

        $data['dresses_images'] = false;
        
        $category_ID = $category_id_info['category_id'];
        $tableName = 'dress_images';
        
        $getDressesImages =  $this->CI->get_images->getCategoryImagesMobile($tableName, array('category_id'=>$category_ID));
        $data['dresses_images'] = $getDressesImages;

        echo json_encode($data);

    }//public function get_dresses_images(){


    //TO GET NAILS IMAGES
    public function get_nails_images(){

        $data['nails_images'] = false;

        $tableName = 'nails_images';
        $getNailsImages =  $this->CI->get_images->getCategoryImages($tableName);
        $data['nails_images'] = $getNailsImages;

        echo json_encode($data);

    }//END public function get_nails_images(){



}//END class Mobile_app{