<?defined('BASEPATH') OR exit('No direct script access allowed');

	class Empresa extends CI_Model{
		function __construct(){
			parent:: __construct();
		}

		function rec_empresa_list(){
			//$query = $this -> db -> get('periods');
		}

		function rec_empresa_add(){
			$new_rec_empresa_row = array(
					'rec_empresa_title'=> $this->input->post('rec_empresa_tit'),
					'rec_empresa_description'=> $this->input->post('rec_empresa_description'),
					'rec_empresa_date_start'=> $this->input->post('rec_empresa_date_start'),
					'rec_empresa_date_end'=> $this->input->post('rec_empresa_date_end')
				);

			$insert = $this->db->insert('periods', $new_rec_empresa_row);
			return $insert;
		}

		function get_users($pagingConfig, $page){
			return $this->db->get('users_event', $pagingConfig, ($page-1) * $pagingConfig);
		}

		function get_user_available($id){
		
			$sql = sprintf("
				SELECT * 
				FROM users_event, rec_empresa_user ",
				$id);

			$user_availables = $this->db->query($sql);

			return $user_availables;
		}

		function get_user_not_available($id){
			$sql = sprintf("
				SELECT * 
				FROM users_event, rec_empresa_user 
				WHERE rec_empresa_user.rec_empresa_user_p_id = %s 
				AND users_event.user_event_id = rec_empresa_user.rec_empresa_user_u_id", 
				$id);

			

			$user_not = $this->db->query($sql);
			return $user_not;
		}

		function get_period($id){
			$period = $this->db
							->where('rec_empresa_is', $id)
							->get('periods');
			return $period;
		}

		function rec_empresa_edit(){
			$new_rec_empresa_row = array(
					'rec_empresa_title'=> $this->input->post('rec_empresa_tit'),
					'rec_empresa_description'=> $this->input->post('rec_empresa_description'),
					'rec_empresa_date_start'=> $this->input->post('rec_empresa_date_start'),
					'rec_empresa_date_end'=> $this->input->post('rec_empresa_date_end')
				);

			$insert = $this->db
						->where('rec_empresa_is', $this->input->post('rec_empresa_id'))
						->update('periods', $new_rec_empresa_row);
			return $insert;
		}

		function rec_empresa_delete($id){
			$this->db->delete('periods', array('rec_empresa_is'=> $id));
		}
	}

?>