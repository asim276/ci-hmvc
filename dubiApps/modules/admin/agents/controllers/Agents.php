<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agents extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$data['notify_message'] = '';
		
		$this->form_validation->set_rules("email", 'Email address is required!', 'trim|required');
		
		if($this->form_validation->run() === TRUE){
			$agent_id = 3;
			$agent_name = $this->input->post('agent_name');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$query = $this->db->query("call sp_add_update_member('$agent_id', '$agent_name', '$email', '$password')");
			$data['notify_message'] = message($query->row('response'), 'success');
			
		}
		$this->load->view('html_view', $data);
	}
}