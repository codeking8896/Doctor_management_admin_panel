<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header_start.php');
    $data = $this->user_mo->get_user();
?>       
        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/morris/morris.css">

<?php include_once('includes/header_end.php'); ?>

        <div class="wrapper">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo $data[0]['title']; ?></a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <!-- ==================
             PAGE CONTENT START
             ================== -->

        <div class="page-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="mini-stat clearfix bg-white">
                            <span class="mini-stat-icon bg-purple mr-0 float-right"><i class="mdi mdi-calendar-clock"></i></span>
                            <div class="mini-stat-info">
                                <span class="counter text-purple"><?php echo $total['appointment']; ?></span>
                                Total Appointment
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mini-stat clearfix bg-white">
                            <span class="mini-stat-icon bg-blue-grey mr-0 float-right"><i class="mdi mdi-account-multiple"></i></span>
                            <div class="mini-stat-info">
                                <span class="counter text-blue-grey"><?php echo $total['patient']; ?></span>
                                Total Patients
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mini-stat clearfix bg-white">
                            <span class="mini-stat-icon bg-brown mr-0 float-right"><i class="mdi mdi-script"></i></span>
                            <div class="mini-stat-info">
                                <span class="counter text-brown"><?php echo $total['invoice']; ?></span>
                                Total Invoice
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mini-stat clearfix bg-white">
                            <span class="mini-stat-icon bg-teal mr-0 float-right"><i class="mdi mdi-currency-usd"></i></span>
                            <div class="mini-stat-info">
                                <span class="counter text-teal"><?php echo '$ '.$total['total']; ?></span>
                                Total Income
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-lg-8">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <h4 class="mt-0 header-title">Monthly Appointment</h4>
                                <div id="morris-bar-chart" style="height: 400px"></div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-lg-4">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <h4 class="mt-0 header-title">Invoice Analytics</h4>
                                <div id="morris-donut-chart" style="height: 400px"></div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <h4 class="mt-0 m-b-30 header-title">Latest Patient</h4>
                                <div class="table-responsive">
                                    <table class="table table-vertical">
                                        <thead>
                                            <tr>
                                            <th>Sr.No.</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Option</th>
                                            </tr>
                                        <thead>
                                        <tbody>
                                            <?php 
                                                $i = 1;
                                                foreach ( $info as $data ) : 
                                            ?>

                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $data['p_name']; ?></td>
                                                <td><?php echo $data['phone']; ?></td>
                                                <td><?php echo $data['age']; ?></td>
                                                <td><?php echo $data['add']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('user/patient_profile')."/".$data['patient_id'];?>"><button type="button" class="btn btn-1d btn-sm btn-outline-primary waves-effect waves-light">Manage Patient</button>
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
                        </div>
                    </div>
                </div>
            </div><!-- container -->
        </div> <!-- Page content Wrapper -->
		
<?php include_once('includes/footer_start.php'); ?>
    
        <!--Morris Chart-->
        <script src="<?php echo base_url(); ?>/assets/plugins/morris/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/plugins/raphael/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/pages/morris.init.js"></script>
        
<?php include_once('includes/footer_end.php'); ?>