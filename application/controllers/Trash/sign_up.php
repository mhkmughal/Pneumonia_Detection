<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Login extends CI_Controller
{
	
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		/*cash control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		
	}
	
	/***default functin, redirects to login page if no admin logged in yet***/
	public function index()
	{
		if ($this->session->userdata('admin_login') == 1)
			redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
		
		if ($this->session->userdata('doctor_login') == 1)
			redirect(base_url() . 'index.php?doctor/dashboard', 'refresh');
		
		if ($this->session->userdata('patient_login') == 1)
			redirect(base_url() . 'index.php?patient/dashboard', 'refresh');
			
		$config = array(
			array(
				'field' => 'Login_type',
				'label' => 'Account Type',
				'rules' => 'required|xss_clean'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|xss_clean|valid_email'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|xss_clean|callback__validate_login'
			)
		);
		
		$this->form_validation->set_rules($config);
		$this->form_validation->set_message('_validate_login', ucfirst($this->input->post('login_type')) . ' Login failed!');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			if ($this->session->userdata('admin_login') == 1)
				redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
			
			if ($this->session->userdata('doctor_login') == 1)
				redirect(base_url() . 'index.php?doctor/dashboard', 'refresh');
			
			if ($this->session->userdata('patient_login') == 1)
				redirect(base_url() . 'index.php?patient/dashboard', 'refresh');
		}
	}
	
    function sign_up($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
			$data['name']                      = $this->input->post('name');
			$data['email']                     = $this->input->post('email');
			$data['password']                  = $this->input->post('password');
			$data['address']                   = $this->input->post('address');
			$data['phone']                     = $this->input->post('phone');

			$this->db->insert('registeration', $data);			
			redirect(base_url() . 'index.php?login', 'refresh');
		}
	/***DEFAULT NOR FOUND PAGE*****/
	function four_zero_four()
	{
		$this->load->view('four_zero_four');
    }
}
