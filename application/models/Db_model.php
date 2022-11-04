<?php
class Db_model extends CI_Model
{
   
    	var $session;
	    function __construct (){
	        parent::__construct();
	        $this->table_name = '';
	        $this->primary_key = 'id';
	        $this->order_by = 'id ASC';
		}
	
	
	function createTable() {
			
			//CREATE TABLE FOR ADMIN USERS
			$sql = "CREATE TABLE IF NOT EXISTS `admin_users` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(100) DEFAULT NULL,
				  `email` varchar(120) DEFAULT NULL,
				  `username` varchar(100) NOT NULL,
				  `password` varchar(100) NOT NULL,
				  `login_status` tinyint(1) NOT NULL DEFAULT '0',
				  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";	
			
			$this->db->query($sql);

			$sql = "INSERT INTO `admin_users` (`id`, `name`, `email`, `username`, `password`, `date_created`) VALUES
					(1, 'Tosin Adegoke', 'amosadex2010@gmail.com', 'admin_dev', 'admin_dev', '2022-10-20 14:00:15'),
					(2, 'Joe Blazzars', 'joeblazzars@gmail.com', 'admin123', 'admin123', '2022-10-20 14:10:15');
					";

				$query_res = $this->db->get('admin_users');
				if($query_res->num_rows() == 0){
					$this->db->query($sql);
				}
				

			//CREATE TABLE FOR HAIR CATEGORY
			$sql = "CREATE TABLE IF NOT EXISTS `hair_category` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `category_name` varchar(150) DEFAULT NULL,
				  `status` int(1) DEFAULT NULL,
				  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
				  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
			$this->db->query($sql);

			
			//CREATE TABLE FOR DRESS CATEGORY
			$sql = "CREATE TABLE IF NOT EXISTS `dress_category` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `category_name` varchar(150) DEFAULT NULL,
				  `status` int(1) DEFAULT NULL,
				  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
				  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
			$this->db->query($sql);


			//CREATE TABLE FOR HAIRSTYLES IMAGES
			$sql = "CREATE TABLE IF NOT EXISTS `hairstyle_images` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
  				  `category_id` varchar(30) DEFAULT NULL,
  				  `image_url` text DEFAULT NULL,
  				  `date_upload` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
			$this->db->query($sql);

			//CREATE TABLE FOR DRESSES IMAGES
			$sql = "CREATE TABLE IF NOT EXISTS `dress_images` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
  				  `category_id` varchar(30) DEFAULT NULL,
  				  `image_url` text DEFAULT NULL,
  				  `date_upload` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
			$this->db->query($sql);


			//CREATE TABLE FOR NAILS IMAGES
			$sql = "CREATE TABLE IF NOT EXISTS `nails_images` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
  				  `image_url` text DEFAULT NULL,
  				  `date_upload` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
			$this->db->query($sql);
		
		
	}//function createTable()

}