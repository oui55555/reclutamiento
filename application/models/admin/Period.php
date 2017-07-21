<?defined('BASEPATH') OR exit('No direct script access allowed');

	class Period extends CI_Model{
		function __construct(){
			parent:: __construct();
		}

		function period_list(){
			//$query = $this -> db -> get('periods');
		}

		function period_add(){
			$new_period_row = array(
					'period_title'=> $this->input->post('period_tit'),
					'period_description'=> $this->input->post('period_description'),
					'period_date_start'=> $this->input->post('period_date_start'),
					'period_date_end'=> $this->input->post('period_date_end')
				);

			$insert = $this->db->insert('periods', $new_period_row);
			return $insert;
		}

		function get_users($pagingConfig, $page){
			return $this->db->get('users_event', $pagingConfig, ($page-1) * $pagingConfig);
		}

		function get_user_available($id){
		
			$sql = sprintf("
				SELECT * 
				FROM users_event, period_user ",
				//WHERE users_event.user_event_id = period_user.period_user_u_id 
				//AND period_user.period_user_p_id <> %s 
				$id);

			$user_availables = $this->db->query($sql);

			return $user_availables;
		}

		function get_user_not_available($id){
			$sql = sprintf("
				SELECT * 
				FROM users_event, period_user 
				WHERE period_user.period_user_p_id = %s 
				AND users_event.user_event_id = period_user.period_user_u_id", 
				$id);

			

			$user_not = $this->db->query($sql);
			 					//->where('period_user.period_user_p_id ', $id)
								//->where('users_event.user_event_id ', 'period_user.period_user_u_id')
			 					//->get('period_user');
			 					//->get(array('users_event, period_user'));

			return $user_not;
		}

		function get_period($id){
			$period = $this->db
							->where('period_is', $id)
							->get('periods');
			return $period;
		}

		function period_edit(){
			$new_period_row = array(
					'period_title'=> $this->input->post('period_tit'),
					'period_description'=> $this->input->post('period_description'),
					'period_date_start'=> $this->input->post('period_date_start'),
					'period_date_end'=> $this->input->post('period_date_end')
				);

			$insert = $this->db
						->where('period_is', $this->input->post('period_id'))
						->update('periods', $new_period_row);
			return $insert;
		}

		function period_delete($id){
			$this->db->delete('periods', array('period_is'=> $id));
		}
	}

?>