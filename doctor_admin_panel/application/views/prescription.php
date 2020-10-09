<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    include('includes/header_start.php');
?>

        <!-- DataTables -->
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />   
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url(); ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<?php include('includes/header_end.php');
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
                                    <li class="breadcrumb-item active">Prescription</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Prescription List</h4>
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
                            <a href="<?php echo base_url('user/addprescription'); ?>"><button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i>&nbsp; New Prescription</button></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <table class="table table-bordered datatable-init">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Date</th>
                                            <th>Patient</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php 
                                            $i = 1;
                                            foreach ( $info as $data ) :
                                            ?>

                                       
                                            <?php 
                                                $i++;
                                            endforeach; 
                                            ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
        <!-- end page-content-wrapper -->

<?php include('includes/footer_start.php');?>

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
<?php include('includes/footer_end.php');?>