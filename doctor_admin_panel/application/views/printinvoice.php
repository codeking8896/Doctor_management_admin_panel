<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header_start.php');
?>

<?php 
    include_once('includes/header_end.php');
    $sys_title = $this->user_mo->get_user();
    $id = $this->uri->segment(3);
    $user = $this->user_mo->getuser();
    $row_data = $this->user_mo->getinvoicebyid($id);
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
                                    <li class="breadcrumb-item active">Print Invoice</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Print Invoice</h4>
                        </div>
                    </div>
                </div><!-- end page title end breadcrumb -->
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
                $title = json_decode($data['invoice_title']);
                $amount = json_decode($data['invoice_amount']);
        ?>
        
        <!-- ==================
                PAGE CONTENT START
            ================== -->
        <div class="page-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="m-b-20">                                
                            <a href="<?php echo base_url('user/billing'); ?>"><button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Back to Invoice List</button></a>                                           
                            <button type="button" class="btn btn-primary waves-effect waves-light" onclick="print_div()"><i class="fa fa-print"></i>&nbsp; Print Invoice</button>
                        </div>
                    </div>
                </div>
                <div class="prescription-print">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-block">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="invoice-title">
                                                <h4 class="pull-right font-16"><strong># <?php echo $data['invoice_id'] ?></strong></h4>
                                                <h3 class="m-t-0">Invoice</h3>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6">
                                                    <h3 class="text-danger">Dr. <?php echo $user['doctor_name'] ?></h3>
                                                    <address>
                                                    <p class="text-muted m-l-5">
                                                        Some address<br>
                                                        Email - <?php echo $user['email'] ?> <br>
                                                        Phone - <?php echo $user['mobile'] ?>
                                                    </p>
                                                    </address>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <h3>To,</h3>
                                                    <h5><?php echo $info['p_name']; ?></h5>
                                                    <p class="text-muted m-l-30"><strong>Address</strong> : <?php echo $info['add']; ?></p>
                                                    <p class="text-muted"><strong>Phone</strong> : <?php echo $info['phone']; ?></p>
                                                    <p class="m-t-20"><b> Date :</b> <i class="fa fa-calendar"></i>&nbsp; <?php echo date('d-m-Y'); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="panel panel-default">
                                                <div class="">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <td><strong>Sr.No</strong></td>
                                                                    <td class="text-center"><strong>Details</strong></td>
                                                                    <td class="text-center"><strong>Amount</strong></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                    <?php
                                                                        $total = 0; 
                                                                        for ( $i=0; $i<count($title); $i++) : 
                                                                    ?>

                                                                <tr>
                                                                    <td><?php echo $i+1; ?></td>
                                                                    <td class="text-center"><?php echo $title[$i]; ?></td>
                                                                    <td class="text-center">
                                                                        <?php 
                                                                            echo $amount[$i];
                                                                            $total += $amount[$i]
                                                                        ?>

                                                                    </td>
                                                                </tr>
                                                                    <?php endfor;?>

                                                                <tr>
                                                                    <td class="no-line"></td>                                                            
                                                                    <td class="no-line text-right">
                                                                        <strong>Total</strong></td>
                                                                    <td class="no-line text-center"><h4 class="m-0"><?php echo $total; ?></h4></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div><!-- end div-print -->
            </div> <!-- end container -->
        </div><!-- end page-content-wrapper -->        
<?php } include_once('includes/footer_start.php'); ?>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/print.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/printThis.js"></script>
<?php include_once('includes/footer_end.php'); ?>