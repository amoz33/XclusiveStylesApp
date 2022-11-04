<?php
class Admin_login extends CI_Model {

    function __construct (){
        parent::__construct();
        $this->table_name = 'admin_users';
        $this->primary_key = 'id';

    }

    public function get_admin($where) {

        //$this->db->select('admin_users.id,admin_users.name');
        //$this->db->select('admin_users.username,admin_users.password');
        //$this->db->from('admin_users');

        //var_dump($where);

        $query=$this->db->get_where('admin_users',$where);
        if($query->num_rows() > 0){
            $data = $query->row_array();
            return $data;
        }else{

            return false;
        }
    }

     function get_one_record($table, $where=NULL, $order=NULL,$like=NULL){
    

        if($order){$this->db->order_by($order);}
        
        if($like){$this->db->like($like);}  
                
        if(is_array($where)){
            $get = $this->db->get_where($table, $where);
        }else{
            $get = $this->db->get($table);
        }
        
    
        if($get->num_rows() > 0){
            
            return  $get->row_array();
                                
        }else{
            return FALSE;
        
        }
    
    }

}