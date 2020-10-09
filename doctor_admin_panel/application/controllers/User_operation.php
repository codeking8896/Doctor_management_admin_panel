<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_operation extends CI_Controller {

    public function setup()
    {
        $this->form_validation->set_rules('dname', 'Doctor_name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9\+-]+$/]');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm_Password', 'required');
        $this->form_validation->set_rules('title', 'System_title', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $error['dname'] = form_error('dname');
            $error['email'] = form_error('email');
            $error['phone'] = form_error('phone');
            $error['username'] = form_error('username');
            $error['password'] = form_error('password');
            $error['cpassword'] = form_error('cpassword');
            $error['title'] = form_error('title');
            $this->session->set_flashdata('error', $error);
            redirect(base_url().'user/setup');
        }
        else
        {
            $config['upload_path']   = 'assets/images'; 
            $config['allowed_types'] = 'jpg|png|ico'; 
            $config['max_size']      = 100; 
            $config['max_width']     = 1024; 
            $config['max_height']    = 1280;  

            $this->load->library('upload', $config); 
            
            if ( ! $this->upload->do_upload('logo')) // file upload in folder
            {
                $error = array('error' => $this->upload->display_errors()); 
                $this->session->set_flashdata('image', $error);
                redirect(base_url().'user/setup'); // user redirect          
            }
            else { 
                $data = $this->input->post(); /// USer NAme

                $dataup = array('upload_data' => $this->upload->data()); /// file name 
                $this->upload->do_upload('favicon');
                $dataup1 = array('upload_data' => $this->upload->data()); /// file name 
                $dataedit = array('user_name'=>$data['username'],'doctor_name'=>$data['dname'],'email'=>$data['email'],'mobile'=>$data['phone'],'password'=>base64_encode($data['password']),'logo'=>$dataup['upload_data']['file_name'],'favicon'=>$dataup1['upload_data']['file_name'],'title'=>$data['title']); // array arrange based on table
                $res = $this->user_mo->setup($dataedit);
                if($res) {
                    redirect(base_url());
                }
                else
                {
                    redirect(base_url().'user/setup');
                }
            }
        }
    }

    public function login()
	{
        $user_name = $this->input->post('username');
        $pwd = base64_encode($this->input->post('password'));
        
        if($this->user_mo->login_data($user_name,$pwd))
		{
            $data = array('username'=>$user_name);
			$this->session->set_userdata('userinfo',$data);
            $this->session->set_userdata('userdata',$data);
            redirect(base_url('user/dashboard'));
        }
        else
        {
            $this->session->set_flashdata('msg','Please Check Your Credentials!!');
            redirect(base_url());
        }
        
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
		redirect(base_url());
    }

    public function addpatient()
    {
        $this->form_validation->set_rules('name', 'Patient name', 'required');
        $this->form_validation->set_rules('age', 'Age', 'required|numeric');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|regex_match[/^[0-9\+-]+$/]');
        $this->form_validation->set_rules('add', 'Address', 'required');
        $this->form_validation->set_rules('height', 'Height', 'required|regex_match[/^[0-9\'"]+$/]');
        $this->form_validation->set_rules('weight', 'Weight', 'required|numeric');
        $this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
        $this->form_validation->set_rules('blood_pressure', 'Blood Pressure', 'required|numeric');
        $this->form_validation->set_rules('pulse', 'Pulse', 'required|numeric');
        $this->form_validation->set_rules('respiration', 'Respiration', 'required|numeric');
        $this->form_validation->set_rules('allergy', 'Allergy', 'required');
        $this->form_validation->set_rules('diet', 'Diet', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $error['name'] = form_error('name');
            $error['age'] = form_error('age');
            $error['gender'] = form_error('gender');
            $error['phone'] = form_error('phone');
            $error['add'] = form_error('add');
            $error['height'] = form_error('height');
            $error['weight'] = form_error('weight');
            $error['blood_group'] = form_error('blood_group');
            $error['blood_pressure'] = form_error('blood_pressure');
            $error['pulse'] = form_error('pulse');
            $error['respiration'] = form_error('respiration');
            $error['allergy'] = form_error('allergy');
            $error['diet'] = form_error('diet');
            $this->session->set_flashdata('error', $error);
            redirect(base_url().'user/addpatient');
        }
        else
        {
            $data['p_name'] = $this->input->post('name');
            $data['age'] = $this->input->post('age');
            $data['gender'] = $this->input->post('gender');
            $data['phone'] = $this->input->post('phone');
            $data['add'] = $this->input->post('add');
            $data['height'] = $this->input->post('height');
            $data['weight'] = $this->input->post('weight');
            $data['b_group'] = $this->input->post('blood_group');
            $data['b_pressure'] = $this->input->post('blood_pressure');
            $data['pulse'] = $this->input->post('pulse');
            $data['respiration'] = $this->input->post('respiration');
            $data['allergy'] = $this->input->post('allergy');
            $data['diet'] = $this->input->post('diet');

            //print_r($data);
            if($this->user_mo->addpatient($data))
            {
                redirect(base_url('user/patients'));
            }
            else
            {

            }
        }
    }

    public function editpatient()
    {
        $data['patient_id'] = $this->input->post('patient_id');
        $data['p_name'] = $this->input->post('name');
        $data['age'] = $this->input->post('age');
        $data['gender'] = $this->input->post('gender');
        $data['phone'] = $this->input->post('phone');
        $data['add'] = $this->input->post('add');
        $data['height'] = $this->input->post('height');
        $data['weight'] = $this->input->post('weight');
        $data['b_group'] = $this->input->post('blood_group');
        $data['b_pressure'] = $this->input->post('blood_pressure');
        $data['pulse'] = $this->input->post('pulse');
        $data['respiration'] = $this->input->post('respiration');
        $data['allergy'] = $this->input->post('allergy');
        $data['diet'] = $this->input->post('diet');

        if($this->user_mo->editpatient($data))
        {
            redirect(base_url('user/patient_profile/').$data['patient_id']);
        }
        else
        {

        }
    }

    public function deletepatient()
    {
        $id = $this->uri->segment(3);
        if($this->user_mo->deletepatient($id))
        {
            redirect(base_url('user/patients'));
        }
    }

    public function chkappointment()
    {
        $data['patient_id'] = $this->input->post('p_id');
        $data['date'] = $this->input->post('date');
        $data['time'] = $this->input->post('time');

        $res = $this->user_mo->chkappointment($data); 
        if($res ==1)
        {
            echo json_encode(array('status'=>1));
        }
        elseif($res == 2)
        {
            echo json_encode(array('status'=>2));
        }
        else
        {
            echo json_encode(array('status'=>0));
        }
    }

    public function addprescription()
    {
        $this->form_validation->set_rules('patient_id', 'Patient', 'required');
        $this->form_validation->set_rules('symptoms', 'Symptoms', 'required');
        $this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required');
        $this->form_validation->set_rules('medicine_name[]', 'Medicine_name', 'required');
        $this->form_validation->set_rules('medicine_note[]', 'Medicine_note', 'required');
        $this->form_validation->set_rules('test_name[]', 'Test_name', 'required');
        $this->form_validation->set_rules('test_note[]', 'Test_note', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $error['patient_id'] = form_error('patient_id');
            $error['symptoms'] = form_error('symptoms');
            $error['diagnosis'] = form_error('diagnosis');
            $error['medicine_name'] = form_error('medicine_name[]');
            $error['medicine_note'] = form_error('medicine_note[]');
            $error['test_name'] = form_error('test_name[]');
            $error['test_note'] = form_error('test_note[]');
            $this->session->set_flashdata('error', $error);
            redirect(base_url().'user/addprescription');
        }
        else
        {
            $data['patient_id'] = $this->input->post('patient_id');
            $data['symptoms'] = $this->input->post('symptoms');
            $data['diagnosis'] = $this->input->post('diagnosis');
            $data['medicine'] = json_encode($this->input->post('medicine_name[]'));
            $data['m_note'] = json_encode($this->input->post('medicine_note[]'));
            $data['test'] = json_encode($this->input->post('test_name[]'));
            $data['t_note'] = json_encode($this->input->post('test_note[]'));
            $data['date'] = date('Y-m-d');
            
            if($this->user_mo->addprescription($data))
            {
                $res = $this->db->query('select max(prescription_id) as id from prescription')->result_array();
                redirect(base_url('user/print_prescription/').$res[0]['id']);
            }
            else
            {
                
            }
        }
    }

    public function deleteprescription()
    {
        $id = $this->uri->segment(3);
        if($this->user_mo->deleteprescription($id))
        {
            redirect(base_url('user/prescription'));
        }
    }

    public function createinvoice()
    {
        $this->form_validation->set_rules('patient_id', 'Patient', 'required');
        $this->form_validation->set_rules('payment_mode', 'Payment_Mode', 'required');
        $this->form_validation->set_rules('payment_status', 'Payment_Status', 'required');
        $this->form_validation->set_rules('invoice_title[]', 'Invoice_Title', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('invoice_amount[]', 'Invoice_amount', 'required|numeric');
        if ($this->form_validation->run() == FALSE)
        {
            $error['patient_id'] = form_error('patient_id');
            $error['payment_mode'] = form_error('payment_mode');
            $error['payment_status'] = form_error('payment_status');
            $error['invoice_title'] = form_error('invoice_title[]');
            $error['invoice_amount'] = form_error('invoice_amount[]');
            $this->session->set_flashdata('error', $error);
            redirect(base_url().'user/createinvoice');
        }
        else
        {
            $data['patient_id'] = $this->input->post('patient_id');
            $data['payment_mode'] = $this->input->post('payment_mode');
            $data['payment_status'] = $this->input->post('payment_status');
            $data['invoice_title'] = json_encode($this->input->post('invoice_title[]'));
            $data['invoice_amount'] = json_encode($this->input->post('invoice_amount[]'));
            $data['invoice_date'] = date('Y-m-d');
            
            if($this->user_mo->createinvoice($data))
            {
                $res = $this->db->query('select max(invoice_id) as id from invoice')->result_array();
                redirect(base_url('user/print_invoice/').$res[0]['id']);
            }
            else
            {
                
            }
        }
    }

    public function deleteinvoice()
    {
        $id = $this->uri->segment(3);
        if($this->user_mo->deleteinvoice($id))
        {
            redirect(base_url('user/billing'));
        }
    }

    public function updateprofile()
    {
        $user = $this->session->userdata('userinfo');
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['phone'] = $this->input->post('phone');
        $data['user_name'] = $user['username'];

        if($this->user_mo->updateprofile($data))
        {
            redirect(base_url('user/profile'));
        }
    }

    public function updatepassword()
    {
        $user = $this->session->userdata('userinfo');
        $data['cpass'] = base64_encode($this->input->post('cpass'));
        $data['password'] = base64_encode($this->input->post('npass'));
        $data['user_name'] = $user['username'];

        if($this->user_mo->updatepassword($data))
        {
            echo json_encode(array('status'=>1));   
        }
        else
        {
            echo json_encode(array('status'=>2));   
        }
    }

    public function updatelogo()
    {
        $config['upload_path']   = 'assets/images'; 
        $config['allowed_types'] = 'jpg|png|ico'; 
        $config['max_size']      = 100; 
        $config['max_width']     = 1024; 
        $config['max_height']    = 1280;  

        $this->load->library('upload', $config); 
        
        if ( ! $this->upload->do_upload('logo')) // file upload in folder
        {
            $error = array('error' => $this->upload->display_errors()); 
            $this->session->set_flashdata('success', $error);
            redirect(base_url().'user/profile'); // user redirect          
        }
        else { 
            $dataup = array('upload_data' => $this->upload->data()); /// file name 
            $res = $this->user_mo->updatelogo($dataup['upload_data']['file_name']);
            if($res) {
                redirect(base_url().'user/profile');
            }
            else
            {
                redirect(base_url().'user/profile');
            }
        }
    }

    public function appointmentlist()
    {
        $dt = $_GET['date'];
        $res = $this->user_mo->appointmentlist($dt);
        if($res)
        {
            echo json_encode($res);
        }
        else
        {
            echo json_encode(array('status'=>1));
        }
    }

    public function appointmentchart()
    {
        $res = $this->user_mo->appointmentchart();
        if($res)
        {
            echo json_encode($res);
        }
        else
        {
            echo json_encode(array('status'=>1));
        }
    }

    public function invoicechart()
    {
        $res = $this->user_mo->invoicechart();
        if($res)
        {
            echo json_encode($res);
        }
        else
        {
            echo json_encode(array('status'=>1));
        }
    }

  /*  public function recoverpassword()
    {
        $email = $this->input->post('email');
        $user = $this->user_mo->getemail($email);
        if(count($user) == 1)
        {
            $htmlContent = '<h1>Doctorist sent your password to login to System</h1>';
            $htmlContent .= '<p>Your password is : ';
            $htmlContent .= base64_decode($user[0]['password']);
            $htmlContent .= '</p>';
                
            $config =array(
                'protocol'=>'smtp', 
                'smtp_host'=>"smtp.gmail.com",
                'smtp_port'=>465,
                'smtp_user'=>"yourmail@mail.com",
                'smtp_pass'=>"yourpassword",
                'smtp_crypto'=>'ssl',               
                'mailtype'=>'html');

            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->from('yourmail@mail.com');
            $this->email->to($email);
            $this->email->subject('Doctorist - Patient Management System');
            $this->email->message($htmlContent);
            if(!$this->email->send())
            {
                show_error($this->email->print_debugger());
            }
            else
            {
                echo json_encode(array('status'=>1));
            }
        }
        else
        {
            echo json_encode(array('status'=>0));
        }
    }*/
}