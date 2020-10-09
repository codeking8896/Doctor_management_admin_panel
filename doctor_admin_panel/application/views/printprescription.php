<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header_start.php'); 
?>

<?php include_once('includes/header_end.php');
        $sys_title = $this->user_mo->get_user();
        $id = $this->uri->segment(3);
        $user = $this->user_mo->getuser();
        $row_data = $this->user_mo->getprescriptionbyid($id);
?>

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo $sys_title[0]['title']; ?></a></li>
                                    <li class="breadcrumb-item active">Print Prescription</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Print Prescription</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
            </div> <!-- End Container -->
        </div><!-- End Wrapper -->
        <?php
            if(!$row_data)
            {
                echo "<center><h3>No Such Record Found!!</h3></center>";
            }
            else{
                $data = $row_data[0];
                $info = $this->user_mo->getp_name($data['patient_id']);
                $medicine = json_decode($data['medicine']);
                $m_note = json_decode($data['m_note']);
                $test = json_decode($data['test']);
                $t_note = json_decode($data['t_note']);
        ?>

        <!-- ==================
            PAGE CONTENT START
        ================== -->
        <div class="page-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="m-b-20">                                
                            <a href="<?php echo base_url('user/prescription'); ?>"><button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Back to Prescription List</button></a>                                           
                            <button type="button" class="btn btn-primary waves-effect waves-light" onclick="print_div()"><i class="fa fa-print"></i>&nbsp; Print Prescription</button>
                        </div>
                    </div>
                </div>
                <div class="prescription-print">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-block">
                                    <h4>Prescription</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pull-left">
                                                <address>
                                                    <h3><b class="text-danger">Dr. <?php echo $user['doctor_name'] ?></b></h3>
                                                    <p class="text-muted m-l-5">
                                                        Some address<br>
                                                        Email - <?php echo $user['email'] ?> <br>
                                                        Phone - <?php echo $user['mobile'] ?>

                                                    </p>
                                                </address>
                                            </div>
                                            <div class="pull-right text-right">
                                                <address>
                                                    <h4>To,</h4>
                                                    <h5><?php echo $info['p_name']; ?></h5>
                                                    <p class="text-muted m-l-30"><strong>Phone</strong> : <?php echo $info['phone']; ?></p>
                                                    <p class="m-t-30"><b> Date :</b> <i class="fa fa-calendar"></i>&nbsp; <?php echo date('d-m-Y') ?></p>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Symptoms</h5>
                                            <p><?php echo $data['symptoms'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Diagnosis</h5>
                                            <p><?php echo $data['diagnosis'] ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Tests</h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr.No</th>
                                                            <th>Name</th>
                                                            <th>Notes</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php for ( $i=0; $i<count($test); $i++) : ?>

                                                        <tr>
                                                            <td><?php echo $i+1; ?></td>
                                                            <td><?php echo $test[$i]; ?></td>
                                                            <td><?php echo $t_note[$i]; ?></td>
                                                        </tr>
                                                            <?php endfor; ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Medicines</h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Sr.No</th>
                                                            <th>Name</th>
                                                            <th>Notes</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php for ( $i=0; $i<count($medicine); $i++) : ?>

                                                        <tr>
                                                            <td><?php echo $i+1; ?></td>
                                                            <td><?php echo $medicine[$i]; ?></td>
                                                            <td><?php echo $m_note[$i]; ?></td>
                                                        </tr>
                                                            <?php endfor; ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end prescription-print -->
            </div> <!-- end container -->
        </div><!-- end page-content-wrapper -->
        
    <?php } include_once('includes/footer_start.php'); ?>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/print.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/printThis.js"></script>
    <?php include_once('includes/footer_end.php'); ?>