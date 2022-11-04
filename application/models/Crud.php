<?php
class Crud extends CI_Model {
	var $db;
    function __construct (){
        parent::__construct();
        
		$this->db = $this->load->database('default',true);
		$this->load->library('session');
		$this->table_name = 'admin_users';
					
    }
	
	
	function is_set(){
			
		if($this->session->userdata('alogin'))
			return true;
		else 
			return false;
			
	}

	function set_user_login_data($user){
		
		
		$this->session->set_userdata($user);
	}

	function login($username,$password){

		$this->db->select('admin_users.username,admin_users.password');
		$this->db->from('admin_users');		
	
		if($query->num_rows() > 0){
			 return $query->row_array();
		}else{
			return FALSE;
		}
	
	}
	
	
	function set_data($table, $data,$where=NULL){
		
		if(is_array($where)){
			
			$get = $this->db->get_where($table,$where);
			
			//echo $get->num_rows();
			if($get->num_rows() > 0){                                                        
				
				$this->db->update($table,$data,$where);
				return array('type'=>'update','return'=>$this->db->affected_rows()); 
				
			}else{

				$this->db->insert($table,$data);
				return array('type'=>'insert','return'=>$this->db->insert_id());
					 
			}
		}
		
		$this->db->insert($table,$data);
		return array('type'=>'insert','return'=>$this->db->insert_id());
					 
		//return $this->db->insert_id();
		
	}//Endfunction set_driver($data)


	//Check user login details
	function is_login($key=NULL){
		//var_dump($_SESSION);
		if($key){
			
			if(@$_SESSION[$key]['login']=== TRUE){
				return TRUE;
			}else{
				return FALSE;	
			}//if($_SESSION[$key]['login']=== TRUE){
		
		}else{
			if(@$_SESSION['login']=== TRUE){
					return TRUE;
			}else{
					return FALSE;	
			}//if($_SESSION['login']=== TRUE){
		}//if($key) {
		
	}//public function login_in(){


	//Check user login details
	function logout(){
		
		$this->db->update('admin_users', array('login_status'=>0), array('id'=>$_SESSION['admin']['userID']));
	}//public function login_in(){
	
	function loggin(){
		
		$this->db->update('admin_users', array('login_status'=>1), array('id'=>$_SESSION['admin']['userID']));
	}//public function login_in(){

			

	function dateDifference($date_1 , $date_2 , $format=NULL ) {	
		$date1 = new DateTime(date('Y-m-d', strtotime($date_1)));
		$date2 = $date1->diff(new DateTime(date('Y-m-d', strtotime($date_2))));
		switch($format){
			case 'year': $date = $date2->y;
			break;
			case 'month': $date = $date2->m;
			break;
			case 'day': $date = $date2->d;
			break;
			case 'days': $date = $date2->days;
			break;
			case 'hour': $date = $date2->h;
			break;
			case 'minute': $date = $date2->i;
			break;
			case 'second': $date = $date2->s;
			break;
			default : $date = array('year'=>$date2->y,'month'=>$date2->m,'day'=>$date2->d,'days'=>$date2->days);
			
		}
		return $date;
		
	}
	
	
	
	function generateCode() {
		
		$this->db->select('cand_id');
		$this->db->order_by('id','DESC');
		$query = $this->db->get('candidate');
	
		if($query->num_rows() == 0){
			return  date('Y').'/1';
		}else{
			$number = $query->row_array();
			
				$cadNum = explode('/',$number['cand_id']);
				//var_dump($cadNum);
				if(array_key_exists(0, $cadNum)) {
					$inc = $cadNum[1] + 1;
					return date('Y').'/'.$inc ;
				}else{
					return  date('Y').'/1';
				}
			//$this->generateCode();
		}
	}// function generateCode() 

	
	
	
	function get_data($table, $where=NULL, $order=NULL,$dir=NULL){
	
		if($order && $dir){
			$this->db->order_by($order , $dir);
		}	
			
		if(is_array($where)){
			
			
			$get = $this->db->get_where($table, $where);
			
		}else{
			$get = $this->db->get($table);
		}
		
		//echo $get->num_rows() ;
		if($get->num_rows() > 0){
			
			return  $get->result_array();
								
		}else{
			return FALSE;
		
		}
		
	}//function get_data2($table, $where=NULL, $order=NULL)
		
	
	
	function delete($table, $where){
		
		$this->db->delete($table,$where);
		return true;		
	}
	
	
	
	function setImage($table, $where ,$pathData){
		if($where){	
			$this->db->update($table,$pathData,$where);
		}else{
			$this->db->update($table,$pathData);
		}
		
	}//function getUser($email,$password)

	
	function changePassword($new,$id){
		
		$this->db->update($this->table_name,array('password'=>sha1($new)),array('id'=>$id));
		return $this->db->affected_rows();
		
	}//function getUser($email,$password)

	
	function addField($table, $field, $datatype){
		
		$query = false;
		$sql = "SHOW COLUMNS FROM ".$table." LIKE '".$field."'";
		$QueryFind = $this->db->query($sql);
			
		if($QueryFind->num_rows()== 0){
			$query  = $this->db->query("ALTER TABLE ".$table." ADD ".$field." ".$datatype." NOT NULL");	
		}//	if($row == 0){
		
	}//function addField()
	

	
		
	function modifyField($table, $field, $datatype){
		
		$query = false;
		$sql = "SHOW COLUMNS FROM ".$table." LIKE '".$field."'";
		$QueryFind = $this->db->query($sql);
			
		if($QueryFind->num_rows()> 0){
			$this->db->query("ALTER TABLE ".$table." MODIFY COLUMN ".$field." ".$datatype);
		}//	if($row == 0)
		
	}//function addField()

		
	
}

















