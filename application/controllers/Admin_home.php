<?defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_home extends CI_Controller{
	 	 


	 	 function __construct(){
	        
	            parent::__construct();
	           	$this->load->database();
	           	
	           	$this->load->model('admin/user_data');
	           	$this->load->model('admin/event');
				$this->load->model('admin/period');
	           	
	           	$this->load->library('pagination');
	           	$this->load->library('form_validation');
	           	$this->load->library('session');
	           	$this->load->library('email');
				$this->load->helper('date');
				$this->load->helper('url');
				//$this->load->helper(array('form', 'url'));
        }


        function valid_user($section){
				
				$is_logged_in = $this->session->userdata('is_logged_in');
				
				if(!isset($is_logged_in) || $is_logged_in != true)
					{
						
						echo 'No tienes permiso para entrar a esta pagina. <a href="'.site_url().'/admin">Login</a>';
						
						die();		
					
					}
				else
					{			
						// variables for user data
						
						$data['user_name']		= $this->session->user_name;						
						$data['user_last']		= $this->session->user_lastName;
						$data['user_mail']		= $this->session->user_mail;
						$data['user_admin']		= $this->session->user_admin;
						$data['user_id']		= $this->session->user_id;
						
						$admin = $this->session->user_admin;


					// Menu for a valid user 	
					switch ($section) {
						    
						    case 'home':$admin_url='admin/my_profile/profile'; break;
						    
						    case 'my_profile': $admin_url='admin/my_profile/profile'; break;						    
						    
						    case 'users': 
						        
						        if($admin==1)
						        {
							        
							        $admin_url='admin/users/users_list';
							        $data['users']=$this->user_data->users(20, $this->uri->segment(4, 1));
									
									$this->init_pagination('/admin_home/valid_user/users', $this->db->count_all('users'), 20, 4);
									
									if($this->input->post('validation'))
									{
										$this->create_user();
									}

									// in case this delete 
									if($this->uri->segment(4))
										{
											$this->load->model('membership_model');
											$this->membership_model->delete_users($this->uri->segment(4));
										}

								
								}
								else
								{
									
									$admin_url='admin/';		
								
								}

								
						        break;
						    case 'update_my_data': 
						    	
						    	
						    	if($this->user_data->user_update($this->input->post('user_id'))){
						    	$admin_url='admin/my_profile/profile'; 
						    	}else{
						    	$admin_url='admin/my_profile/profile'; 

						    	}
						    	

						    	break;						    
						    
						    case 'update_my_pass': 

						    	if($this->input->post('user_pass_data'))
						    	{
									$this->change_password($this->input->post('user_id'));
						    	}
						    	
						    	$admin_url='admin/my_profile/profile'; 

						    	break;						    
						    
						    case 'periods':
						        
						        $admin_url='admin/periods/period_list';	
						        $data['periods'] = $this->db->order_by('period_date_start', 'DESC')->get('periods');

						        if($this->input->post('period_add'))
									{
										$this->create_period();
									}

						        break;

						    case 'period_users':
						        if($this->input->post('period_edit'))
						        {
						        	$this->period->period_edit();
						        }

						        $data['user_available'] = $this->period->get_users(20, $this->uri->segment(5, 1));
						        
						        $data['user_not_available'] = $this->period->get_user_not_available($this->uri->segment(4));
						        $data['period'] = $this->period->get_period($this->uri->segment(4));
						        
						        $this->init_pagination('/admin_home/valid_user/period_users/'.$this->uri->segment(4).'/', $this->db->count_all_results('users_event'), 20, 5);
						    	


						        $admin_url='admin/periods/period_user';	
						    	break;
						    
						    case 'period_user_delete':
						        	//$this->period->period_delete($this->uri->segment(4));
						        	$this->db->delete('periods', array('period_is'=> $this->uri->segment(4)));
						        	redirect('admin_home/valid_user/periods');	

						    	break;
						    
						    case 'events':

						        $admin_url='admin/events/event_add';	
						        
						        $data['events'] = $this->db->query('SELECT * FROM periods, events WHERE event_period_id = period_is ORDER BY event_id DESC');
						        $data['periods'] = $this->db->get('periods');

						        if($this->input->post('event_add'))
									{
										$this->create_event();
									}

						        break;
						    
						    case 'event':
						        
						        $admin_url='admin/events/event';	
						        if($this->input->post('event_edit'))
						        {
						        	$this->event->event_edit($this->input->post('event_id'));
						        }
						        
						        if($this->uri->segment(5) || $this->uri->segment(5) == 1){
						        		$this->event->event_delete($this->uri->segment(4));
						        }
						        $data['periods'] = $this->db->get('periods');
						        $data['event'] = $this->event->get_event($this->uri->segment(4));
						        $data['users_in_event'] = $this->event->users_in_event($this->uri->segment(4));
						        
						        // get users in event
								$data['users_in_event']=$this->event->user_in_event($this->uri->segment(4));


						        break;
						    
						    case 'users_event':
						        
						        $admin_url='admin/users_event/user_event_add';	
						        
						        $data['users_event'] = $this->period->get_users(20, $this->uri->segment(5, 1));
						        
						        
						        //in case this add users
						        if($this->input->post('user_event_add'))
									{
										$this->create_user_event();
									}
								// in case this delete 
								if($this->uri->segment(4) || $this->uri->segment(4) != 0)
									{
										$this->load->model('admin/users_event');
										$this->users_event->delete_users($this->uri->segment(4), $this->uri->segment(5));
									}
								//in case this update
								if($this->input->post('user_event_edit'))
								{
									$this->load->model('admin/users_event');
									$this->users_event->update_users($this->uri->segment(5));
								}

						        $this->init_pagination('/admin_home/valid_user/users_event/0/', $this->db->count_all_results('users_event'), 20, 5);


						        break;
						    

						    // a url with no valid id goes back to home 
						     default:
						     	
						     	$admin_url='admin/404/not';						     
						}
						
						$data['main_content']= $admin_url;	
						
						$this->load->view('admin/home/template', $data);					

					}	
	        	}

		 function init_pagination($uri,$total_rows,$per_page,$segment)
		 		{
					$ci                          =& get_instance();					
					$config['per_page']          = $per_page;
					$config['uri_segment']       = $segment;
					$config['base_url']          = site_url().$uri;
					$config['total_rows']        = $total_rows;
					$config['use_page_numbers']  = TRUE;
					$config['first_tag_open'] 	= $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
					$config['first_tag_close'] 	= $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
					$config['cur_tag_open'] 	= '<li class="active"><a href="#">';
					$config['cur_tag_close'] 	= "</a></li>";

					$ci->pagination->initialize($config);
					
					return $config;    
			   } 


		function create_user(){

			

			$config = array(
			        
			        array(
			                'field' => 'user_name',
			                'label' => 'Nombre',
			                'rules' => 'trim|required',
			                'errors'=> array(
			                		'required'=>'Ingresa tu %s.'
			                	)
			        ),
			        array(
			                'field' => 'user_lastName',
			                'label' => 'Apellido',
			                'rules' => 'trim|required',
			                'errors'=> array(
			                		'required'=>'Ingresa tu %s.'
			                	)
			        ),
			        array(
			                'field' => 'user_mail',
			                'label' => 'Email',
			                'rules' => 'trim|required|valid_email|is_unique[users.user_mail]',
			                'errors'=> array(
			                		'required'=>'Escribe tu %s.',
			                		'valid_email'=>'Debes ingresar un correo real.',
			                		'is_unique'=>'Este correo ya esta siendo usado.'
			                	)
			        )
			);
					
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){
					//in case there is something wrong we go back and show warnings
					$admin_url='admin/users/users_list';
				}
				else
				{	
					//when is all rigth we load 				
					$this->load->model('membership_model');
					if( $query = $this->membership_model->register_user() ){

												//send a mail to user giving password

						$user_name = $this->input->post('user_name');
						$user_mail = $this->input->post('user_mail');
						$user_pass = $this->input->post('user_password');
						$message = 'Estimado/a:'
									.$user_name
									.' se ha creado un usuario para el sistema de eventos.'
									.'Usuario: '
									.$user_mail
									.' contraseña:'
									.$user_mail;
						
						$this->email->from('no-replay@example.com', 'Sistema de eventos');
						$this->email->to($this->input->post($user_mail));
						$this->email->subject('Usuario creado');
						$this->email->message($message);
						$this->email->send();

						redirect('admin_home/valid_user/users');
					}else{
						$this->load->view('admin_home/valid_user/users');
					}
				}

		}

		function create_period(){

		
			$config = array(						        
				        array(
				                'field' => 'period_tit',
				                'label' => 'Titulo',
				                'rules' => 'trim|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.'
				                	)
				        ),

				        array(
				                'field' => 'period_description',
				                'label' => 'Descripción',
				                'rules' => 'trim|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.'
				                	)
				        ),

				        array(
				                'field' => 'period_date_start',
				                'label' => 'Nombre de contacto',
				                'rules' => 'trim|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.'
				                	)
				        ),

				        array(
				                'field' => 'period_date_end',
				                'label' => 'Fecha de cierre',
				                'rules' => 'trim|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.'
				                	)
				        ));
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){
					//in case there is something wrong we go back and show warnings
					$admin_url='admin/periods/period_list';
				}
				else
				{	
					//when is all rigth we load 				
					$this->load->model('admin/period');
					if( $query = $this->period->period_add() ){
						redirect('admin_home/valid_user/periods');
					}else{
						$this->load->view('admin_home/valid_user/periods');
					}
				}
			}
			
		function create_event(){

		
			$config = array(						        
				        array(
				                'field' => 'event_title',
				                'label' => 'Evento',
				                'rules' => 'trim|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.'
				                	)
				        ),

				        array(
				                'field' => 'event_description',
				                'label' => 'Descripción',
				                'rules' => 'trim|required',
				                'errors'=> array(
				                		'required'=>'Ingresa la %s.'
				                	)
				        ),

				        array(
				                'field' => 'event_hour',
				                'label' => 'hora de evento',
				                'rules' => 'trim|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.'
				                	)
				        ),

				        array(
				                'field' => 'event_place',
				                'label' => 'Lugar',
				                'rules' => 'trim|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.'
				                	)
				        ),

				        array(
				                'field' => 'event_map',
				                'label' => 'Mapa de evento',
				                'rules' => 'trim|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.'
				                	)
				        ),

				        array(
				                'field' => 'event_date',
				                'label' => 'Fecha de evento',
				                'rules' => 'trim|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.'
				                	)
				        ),

				        array(
				                'field' => 'event_user_limit',
				                'label' => 'Limite de usuarios',
				                'rules' => 'trim|numeric|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.',
				                		'numeric'=>'Solo puedes agregar numeros'
				                	)
				        ));
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){
					//in case there is something wrong we go back and show warnings
					$admin_url='admin/events/event_add';
				}
				else
				{	
					//when is all rigth we load 				
					
					if( $query = $this->event->event_add() ){

						redirect('admin_home/valid_user/events');
					}else{
						$this->load->view('admin_home/valid_user/events');
					}
				}
			}
		
		function change_password($id){
						$config = array(						        
				        array(
				                'field' => 'user_pass',
				                'label' => 'Contraseña',
				                'rules' => 'trim|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.'
				                	)
				        ),

				        array(
				                'field' => 'user_passC',
				                'label' => 'Confirma contrasela',
				                'rules' => 'trim|matches[user_pass]|required',
				                'errors'=> array(
				                		'required'=>'Ingresa tu %s.',
				                		'matches'=>'Las contraseñas no coinciden'
				                	)
				        ));
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){
					//in case there is something wrong we go back and show warnings
					$admin_url='admin/my_profile/profile';

				}
				else
				{	
					//when is all rigth we load 				
					
					if( $query = $this->user_data->change_password($id) ){
						
						$data['pass_changed']=true;
					}else{
						$data['pass_changed']=false;
					}
					redirect('admin_home/valid_user/my_profile');
				}
		}

		function create_user_event(){

			

			$config = array(
			        
			        array(
			                'field' => 'user_name',
			                'label' => 'Nombre',
			                'rules' => 'trim|required',
			                'errors'=> array(
			                		'required'=>'Ingresa tu %s.'
			                	)
			        ),
			        array(
			                'field' => 'user_lastName',
			                'label' => 'Apellido',
			                'rules' => 'trim|required',
			                'errors'=> array(
			                		'required'=>'Ingresa tu %s.'
			                	)
			        ),
			        array(
			                'field' => 'user_mail',
			                'label' => 'Email',
			                'rules' => 'trim|required|valid_email|is_unique[users_event.user_event_email]',
			                'errors'=> array(
			                		'required'=>'Escribe tu %s.',
			                		'valid_email'=>'Debes ingresar un correo real.',
			                		'is_unique'=>'Este correo ya esta siendo usado.'
			                	)
			        )
			);
					
				$this->form_validation->set_rules($config);

				if($this->form_validation->run()==FALSE){
					//in case there is something wrong we go back and show warnings
					$admin_url='admin/users_event/user_event_add';
				}
				else
				{	
					//when is all rigth we load 				
					$this->load->model('admin/users_event');
					if( $query = $this->users_event->add_users() ){
						

						//send a mail to user giving password

						$user_name = $this->input->post('user_name');
						$user_mail = $this->input->post('user_mail');
						$user_pass = $this->input->post('user_password');
						$message = 'Estimado/a:'
									.$user_name
									.' se ha creado un usuario para el sistema de eventos.'
									.'Usuario: '
									.$user_mail
									.' contraseña:'
									.$user_mail;
						
						$this->email->from('no-replay@example.com', 'Sistema de eventos');
						$this->email->to($this->input->post($user_mail));
						$this->email->subject('Usuario creado');
						$this->email->message($message);
						$this->email->send();

						redirect('admin_home/valid_user/users_event');
					}else{
						$this->load->view('admin_home/valid_user/users_event');
					}
				}

}		

		function ajax_add_user(){
			$data = array(
		        'period_user_p_id' => $this->input->post('period_is'),
		        'period_user_u_id' => $this->input->post('user_event_id')
			);

			
			if($query = $this->db->insert('period_user', $data))
			{
				return true;
			}else{
				return false;
			}
		}	
		function ajax_remove_user(){


			
			if($query = $this->db->delete('period_user', array('period_user_id' => $this->input->post('period_user_id'))))
			{
				return true;
			}else{
				return false;
			}
		}			
	}	
?>