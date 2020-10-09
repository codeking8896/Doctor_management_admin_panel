<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->load->library('migration');

		if ($this->migration->current() === FALSE)
		{
				show_error($this->migration->error_string());
		}
		$this->session->sess_destroy();
		$this->load->view('login');
	}
	public function setup()
	{
		$data['title'] = "Installation Page";
		$this->load->view('setup',$data);
	}
	public function dashboard()
	{
		$data['title'] = "Dashboard";
		$data['total'] = $this->user_mo->total_count();
		$data['info'] = $this->user_mo->patient();
		$this->load->view('dashboard',$data);
	}
	public function appointment()
	{
		$data['title'] = "Appointment List";
		$data['info'] = $this->user_mo->patient_info();
		$data['ap_list'] = $this->user_mo->appointment_list();
		$this->load->view('appointment',$data);
	}
	public function prescription()
	{
		$data['title'] = "Prescription List";
		$data['info'] = $this->user_mo->getprescription();
		$this->load->view('prescription',$data);
	}
	public function billing()
	{
		$data['title'] = "Billing List";
		$data['info'] = $this->user_mo->getinvoice();
		$this->load->view('billing',$data);
	}
	public function patients()
	{
		$data['title'] = "Patient List";
		$data['info'] = $this->user_mo->patient_info();
		$this->load->view('patient',$data);
	}
	public function lockscreen()
	{
		$data['user'] = $this->user_mo->getuser();
		$this->load->view('lockscreen',$data);
	}
	public function recoverpassword()
	{
		$data['title'] = "Recover Password";
		$this->load->view('recoverpassword',$data);
	}
	public function profile()
	{
		$data['title'] = "Doctor's Profile";
		$data['info'] = $this->user_mo->user_info();
		$this->load->view('profile',$data);
	}
	public function addpatient()
	{
		$data['title'] = "Add New Patient";
		$this->load->view('addpatient',$data);
	}

	public function patient_profile()
	{
		$data['title'] = "Patient Profile";
		$this->load->view('patientprofile',$data);
	}

	public function editpatient()
	{
		$data['title'] = "Edit Patient Profile";
		$this->load->view('editpatient',$data);
	}

	public function addprescription()
	{
		$data['title'] = "Add Prescription";
		$data['info'] = $this->user_mo->patient_info();
		$this->load->view('addprescription',$data);
	}

	public function print_prescription()
	{
		$data['title'] = "Print Prescription";
		$this->load->view('printprescription',$data);
	}

	public function createinvoice()
	{
		$data['title'] = "Create New Invoice";
		$data['info'] = $this->user_mo->patient_info();
		$this->load->view('createinvoice',$data);
	}

	public function print_invoice()
	{
		$data['title'] = "Print Invoice";
		$this->load->view('printinvoice',$data);
	}
}
