<?php
class Manage_category extends CI_Model {

    function __construct (){
        parent::__construct();
        $this->table_name = '';
        $this->primary_key = 'id';
        $this->order_by = 'id DESC';

    }

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

    public function select_category($table_name,$status = NULL) {

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