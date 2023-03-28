<?php
class Manage_category extends CI_Model {

    function __construct (){
        parent::__construct();
        $this->table_name = '';
        $this->primary_key = 'id';
        $this->order_by = 'id DESC';
        $this->load->model('get_images');

    }
    
    //CHECK EMAIL IF IT EXISTS IN MOBILE_APP_USER TABLE
    public function check_email($table_name,$email){
        
        $this->db->select('*');
    	$this->db->from($table_name);
        $this->db->where($email);
		
    	$query = $this->db->get();

	 	if($query->num_rows() > 0){
			$data = $query->row_array();
			return $data;
    	}else{

    		return false;
    	}	

    }//END public function check_email($table_name,$email){

    public function get_category($table_name,$categoryID = NULL){

    	$this->db->select('*'); //
    	$this->db->from($table_name);
    	if($categoryID){
            $this->db->where($table_name,$categoryID);
    	}
		
    	$query = $this->db->get();

	 	if($query->num_rows() > 0){
			$data = $query->result_array();
			return $data;
    	}else{

    		return false;
    	}	

    }
    
    public function get_category2($table_name,$categoryID = NULL){

    	$this->db->select('*'); //
    	$this->db->from($table_name);
    	if($categoryID){
            $this->db->where($table_name,$categoryID);
    	}
		
    	$query = $this->db->get();

	 	if($query->num_rows() > 0){
			$data = $query->result_array();
			return $data;
    	}else{

    		return false;
    	}	

    }
    
   
    public function getHairstylesImagesApp($table_name,$limit='') {
        
        $url = 'https://app.xclusiveafrikstyles.com/uploads/hairstyles';
        $tableName = 'hairstyle_images';
        $output = [];
        
        $this->db->select('*');
        $this->db->from($table_name);
        if($limit){
          $this->db->order_by('id','DESC');
          $this->db->limit($limit);  
        }
        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            $result = $query->result_array();
            
            foreach ($result as $value) {
                $hairID = $value['id'];
                $groupImages =  $this->get_images->getCategoryImagesMobile2($tableName, array('category_id'=>$hairID));
                // echo '<pre>';
                // var_dump($groupImages);
                $image_url = $url.'/'.$groupImages['image_url'];
                
                $getImagesCount =  $this->get_images->getCategoryImagesMobile($tableName, array('category_id'=>$hairID));
                $nums_of_items = count($getImagesCount);

                $output[] = array('id'=>$hairID,
                                  'name'=>$value['category_name'],
                                  'image'=>$image_url,
                                  'number_of_items'=>$nums_of_items);

            }//END foreach ($hairCategory as $value) {
        
            return $output;
            
        }else{

            return false;
        }
    }
    
    public function getDressesImagesApp($table_name,$limit='') {
        
        $url = 'https://app.xclusiveafrikstyles.com/uploads/dresses';
        $tableName = 'dress_images';
        $output = [];
        
        $this->db->select('*');
        $this->db->from($table_name);
        if($limit){
          $this->db->order_by('id','DESC');
          $this->db->limit($limit);  
        }
        $query = $this->db->get();
        
        if($query->num_rows() > 0){
            $result = $query->result_array();

            foreach ($result as $value) {
                $dressID = $value['id'];
                $groupImages =  $this->get_images->getCategoryImagesMobile2($tableName, array('category_id'=>$dressID));
                
                $image_url = $url.'/'.$groupImages['image_url'];
                
                $getImagesCount =  $this->get_images->getCategoryImagesMobile($tableName, array('category_id'=>$dressID));
                $nums_of_items = count($getImagesCount);

                $output[] = array('id'=>$dressID,
                                  'name'=>$value['category_name'],
                                  'image'=>$image_url,
                                  'number_of_items'=>$nums_of_items);

            }//END foreach ($hairCategory as $value) {
        
            return $output;
            
        }else{

            return false;
        }
    }

    public function select_category($table_name,$status) {
        
        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($status);

        $query = $this->db->get();
        if($query->num_rows() > 0){
            $data = $query->result_array();
            return $data;
        }else{

            return false;
        }
    }

    public function getCategoryName($table_name,$id= NULL) {

        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($id);

        $query = $this->db->get();
        if($query->num_rows() > 0){
            $data = $query->row_array();
            return $data;
        }else{

            return false;
        }
    }


    public function editcategory($table_name,$catID) {

        $query = $this->db->get_where($table_name,array('id'=>$catID));
        if($query->num_rows() > 0){
            $data = $query->result_array();
            return $data;
        }else{

            return false;
        }
    }

    public function delete_hair_category($id) {
        $this->db->where('id',$id);
        $this->db->delete('hair_category');
        return true;
    }

    public function delete_dress_category($id) {
        $this->db->where('id',$id);
        $this->db->delete('dress_category');
        return true;
    }

}