<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header_start.php'); 
?>
        
        <!-- Select2 -->
        <link href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!--calendar css-->
        <link href="<?php echo base_url(); ?>assets/plugins/fullcalendar/css/fullcalendar.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet">        
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
                                    <li class="breadcrumb-item active">Appointment</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Appointment</h4>
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
                    <div class="col-12">
                        <div class="m-b-20">
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".new_appoinment"><i class="fa fa-plus"></i>&nbsp; New Appoinment</button>
                        </div>
                        <!--  Modal content for the above example -->
                        <div class="modal fade new_appoinment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0" id="myLargeModalLabel">New Appoinment</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <div class="row">
                                                <a href="<?php echo base_url('user/addpatient'); ?>"><button type="button" class="btn btn-primary waves-effect waves-light" style="margin-left:20px;"><i class="fa fa-plus"></i>&nbsp; New Patient</button></a>
                                            </div>
                                            <form class="p-3" method="post">
                                                <div class="form-group row">
                                                    <label for="patient" class="col-form-label text-muted">Patient</label>
                                                    <div class="input-group">
                                                        <select class="select2" id="myselect2" name="patient_id" required="">
                                                            <option value="">Select</option>
                                                                <?php foreach ( $info as $data ) : ?>

                                                            <option value="<?php echo $data['patient_id']; ?>"><?php echo $data['p_name']; ?></option>

                                                                <?php endforeach; ?>

                                                        </select>
                                                    </div>  
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date" class="col-form-label text-muted">Date</label>   
                                                    <div class="input-group">
                                                        <input type="text" class="form-control dt" name="date" value="<?php echo date('Y-m-d'); ?>" id="datepicker-autoclose">
                                                        <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar"></i></span>
                                                    </div><!-- input-group -->
                                                </div>
                                                <div class="form-group row">
                                                    <label for="time" class="col-form-label text-muted">Time</label>   
                                                    <div class="input-group bootstrap-timepicker timepicker">
                                                        <input id="timepicker1" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <blockquote><lable class="status">No Schedule On This Day</lable></blockquote>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <button type="button" id="btn_create" class="btn btn-primary waves-effect waves-light">Create Appoinment</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </div>                    
                </div>

                <div class="row">
                    <div class="col-md-7">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <div id='calendar'></div>
                                <div style='clear:both'></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card m-b-20">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12 m-b-20">
                                        <h5>Appointment List | <lable id="selected_date"><?php echo date('d M, Y'); ?></lable></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" id="appointment_list">
                                        <?php if($ap_list){ ?>

                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Patient</th>
                                                <th>Schedule</th>
                                            </tr>
                                                <?php 
                                                    $i = 1;
                                                    foreach($ap_list as $list) :
                                                ?>

                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $list['p_name'] ?></td>
                                                <td><?php echo $list['time'] ?></td>
                                            </tr>
                                                <?php
                                                    $i++;
                                                    endforeach;
                                                ?>

                                        </table>
                                        <?php }else{ echo '<h6>No Appointments Found On '.date('d M, Y').'</h6>';} ?>

                                    </div>
                                    <div class="col-md-12" id="new_list" style="display : none"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div><!-- container -->
        </div> <!-- Page content Wrapper -->
        
<?php include_once('includes/footer_start.php'); ?>

        <!-- Jquery-Ui -->
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/fullcalendar/js/fullcalendar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
        
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>

        <!-- Plugins Init js -->
        <script src="<?php echo base_url(); ?>assets/pages/calendar-init.js"></script>
        <script src="<?php echo base_url(); ?>assets/pages/form-advanced.js"></script>

        <!-- Page Specific js -->
        <script src="<?php echo base_url(); ?>assets/pages/appointment.js"></script>
<?php include_once('includes/footer_end.php'); ?>