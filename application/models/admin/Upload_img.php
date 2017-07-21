<?
defined('BASEPATH') OR exit('No direct script access allowed');

	class Upload_img extends CI_Model{
	   
       function __construct()
            {
                
                parent::__construct();
            
            }

        function index($name, $type, $post_id)
	        {	
	        	$data = array(
	        		'media_name' => $name,
	        		'media_type' => $type
	        		 );
	        	$this->db->insert('media', $data);


	        }
	}
?>