<?php
class Get_images extends CI_Model {

	function __construct (){
        parent::__construct();
        $this->table_name = '';
        $this->primary_key = 'id';
        $this->order_by = 'id DESC';

    }

    public function getCategoryImages($table_name,$limit='') {

        $this->db->select('*');
        $this->db->from($table_name);
        if($limit){
           $this->db->order_by('id','DESC');
           $this->db->limit($limit);
        }
        //$this->db->where($categoryID);

        $query = $this->db->get();
        if($query->num_rows() > 0){
            $data = $query->result_array();
            return $data;
            
        }else{

            return false;
        }
    }
    
    
    public function getCategoryImagesMobile($table_name,$categoryID) {

        $this->db->select('*');
        $this->db->order_by('id','DESC');
        $this->db->from($table_name);
        $this->db->where($categoryID);
        $this->db->limit("20"); 
        
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $data = $query->result_array();
            return $data;
        }else{

            return false;
        }
    }
    
    public function getCategoryImagesMobile2($table_name,$categoryID) {

        $this->db->select('*');
        $this->db->from($table_name);
        $this->db->where($categoryID);
        $this->db->limit("1");
        
        $query = $this->db->get();
        if($query->num_rows() > 0){
            $data = $query->row_array();
            return $data;
        }else{

            return false;
        }
    }

    public function delete_hair_image($id) {
        $this->db->where('id',$id);
        $this->db->delete('hairstyle_images');
        return true;
    }

    public function delete_dress_image($id) {
        $this->db->where('id',$id);
        $this->db->delete('dress_images');
        return true;
    }

    public function delete_nails_image($id) {
        $this->db->where('id',$id);
        $this->db->delete('nails_images');
        return true;
    }


}//END class Manage_category extends CI_Model {