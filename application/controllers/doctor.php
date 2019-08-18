<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Doctor extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		/*cache control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	}
	
	/***Default function, redirects to login page if no admin logged in yet***/
	public function index()
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		if ($this->session->userdata('doctor_login') == 1)
			redirect(base_url() . 'index.php?doctor/dashboard', 'refresh');
	}
	
	/***DOCTOR DASHBOARD***/
	function dashboard()
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		$page_data['page_name']  = 'dashboard';
		$page_data['page_title'] = get_phrase('doctor_dashboard');
		$this->load->view('index', $page_data);
	}

	/***Manage patients**/
	function manage_patient($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
			
		if ($param1 == 'create') {
			$data['name']                      = $this->input->post('name');
			$data['email']                     = $this->input->post('email');
			$data['password']                  = $this->input->post('password');
			$data['address']                   = $this->input->post('address');
			$data['phone']                     = $this->input->post('phone');
			$data['sex']                       = $this->input->post('sex');
			$data['birth_date']                = $this->input->post('birth_date');
			$data['age']                       = $this->input->post('age');
			$data['blood_group']               = $this->input->post('blood_group');
			$data['account_opening_timestamp'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
			$this->db->insert('patient', $data);
			
			// Uploading patient image
            $patient_id = mysql_insert_id();
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/patient_image/' . $patient_id . '.jpg');
			
			$this->email_model->account_opening_email('patient', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
			$this->session->set_flashdata('flash_message', get_phrase('account_opened'));
			
			redirect(base_url() . 'index.php?doctor/manage_patient', 'refresh');
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['name']        = $this->input->post('name');
			$data['email']       = $this->input->post('email');
			$data['password']    = $this->input->post('password');
			$data['address']     = $this->input->post('address');
			$data['phone']       = $this->input->post('phone');
			$data['sex']         = $this->input->post('sex');
			$data['birth_date']  = $this->input->post('birth_date');
			$data['age']         = $this->input->post('age');
			$data['blood_group'] = $this->input->post('blood_group');
			
			$this->db->where('patient_id', $param3);
			$this->db->update('patient', $data);
			
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/patient_image/' . $param3 . '.jpg');
			
			
			$this->session->set_flashdata('flash_message', get_phrase('account_updated'));
			redirect(base_url() . 'index.php?doctor/manage_patient', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('patient', array(
				'patient_id' => $param2
			))->result_array();
		} else if ($param1 == 'patient_history') {
			$page_data['patient_history'] = $this->db->get_where('patient', array(
				'patient_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('patient_id', $param2);
			$this->db->delete('patient');
			
			$this->session->set_flashdata('flash_message', get_phrase('account_deleted'));
			redirect(base_url() . 'index.php?doctor/manage_patient', 'refresh');
		}
		$page_data['page_name']  = 'manage_patient';
		$page_data['page_title'] = get_phrase('manage_patient');
		$page_data['patients']   = $this->db->get('patient')->result_array();
		$this->load->view('index', $page_data);
	}


	function new_patient() {
			if ($this->session->userdata('doctor_login') != 1)
				redirect(base_url() . 'index.php?login', 'refresh');
				
		$page_data['page_name']  = 'new_patient';
		$page_data['page_title'] = get_phrase('new_patient');
		$page_data['patients']   = $this->db->get('patient')->result_array();
		$this->load->view('index' ,$page_data);
		}


		function existing_patient() {
			if ($this->session->userdata('doctor_login') != 1)
				redirect(base_url() . 'index.php?login', 'refresh');	
							
		$page_data['page_name']  = 'existing_patient';
		$page_data['page_title'] = get_phrase('existing_patient');
		$page_data['patients']   = $this->db->get('patient')->result_array();
		$this->load->view('index' ,$page_data);
	  }
	
	/***MANAGE APPOINTMENTS******/
	function manage_appointment($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		
		if ($param1 == 'create') {
			$data['doctor_id']             = $this->input->post('doctor_id');
			$data['patient_id']            = $this->input->post('patient_id');
			$data['appointment_timestamp'] = strtotime($this->input->post('appointment_timestamp'));
			$this->db->insert('appointment', $data);
			$this->session->set_flashdata('flash_message', get_phrase('appointment_created'));
			redirect(base_url() . 'index.php?doctor/manage_appointment', 'refresh');
		}
		if ($param1 == 'edit' && $param2 == 'do_update') {
			$data['doctor_id']             = $this->input->post('doctor_id');
			$data['patient_id']            = $this->input->post('patient_id');
			$data['appointment_timestamp'] = strtotime($this->input->post('appointment_timestamp'));
			$this->db->where('appointment_id', $param3);
			$this->db->update('appointment', $data);
			$this->session->set_flashdata('flash_message', get_phrase('appointment_updated'));
			redirect(base_url() . 'index.php?doctor/manage_appointment', 'refresh');
			
		} else if ($param1 == 'edit') {
			$page_data['edit_profile'] = $this->db->get_where('appointment', array(
				'appointment_id' => $param2
			))->result_array();
		}
		if ($param1 == 'delete') {
			$this->db->where('appointment_id', $param2);
			$this->db->delete('appointment');
			$this->session->set_flashdata('flash_message', get_phrase('appointment_deleted'));
			redirect(base_url() . 'index.php?doctor/manage_appointment', 'refresh');
		}
		$page_data['page_name']    = 'manage_appointment';
		$page_data['page_title']   = get_phrase('manage_appointment');
		$page_data['appointments'] = $this->db->get_where('appointment', array(
			'doctor_id' => $this->session->userdata('doctor_id')
		))->result_array();
		$this->load->view('index', $page_data);
	}
	/***CREATE REPORT BIRTH,DEATH,OPERATION**/
	function manage_report($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		
		//creating a new report
		if ($param1 == 'create') {
			$data['type']        = $this->input->post('type');
			$data['description'] = $this->input->post('description');
			$data['timestamp']   = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
			$data['doctor_id']   = $this->input->post('age');
			$data['patient_id']  = $this->input->post('phone');
			$this->db->insert('report', $data);
			$this->session->set_flashdata('flash_message', get_phrase('report_created'));
			redirect(base_url() . 'index.php?doctor/manage_report', 'refresh');
		}
		if ($param1 == 'delete') {
			$this->db->where('report_id', $param2);
			$this->db->delete('report');
			$this->session->set_flashdata('flash_message', get_phrase('report_deleted'));
			redirect(base_url() . 'index.php?doctor/manage_report', 'refresh');
		}
		$page_data['page_name']  = 'manage_report';
		$page_data['page_title'] = get_phrase('manage_report');
		$page_data['reports']    = $this->db->get('report')->result_array();
		$this->load->view('index', $page_data);
	}
	
	/******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
	function manage_profile($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('doctor_login') != 1)
			redirect(base_url() . 'index.php?login', 'refresh');
		if ($param1 == 'update_profile_info') {
			$data['name']    = $this->input->post('name');
			$data['email']   = $this->input->post('email');
			$data['address'] = $this->input->post('address');
			$data['phone']   = $this->input->post('phone');
			$data['profile'] = $this->input->post('profile');
			
			$this->db->where('doctor_id', $this->session->userdata('doctor_id'));
			$this->db->update('doctor', $data);
			$this->session->set_flashdata('flash_message', get_phrase('profile_updated'));
			redirect(base_url() . base_url() . 'index.php?doctor/manage_profile/', 'refresh');
		}
		if ($param1 == 'change_password') {
			$data['password']             = $this->input->post('password');
			$data['new_password']         = $this->input->post('new_password');
			$data['confirm_new_password'] = $this->input->post('confirm_new_password');
			
			$current_password = $this->db->get_where('doctor', array(
				'doctor_id' => $this->session->userdata('doctor_id')
			))->row()->password;
			if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
				$this->db->where('doctor_id', $this->session->userdata('doctor_id'));
				$this->db->update('doctor', array(
					'password' => $data['new_password']
				));
				$this->session->set_flashdata('flash_message', get_phrase('password_updated'));
			} else {
				$this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
			}
			redirect(base_url() . base_url() . 'index.php?doctor/manage_profile/', 'refresh');
		}
		$page_data['page_name']    = 'manage_profile';
		$page_data['page_title']   = get_phrase('manage_profile');
		$page_data['edit_profile'] = $this->db->get_where('doctor', array(
			'doctor_id' => $this->session->userdata('doctor_id')
		))->result_array();
		$this->load->view('index', $page_data);
	}
}