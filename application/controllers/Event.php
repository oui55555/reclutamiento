<?defined('BASEPATH') OR exit('No direct script access allowed');

	class Event extends CI_Model{

		function __construct(){
			parent:: __construct();
		}


		function event_add(){
			$new_event_row = array(
					'event_title' => $this->input->post('event_title'),
					'event_description' => $this->input->post('event_description'),
					'event_user_limit' => $this->input->post('event_user_limit'),
					'event_date' => $this->input->post('event_date'),
					'event_hour' => $this->input->post('event_hour'),
					'event_place' => $this->input->post('event_place'),
					'event_map' => $this->input->post('event_map'),
					'event_period_id' => $this->input->post('event_period_id')
				);
			$insert = $this->db->insert('events', $new_event_row);
			return $insert;

		}

		function event_edit($id){
			$update_event = array(
					'event_title' => $this->input->post('event_title'),
					'event_description' => $this->input->post('event_description'),
					'event_user_limit' => $this->input->post('event_user_limit'),
					'event_date' => $this->input->post('event_date'),
					'event_period_id' => $this->input->post('event_period_id')					
				);
			$this->db->where('event_id', $id);
			$insert= $this->db->update('events', $update_event);
			return $insert;
		}

		function event_delete($id){
			        $this->db->delete('events', array('event_id'=> $id));
        
			        $url=site_url();
			        
			        redirect($url.'/admin_home/valid_user/events');

		}

		function event_list(){
			$query= $this->db->query('SELECT * FROM periods, events WHERE event_period_id = period_is ORDER BY event_id DESC');

                if($query->num_rows()>0)
                {
                    return $query->result();
                }
                else
                {
                    return false;
                }
		}

		function get_event($id){
			$query= $this->db
							->where('events.event_id', $id)
							->limit(1)
							->get('events');

			if($query->num_rows()>0)
			{
				return $query->result();
			}else
			{
				return false;
			}

		}

		function users_in_event($id){
				$sql = sprintf('
					SELECT *
					FROM users_event, event_register
					WHERE event_register.event_register_e_id = %s
					AND event_register_u_id = user_event_id
					', $id);

				$query = $this->db->query($sql);
				return $query->result();
		}

		function event_close($id){
			$query = $this->db
				->where('event_register.event_register_e_id', $id)
				->get('event_register');

			if($query->num_rows()>0)
			{
				$user_in = $query->num_rows();
				$limit_number = $this->db
						->where('event_id', $id)
						->get('events');

				if($user_in < $limit_number)
					{
						return false;
					}
					else if($user_in == $limit_number)
					{
						return true;
						$this->db->where('event_id', $id);
						$this->db->update('events', array('event_is_full' => 1 ));
					}
			}
			else
			{
				return false;
			}


		}

	}

?>