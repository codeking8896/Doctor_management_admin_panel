<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header_start.php') 
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
                                    <li class="breadcrumb-item active">Add New Prescription</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Add New Prescription</h4>
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
                            <a href="<?php echo base_url('user/prescription'); ?>"><button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Back to Prescription List</button></a>
                        </div>
                    </div>
                </div><!-- Ends Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <form name="addprescription" id="addprescription" method="post" action="<?php echo base_url('user_operation/addprescription'); ?>">
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
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="symptoms" class="col-form-label text-muted">Symptoms</label>
                                                        <div class="input-group">
                                                            <textarea class="form-control" name="symptoms" id="symptoms" placeholder="Add Symptoms" rows="3" required=""></textarea>
                                                        </div>
                                                        <?php if($error['symptoms']){?> <span class="text-danger"><?php echo $error['symptoms']; ?></span> <?php } ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="diagnosis" class="col-form-label text-muted">Diagnosis</label>
                                                        <div class="input-group">
                                                            <textarea class="form-control" name="diagnosis" id="diagnosis" placeholder="Add Diagnosis" rows="3" required=""></textarea>                                                        
                                                        </div>
                                                        <?php if($error['diagnosis']){?> <span class="text-danger"><?php echo $error['diagnosis']; ?></span> <?php } ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit" name="save_prescription"><i class="fa fa-save"></i> &nbsp; Save Prescription</button>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">                                            
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="medicine" class="col-form-label text-muted">Medicine</label>
                                                        <div id="medicine_entry">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        <input type="text" class="form-control" placeholder="Medicine Name" name="medicine_name[]" required="">
                                                                        <?php if($error['medicine_name']){?> <span class="text-danger"><?php echo $error['medicine_name']; ?></span> <?php } ?>

                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <input type="text" class="form-control" placeholder="Notes" name="medicine_note[]" required="">
                                                                        <?php if($error['medicine_note']){?> <span class="text-danger"><?php echo $error['medicine_note']; ?></span> <?php } ?>

                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <button type="button" class="fcbtn btn btn-outline btn-danger btn-1d btn-sm" data-toggle="tooltip" data-placement="right" title="Remove" onclick="delele_parent_element(this, 'medicine')"><i class="fa fa-times"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="append_holder_for_medicine_entries"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="append_blank_entry('medicine')"><i class="fa fa-plus"></i> &nbsp; Add Medicine</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                            
                                            </div>
                                            <div class="row">                                            
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="test" class="col-form-label text-muted">Test</label>
                                                        <div id="test_entry">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        <input type="text" class="form-control" placeholder="Test Name" name="test_name[]" required="">
                                                                        <?php if($error['test_name']){?> <span class="text-danger"><?php echo $error['test_name']; ?></span> <?php } ?>

                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <input type="text" class="form-control" placeholder="Notes" name="test_note[]" required="">
                                                                        <?php if($error['test_note']){?> <span class="text-danger"><?php echo $error['test_note']; ?></span> <?php } ?>
                                                                        
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <button type="button" class="btn-sm fcbtn btn btn-outline btn-danger btn-1d" data-toggle="tooltip" data-placement="right" title="Remove" onclick="delele_parent_element(this, 'test')"><i class="fa fa-times"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="append_holder_for_test_entries"></div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="append_blank_entry('test')"><i class="fa fa-plus"></i> &nbsp; Add Test</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- Ends Row -->
            </div><!-- Ends container -->
        </div><!-- Ends page-content-wrapper -->

<?php include_once('includes/footer_start.php'); ?>

        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            
            var blank_medicine_entry = '';
            var blank_test_entry = '';
            var number_of_medicine = 1;
            var number_of_test = 1;

            $(document).ready(function() {

                $('.select').select2();

                blank_medicine_entry = $('#medicine_entry').html();
                blank_test_entry = $('#test_entry').html();
                console.log(number_of_medicine);
                console.log(number_of_test);

            });

            function append_blank_entry(selector) {
                if (selector == 'medicine') {
                number_of_medicine = number_of_medicine + 1;
                $('#append_holder_for_medicine_entries').append(blank_medicine_entry);
                console.log(number_of_medicine);
                } else {
                number_of_test = number_of_test + 1;
                $('#append_holder_for_test_entries').append(blank_test_entry);
                console.log(number_of_test);
                }
            }

            function delele_parent_element(n, selector) {
                if (selector == 'medicine') {
                if (number_of_medicine > 1) {
                    n.parentNode.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode.parentNode);
                }
                if (number_of_medicine != 1) {
                    number_of_medicine = number_of_medicine - 1;
                }
                console.log(number_of_medicine);
                } else {
                if (number_of_test > 1) {
                    n.parentNode.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode.parentNode);
                }
                if (number_of_test != 1) {
                    number_of_test = number_of_test - 1;
                }
                console.log(number_of_test);
                }
            }

        </script>

<?php include_once('includes/footer_end.php'); ?>