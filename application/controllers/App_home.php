<?defined('BASEPATH') OR exit('No direct script access allowed');

	class App_home extends CI_Controller{
		function __construct()
	        {
	             parent::__construct();
	             


	             $prefs['template'] = array(
				        'table_open'           => '<table class="table panel">',
				        'cal_cell_start'       => '<td class="day">',
				        'cal_cell_start_today' => '<td class="today">'
				);

	             $this->load->library('calendar', $prefs);
	             $this->load->helper('date');
	             $this->load->library('session');

				$this->load->helper('url');
	             $this->load->model('app/app_model');
	             $this->load->database();
	             $this->load->library('form_validation');
	        }

	    function valid_user($section){
	    		$is_logged_in = $this->session->userdata('is_logged_in');
				
				if(!isset($is_logged_in) || $is_logged_in != true)
					{
						$this->session->sess_destroy();	
						echo 'No tienes permiso para entrar a esta pagina. <a href="'.site_url().'/app">Login</a>';
						
						die();		
					
					}
				else
					{			
						// variables for user data
						$data['user_id']		= $this->session->user_id;						
						$data['user_name']		= $this->session->user_name;						
						$data['user_last']		= $this->session->user_lastName;
						$data['user_mail']		= $this->session->user_mail;
						



						// Menu for a valid user 	
						switch ($section) {
						    
						    case 'home':
						    	$admin_url='app/home/wellcome'; 
						    	
						    break;
						    
						    case 'my_user': 
						    	$admin_url='app/home/my_user'; 

						    break;						    
						    
						    case 'calendar': 
						    	$admin_url='app/home/calendar'; 
						    	$data['periods']=$this->app_model->periods_per_user();

						    	if($this->uri->segment(4)){
						    		$data['calendario']=true;
						    		$data['events']= $this->app_model->create_calendar($this->uri->segment(4));
						    		$this->app_model->create_calendar($this->uri->segment(4));

						    		$data['if_registred']=$this->app_model->check_if_registed($this->session->user_id, $this->uri->segment(4));


						    	}else{
						    		$data['calendario']=false;
						    	}

						    break;						    
						    
						    case 'register':
						    	
						    	$data['if_registred'] = $this->app_model->suscribe($this->session->user_id, $this->uri->segment(4));
						    	redirect('app_home/valid_user/event_register/'.$this->uri->segment(4));
						    break;						    
						    
						    case 'event_register':
						    	
						    	$data['event']=$this->db->where('event_id', $this->uri->segment(4))->get('events', 1);
						    	$data['event_close']=$this->app_model->event_close($this->uri->segment(4));
						    	$data['am_i_register']=$this->app_model->am_i_register($this->session->user_id, $this->uri->segment(4));
						    	$admin_url='app/home/event_register'; 
						    break;
						    
						    case 'my_events': 
						    	$admin_url='app/home/my_events'; 
						    	$data['my_events']=$this->app_model->get_my_events();

						    break;						    

							default:
						     	
						     	$admin_url='admin/404/not_app';						     
						}
						
						$data['main_content']= $admin_url;	
						$this->load->view('app/home/template', $data);					

				    }
		}

	}

?>