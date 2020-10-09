<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_table extends CI_Migration {

        public function up()
        {
                /***** Appointment Table *****/
                $this->dbforge->add_field(array(
                        'appointment_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'auto_increment' => TRUE
                        ),
                        'patient_id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                        ),
                        'date' => array(
                                'type' => 'DATE',
                                'null' => TRUE,
                        ),
                        'time' => array(
                            'type' => 'VARCHAR',
                            'constraint' => 20,
                        ),
                ));
                $this->dbforge->add_key('appointment_id', TRUE);
                $this->dbforge->create_table('appointment');

                /***** Invoice Table *****/
                $this->dbforge->add_field(array(
                    'invoice_id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                            'auto_increment' => TRUE
                    ),
                    'patient_id' => array(
                            'type' => 'INT',
                            'constraint' => 11,
                    ),
                    'payment_mode' => array(
                            'type' => 'VARCHAR',
                            'constraint' => 10,
                    ),
                    'payment_status' => array(
                            'type' => 'VARCHAR',
                            'constraint' => 10,
                    ),
                    'invoice_title' => array(
                            'type' => 'VARCHAR',
                            'constraint' => 100,
                    ),
                    'invoice_amount' => array(
                            'type' => 'VARCHAR',
                            'constraint' => 100,
                    ),
                    'invoice_date' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 100,
                    ),
            ));
            $this->dbforge->add_key('invoice_id', TRUE);
            $this->dbforge->create_table('invoice');

            /***** Patient Table *****/
            $this->dbforge->add_field(array(
                'patient_id' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'auto_increment' => TRUE
                ),
                'p_name' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 50,
                ),
                'age' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                ),
                'gender' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                ),
                'phone' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 15,
                ),
                'add' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 50,
                ),
                'height' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 5,
                ),
                'weight' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                ),
                'b_group' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 10,
                ),
                'b_pressure' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                ),
                'pulse' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                ),
                'respiration' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                ),
                'allergy' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 50,
                ),
                'diet' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 10,
                ),
            ));
            $this->dbforge->add_key('patient_id', TRUE);
            $this->dbforge->create_table('patient');

            /***** Prescription Table *****/
            $this->dbforge->add_field(array(
                'prescription_id' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'auto_increment' => TRUE
                ),
                'patient_id' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                ),
                'symptoms' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 100,
                ),
                'diagnosis' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 100,
                ),
                'medicine' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 100,
                ),
                'm_note' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                ),
                'test' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 100,
                ),
                't_note' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 100,
                ),
                'date' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 100,
                ),
            ));
            $this->dbforge->add_key('prescription_id', TRUE);
            $this->dbforge->create_table('prescription'); 
            
            /***** Users Table *****/
            $this->dbforge->add_field(array(
                'user_id' => array(
                        'type' => 'INT',
                        'constraint' => 11,
                        'auto_increment' => TRUE
                ),
                'user_name' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 50,
                ),
                'doctor_name' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 50,
                ),
                'email' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 50,
                ),
                'mobile' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 15,
                ),
                'password' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 50,
                ),
                'logo' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 50,
                ),
                'favicon' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 50,
                ),
                'title' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 50,
                ),
            ));
            $this->dbforge->add_key('user_id', TRUE);
            $this->dbforge->create_table('users');
        }

        public function down()
        {
                $this->dbforge->drop_table('appointment');
                $this->dbforge->drop_table('invoice');
                $this->dbforge->drop_table('pateint');
                $this->dbforge->drop_table('prescription');
                $this->dbforge->drop_table('users');
        }
}