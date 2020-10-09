<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header_start.php'); 
?>

        <!-- Select2 -->
        <link href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<?php include_once('includes/header_end.php');
    $data = $this->user_mo->get_user();
    $error = $this->session->flashdata('error');
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
                                    <li class="breadcrumb-item active">Create Invoice</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Create New Invoice</h4>
                        </div>
                    </div>
                </div><!-- end page title end breadcrumb -->
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
                        <a href="<?php echo base_url('user/billing'); ?>"><button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Back to Invoice List</button></a>
                        </div>
                    </div>
                </div><!-- Ends Row -->        
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <form name="createinvoice" id="createinvoice" method="post" action="<?php echo base_url('user_operation/createinvoice'); ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="patient" class="col-form-label text-muted">Patient</label>
                                                        <div class="input-group">
                                                            <select class="select" id="myselect2" name="patient_id" required="">
                                                                <option value="">Select</option>
                                                                    <?php foreach ( $info as $data ) : ?>

                                                                <option value="<?php echo $data['patient_id']; ?>"><?php echo $data['p_name']; ?></option>
                                                                    <?php endforeach; ?>

                                                            </select>
                                                        </div>
                                                        <?php if($error['patient_id']){?> <span class="text-danger"><?php echo $error['patient_id']; ?></span> <?php } ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="payment_mode" class="col-form-label text-muted">Payment Mode</label>
                                                        <div class="input-group">
                                                            <select class="form-control" id="payment_mode" name="payment_mode" required="">
                                                                <option value="Cash">Cash</option>
                                                                <option value="Cheque">Cheque</option>
                                                            </select>
                                                        </div>
                                                        <?php if($error['payment_mode']){?> <span class="text-danger"><?php echo $error['payment_mode']; ?></span> <?php } ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="payment_status" class="col-form-label text-muted">Payment Status</label>
                                                        <div class="input-group">
                                                            <select class="form-control" id="payment_status" name="payment_status" required="">
                                                                <option value="Paid">Paid</option>
                                                                <option value="Unpaid">Unpaid</option>
                                                            </select>
                                                        </div>
                                                        <?php if($error['payment_status']){?> <span class="text-danger"><?php echo $error['payment_status']; ?></span> <?php } ?>

                                                    </div>
                                                </div>                                    
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit" name="create_invoice"> Create Invoice</button>
                                                </div>                                
                                            </div>                                        
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">                                            
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label for="invoice_detail" class="col-form-label text-muted">Invoice Details</label>
                                                        <div id="invoice_entry">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        <input type="text" class="form-control" placeholder="Invoice Title" name="invoice_title[]" required="">
                                                                        <?php if($error['invoice_title']){?> <span class="text-danger"><?php echo $error['invoice_title']; ?></span> <?php } ?>

                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon" id="basic-addon1">$</span>
                                                                            <input type="text" class="form-control" placeholder="Amount" name="invoice_amount[]" pattern="[0-9]{1,}" title="Enter Numeric values only" required="">
                                                                        </div>
                                                                        <?php if($error['invoice_amount']){?> <span class="text-danger"><?php echo $error['invoice_amount']; ?></span> <?php } ?>

                                                                    </div>
                                                                    <div class="col-md-2">                                                                    
                                                                        <button type="button" class="fcbtn btn btn-outline waves-effect waves-light btn-danger btn-1d btn-sm" data-toggle="tooltip" data-placement="right" title="Remove" onclick="delele_parent_element(this)"><i class="fa fa-times"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="append_holder_for_invoice_entries"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="append_blank_entry()"><i class="fa fa-plus"></i> &nbsp; Add More</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- end Card-block -->
                        </div>
                    </div>
                </div><!-- End Row -->
            </div> <!-- end container -->
        </div><!-- end page-content-wrapper -->        

<?php include_once('includes/footer_start.php'); ?>

        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>

        <script type="text/javascript">

            var blank_invoice_entry = '';
            var number_of_invoice = 1;

            $(document).ready(function() {
                $('.select').select2();

                blank_invoice_entry = $('#invoice_entry').html();
                console.log(number_of_invoice);
            });

            function append_blank_entry() {

                number_of_invoice = number_of_invoice + 1;
                $('#append_holder_for_invoice_entries').append(blank_invoice_entry);
                console.log(number_of_invoice);
                
            }

            function delele_parent_element(n) {
                
                if (number_of_invoice > 1) {
                    n.parentNode.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode.parentNode);
                }
                if (number_of_invoice != 1) {
                    number_of_invoice = number_of_invoice - 1;
                }
                console.log(number_of_medicine);
                
            }
        </script>
<?php include_once('includes/footer_end.php'); ?>