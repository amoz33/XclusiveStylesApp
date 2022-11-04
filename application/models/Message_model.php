<?php
class Message_model extends CI_Model
{
	var $db;
    function __construct (){
        parent::__construct();
	}
	
		
	function getMessageWrapper($message,$wrapperType, $fontSize=NULL){
				
		if($fontSize){$size ='style="font-size:'.$fontSize.'px"';}else{$size=NULL;}		
				
		switch($wrapperType){
			case  ($wrapperType=='error' || $wrapperType=='danger'): $msg= '<div class="alert alert-danger alert-dismissible text-left" role="alert" >
                  <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <span class="sr-only">Error:</span><span '.$size.' >'. $message .'</span></div>';
			break;
			case 'warning': $msg= '<div class="alert alert-warning alert-dismissible text-left" role="alert" >
                  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <span class="sr-only">Error:</span><span '.$size.' >'. $message .'</span></div>';
			break;
			case 'success': $msg= '<div class="alert alert-success alert-dismissible text-left" role="alert" >
                  <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <span class="sr-only">Error:</span><span '.$size.' >'. $message .'</span></div>';
			break;
			case 'info': $msg= '<div class="alert alert-info alert-dismissible text-left" role="alert" >
                  <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <span class="sr-only">Error:</span><span '.$size.' >'. $message .'</span></div>';
			break;
			default: $msg = $message;
		
		}//switch(){
			
			return $msg;					
		
	}//ENDfunction get_current_session(){
		
	
}

















