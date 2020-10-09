<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header_start.php'); 
?>

        <style>
            .user-bg {
                margin: -20px;
                height: 230px;
                overflow: hidden;
                position: relative;
            }
            .overlay-box{
                background: #66a8e5;
                opacity: .9;
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 100%;
                text-align: center;
                padding: 110px;
            }
            .user-content { 
                margin-top: -65px;
            }
            .user-btm-box {
                padding: 40px 0 10px;
                clear: both;
                overflow: hidden;
            }
            .basic-list{
                padding:0;
            }
            .basic-list li {
                display: block;
                padding: 15px 0;
                border-bottom: 1px solid rgba(120, 130, 140, .13);
                line-height: 27px;
            }
        </style>
<?php include_once('includes/header_end.php');
    $sys_title = $this->user_mo->get_user();
    $id = $this->uri->segment(3);
    //echo $id;
    $data = $this->user_mo->get_patient($id);
    $appointment = $this->user_mo->get_appointment($id);
    $prescription = $this->user_mo->get_prescription($id);
    $invoice = $this->user_mo->get_invoice($id);
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
                                    <li class="breadcrumb-item active">Patient Profile</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Patient Profile</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
            </div> <!-- End Container -->
        </div><!-- End Wrapper -->
        <?php
            if(!$data)
            {
                echo "<center><h3>No Such Record Found!!</h3></center>";
            }
            else{
        ?>

        <!-- ==================
                PAGE CONTENT START
            ================== -->
        <div class="page-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="m-b-20">
                        <a href="<?php echo base_url('user/patients'); ?>"><button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Back to Patient List</button></a>
                        </div>
                    </div>
                </div><!-- Ends Row -->
                <div class="row">
                    <div class="col-4">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <div class="user-bg">
                                    <div class="overlay-box">
                                        <div class="user-content">
                                            <img class="thumb-lg img-circle" src="<?php echo base_url(); ?>assets/images/users/male_avatar.png">
                                            <h5 class="text-white"><?php echo $data[0]['p_name'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-btm-box">
                                    <ul class="basic-list">
                                        <li>
                                            <b class="title">Name:</b> &nbsp;&nbsp;&nbsp;
                                            <span class="text"><?php echo $data[0]['p_name'] ?></span>
                                        </li>
                                        <li>
                                            <b class="title">Age:</b> &nbsp;&nbsp;&nbsp;
                                            <span class="text"><?php echo $data[0]['age'] ?></span>
                                        </li>
                                        <li>
                                            <b class="title">Gender:</b> &nbsp;&nbsp;&nbsp;
                                            <span class="text"><?php if($data[0]['gender'] == 1){echo "Male";}else{echo "Female";} ?></span>
                                        </li>
                                        <li>
                                            <b class="title">Phone:</b> &nbsp;&nbsp;&nbsp;
                                            <span class="text"><?php echo $data[0]['phone'] ?></span>
                                        </li>
                                        <li>
                                            <b class="title">Address:</b> &nbsp;&nbsp;&nbsp;
                                            <span class="text"><?php echo $data[0]['add'] ?></span>
                                        </li>
                                    </ul>
                                    <a href="<?php echo base_url('user/editpatient')."/".$id;?>"><button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-pencil"></i>&nbsp; Edit</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#medical" role="tab" aria-expanded="false">Medical Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#appointment" role="tab" aria-expanded="false">Appointment List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#prescription" role="tab" aria-expanded="false">Prescription List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#billing" role="tab" aria-expanded="true">Billing</a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane p-3 active" id="medical" role="tabpanel" aria-expanded="false">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>Height</td>
                                                    <td><?php echo $data[0]['height'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Weight</td>
                                                    <td><?php echo $data[0]['weight'] ?> kg</td>
                                                </tr>
                                                <tr>
                                                    <td>Blood Group</td>
                                                    <td><?php echo $data[0]['b_group'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Blood Pressure</td>
                                                    <td><?php echo $data[0]['b_pressure'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Pulse</td>
                                                    <td><?php echo $data[0]['pulse'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Respiration</td>
                                                    <td><?php echo $data[0]['respiration'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Allergy</td>
                                                    <td><?php echo $data[0]['allergy'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Diet</td>
                                                    <td><?php echo $data[0]['diet'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane p-3" id="appointment" role="tabpanel" aria-expanded="false">
                                        <table class="table table-bordered datatable-init">
                                            <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Date</th>
                                                <th>Schedule</th>
                                                <th>Visited</th>                                            
                                                <th>Option</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                    <?php
                                                        $i = 1;
                                                        foreach ( $appointment as $info ) : ?>

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $info['date']; ?></td>
                                                    <td><?php echo $info['time']; ?></td>
                                                    <td><button type="button" class="btn btn-1d btn-sm btn-outline-primary waves-effect waves-light">Visited</button></td>
                                                    <td><a href="#"><button type="button" class="btn btn-1d btn-sm btn-outline-primary waves-effect waves-light">View Prescription</button></td>
                                                </tr>
                                                    <?php
                                                        $i++;
                                                        endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane p-3" id="prescription" role="tabpanel" aria-expanded="false">
                                        <table class="table table-bordered  datatable-init">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No.</th>
                                                    <th>Date</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php 
                                                        $i = 1;
                                                    foreach ($prescription as $preinfo) : ?>

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo date('d/m/Y',strtotime($preinfo['date'])); ?></td>
                                                    <td><a href="<?php echo base_url('user/print_prescription')."/".$preinfo['prescription_id'];?>"><button type="button" class="btn btn-1d btn-sm btn-outline-primary waves-effect waves-light">Print Prescription</button></td>
                                                </tr>
                                                        <?php 
                                                            $i++;
                                                        endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane p-3" id="billing" role="tabpanel" aria-expanded="true">
                                        <table class="table table-bordered  datatable-init">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No.</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php 
                                                        $i = 1;
                                                        foreach ($invoice as $invoiceinfo) : 
                                                    ?>

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo date('d/m/Y',strtotime($invoiceinfo['invoice_date'])); ?></td>
                                                    <td>
                                                        <?php
                                                            $amount = json_decode($invoiceinfo['invoice_amount']); 
                                                            echo array_sum($amount);
                                                        ?>

                                                    </td>
                                                    <td><?php echo $invoiceinfo['payment_status']; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('user/print_invoice')."/".
                                                        $invoiceinfo['invoice_id'];?>"><button type="button" class="btn btn-1d btn-sm btn-outline-primary waves-effect waves-light">Print Invoice</button></a>
                                                    </td>
                                                </tr>
                                                    <?php 
                                                        $i++;
                                                        endforeach; 
                                                    ?>
                                                    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- Ends Card-Block-->
                        </div>
                    </div>
                </div><!-- Ends Row -->
            </div> <!-- end container -->
        </div><!-- end page-content-wrapper -->       
<?php } include_once('includes/footer_start.php'); ?>

<?php include_once('includes/footer_end.php'); ?>