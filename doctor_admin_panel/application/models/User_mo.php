<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_mo extends CI_Model {

	public function setup($data)
	{
		return $this->db->insert('users',$data);
	}

    public function login_data($user_name,$user_password)
	{
		$res = $this->db->get_where('users',array('user_name'=>$user_name,'password'=>$user_password));
		
		if(count($res->result_array())>=1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getuser()
	{
		$data = $_SESSION['userdata'];
		$res = $this->db->select('*')
						->from('users')
						->where('user_name',$data['username'])
						->get()->result_array();
		return $res[0];
	}

	public function get_user()
	{
		$res = $this->db->select('*')
						->from('users')
						->get()->result_array();
		return $res;
	}

	public function getemail($email)
	{
		$res = $this->db->select('email,password')
						->from('users')
						->where('email',$email)
						->get()->result_array();
		return $res;
	}
	
	public function patient_info()
	{
		$this->db->select('*');
		$this->db->from('patient');
		$data = $this->db->get();
		return $data->result_array();
	}

	public function addpatient($data)
	{
		$this->db->insert('patient',$data);
		return true;
	}

	public function get_patient($id)
	{
		$data = $this->db->query('select * from patient where patient_id = '.$id);
		return $data->result_array();
	}
	
	public function editpatient($data)
	{
		$this->db->set('p_name',$data['p_name']);
		$this->db->set('age',$data['age']);
		$this->db->set('gender',$data['gender']);
		$this->db->set('phone',$data['phone']);
		$this->db->set('add',$data['add']);
		$this->db->set('height',$data['height']);
		$this->db->set('weight',$data['weight']);
		$this->db->set('b_group',$data['b_group']);
		$this->db->set('b_pressure',$data['b_pressure']);
		$this->db->set('pulse',$data['pulse']);
		$this->db->set('respiration',$data['respiration']);
		$this->db->set('allergy',$data['allergy']);
		$this->db->set('diet',$data['diet']);
		$this->db->where('patient_id',$data['patient_id']);
		$this->db->update('patient');
		return true;
	}

	public function updatelogo($data)
	{
		$this->db->set('logo',$data);
		$this->db->update('users');
		return true;
	}

	public function deletepatient($id)
	{
		$this->db->where('patient_id', $id);
		$this->db->delete('patient');
		return true;
	}

	public function chkappointment($data)
	{
		$res = $this->db->query("select patient_id from appointment where patient_id=".$data['patient_id']." and date='".$data['date']."'");
		if(count($res->result_array())==1)
		{
			return 1;
		}
		else
		{
			$res1 = $this->db->query("select patient_id from appointment where time='".$data['time']."' and date='".$data['date']."'");
			if(count($res1->result_array())==1)
			{
				return 2;
			}
			else
			{
				$this->db->insert('appointment',$data);
			}
		}
		
	}

	public function get_appointment($id)
	{
		$data = $this->db->query('select * from appointment where patient_id = '.$id);
		return $data->result_array();
	}

	public function get_prescription($id)
	{
		$data = $this->db->select('*')
					->from('prescription')
					->where('patient_id',$id)
					->get()->result_array();
		return $data;
	}

	public function addprescription($data)
	{
		$this->db->insert('prescription',$data);
		return true;
	}

	public function getprescription()
	{
		$res = $this->db->query('select prescription_id, p_name, DATE_FORMAT(prescription.date, "%M %d,%Y") as date from patient,prescription where patient.patient_id = prescription.patient_id');
		return $res->result_array();
	}

	public function getprescriptionbyid($id)
	{
		$res = $this->db->select('*')
					->from('prescription')
					->where('prescription_id',$id)
					->get()
					->result_array();
		return $res;
	}

	public function getp_name($id)
	{
		$res = $this->db->select('*')
					->from('patient')
					->where('patient_id',$id)
					->get()
					->result_array();
		return $res[0];

	}

	public function deleteprescription($id)
	{
		$this->db->where('prescription_id', $id);
		$this->db->delete('prescription');
		return true;
	}

	public function createinvoice($data)
	{
		$this->db->insert('invoice',$data);
		return true;
	}

	public function getinvoice()
	{
		$res = $this->db->query('select invoice_id, p_name, payment_status, invoice_amount, DATE_FORMAT(invoice.invoice_date, "%M %d,%Y") as date from patient,invoice where patient.patient_id = invoice.patient_id');
		return $res->result_array();
	}

	public function getinvoicebyid($id)
	{
		$res = $this->db->select('*')
					->from('invoice')
					->where('invoice_id',$id)
					->get()
					->result_array();
		return $res;
	}

	public function deleteinvoice($id)
	{
		$this->db->where('invoice_id', $id);
		$this->db->delete('invoice');
		return true;
	}

	public function get_invoice($id)
	{
		$data = $this->db->select('*')
					->from('invoice')
					->where('patient_id',$id)
					->get()->result_array();
		return $data;
	}

	public function updateprofile($data)
	{
		$this->db->set('doctor_name',$data['name']);
		$this->db->set('email',$data['email']);
		$this->db->set('mobile',$data['phone']);
		$this->db->where('user_name',$data['user_name']);
		$this->db->update('users');
		return true;
	}

	public function user_info()
	{
		$res = $this->db->select('*')
			->from('users')
			->get()
			->result_array();
		return $res[0];
	}

	public function updatepassword($data)
	{
		$pwd = $this->db->query("SELECT user_id from users where password ='".$data['cpass']."'");
		if(count($pwd->result_array()) == 1)
		{
			$this->db->query("update users set password='".$data['password']."' where user_name='".$data['user_name']."'");
			return true;
		}
		else
		{
			return false;
		}
	}

	public function total_count()
    {
        $res = $this->db->select('*')
                    ->from('appointment')
                    ->get()->result_array();
        $res1 = $this->db->select('*')
                    ->from('patient')
                    ->get()->result_array();
        $res2 = $this->db->select('*')
					->from('invoice')
					->get()->result_array();
		$res3 = $this->db->select('*')
					->from('invoice')
					->where('payment_status','Paid')
					->get()->result_array();
		$total = 0;
		for($i=0; $i< count($res3); $i++) :
				$amount = json_decode($res3[$i]['invoice_amount']);
				$total += array_sum($amount);
		endfor;
		
        return array('appointment'=>count($res),'patient'=>count($res1),'invoice'=>count($res2),'total'=>$total);
	}
	
	public function appointment_list()
	{
		$res = $this->db->query("SELECT appointment.*, patient.p_name FROM appointment, patient WHERE patient.patient_id = appointment.patient_id AND date = DATE_FORMAT(CURDATE(),'%Y/%m/%d')");
		return $res->result_array();
	}

	public function appointmentlist($date)
	{
		$res = $this->db->select('p_name,appointment.time')
						->from('appointment')
						->join('patient','appointment.patient_id=patient.patient_id')
						->where('date',$date)
						->get();
		return $res->result_array();
	}

	public function appointmentchart()
	{
		$res = $this->db->query("SELECT MONTHNAME(appointment.date) AS month, Month(appointment.date) as num_month, count(*) AS total FROM appointment GROUP BY month ORDER BY num_month ASC");
		return $res->result_array();
	}

	public function invoicechart()
	{
		$res = $this->db->query("select payment_status as status, count(*) as total from invoice group by status");
		return $res->result_array();
	}

	public function patient()
	{
		$data = $this->db->query("select * from patient order by patient_id DESC limit 5");
		return $data->result_array();
	}
}