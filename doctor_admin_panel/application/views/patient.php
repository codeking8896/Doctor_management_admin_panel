<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header_start.php'); 
?>

        <!-- DataTables -->
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php include_once('includes/header_end.php');
    $data = $this->user_mo->get_user();
?>

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo $data[0]['title']; ?></a></li>
                                    <li class="breadcrumb-item active">Patient</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Patient List</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
            </div> <!-- End Container -->
        </div><!-- End Wrapper -->
        <!-- ==================
            PAGE CONTENT START
        ================== -->
            <div class="page-content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="m-b-20">
                                <a href="<?php echo base_url('user/addpatient'); ?>"><button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i>&nbsp; New Patient</button></a>
                            </div>
                        </div>
                    </div><!-- Ends Row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-block">
                                    <table class="table table-bordered datatable-init">
                                        <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Option</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $i = 1;
                                        foreach ( $info as $data ) : ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $data['p_name']; ?></td>
                                                <td><?php echo $data['phone']; ?></td>
                                                <td><?php echo $data['age']; ?></td>
                                                <td><?php echo $data['add']; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('user/patient_profile')."/".$data['patient_id'];?>"><button type="button" class="btn btn-1d btn-sm btn-outline-primary waves-effect waves-light">Manage Patient</button>
                                                    <a href="<?php echo base_url('user_operation/deletepatient')."/".$data['patient_id'];?>"><button type="button" class="btn btn-1d btn-sm btn-outline-primary waves-effect waves-light"><i class="fa fa-trash-o"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php 
                                            $i++;
                                        endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div> <!-- end container -->
            </div>
            <!-- end page-content-wrapper -->

<?php include_once('includes/footer_start.php'); ?>

        <!-- Required datatable js -->
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Buttons examples -->
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/buttons.colVis.min.js"></script>

        <!-- Responsive examples -->
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="<?php echo base_url(); ?>assets/pages/datatables.init.js"></script>
<?php include_once('includes/footer_end.php'); ?>