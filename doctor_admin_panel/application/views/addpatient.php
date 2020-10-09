<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    include_once('includes/header_start.php'); 
?>

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
                                <li class="breadcrumb-item active">Add New Patient</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add New Patient</h4>
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
                        <a href="<?php echo base_url('user/patients'); ?>"><button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-arrow-left"></i>&nbsp; Back to Patient List</button></a>
                    </div>
                </div>
            </div><!-- Ends Row -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-block">
                            <blockquote>Basic Information</blockquote>
                            <form name="addpatient" id="addpatient" method="post" action="<?php echo base_url('user_operation/addpatient'); ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Enter patient name" pattern="[A-Za-z. ]{1,}" title="Enter Proper Name(Alphabets only)" required="">
                                            <?php if($error['name']){?> <span class="text-danger"><?php echo $error['name']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input type="text" class="form-control" placeholder="Enter patient's age" name="age" pattern="[0-9]{1,3}" title="Enter Numeric values only(3 digit only)" required="">
                                            <?php if($error['age']){?> <span class="text-danger"><?php echo $error['age']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender" required="">
                                                <option value="">--Select Gender--</option>
                                                <option  value="1">Male</option>
                                                <option  value="2">Female</option>
                                            </select>
                                            <?php if($error['gender']){?> <span class="text-danger"><?php echo $error['gender']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="phone" placeholder="+1-234-567-7890" pattern="[\+0-9\-]{5,20}" title="Enter Numeric values only(Min 5 Numers)" required="" maxlength="20">
                                            <?php if($error['phone']){?> <span class="text-danger"><?php echo $error['phone']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea name="add" rows="3" class="form-control" placeholder="Enter current address" required=""></textarea>
                                            <?php if($error['add']){?> <span class="text-danger"><?php echo $error['add']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <blockquote>Medical Information</blockquote>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Height</label>
                                            <input type="text" class="form-control" name="height" placeholder="Enter height" pattern="[0-9\']{1,3}" title="Enter Numeric values only(3 digit only)" required="">
                                            <?php if($error['height']){?> <span class="text-danger"><?php echo $error['height']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Weight</label>
                                            <input type="text" class="form-control" name="weight" placeholder="Enter weight" pattern="[0-9]{1,3}" title="Enter Numeric values only(3 digit only)" required="">
                                            <?php if($error['weight']){?> <span class="text-danger"><?php echo $error['weight']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Blood Group</label>
                                            <select class="form-control" name="blood_group" required="">
                                                <option value="">-- Select Blood Group --</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                            </select>
                                            <?php if($error['blood_group']){?> <span class="text-danger"><?php echo $error['blood_group']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Blood Pressure</label>
                                            <input type="text" class="form-control" name="blood_pressure" placeholder="Enter blood pressure" pattern="[0-9]{1,4}" title="Enter Numeric values only(4 digit only)" required="">
                                            <?php if($error['blood_pressure']){?> <span class="text-danger"><?php echo $error['blood_pressure']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pulse</label>
                                            <input type="text" class="form-control" name="pulse" placeholder="Enter pulse" pattern="[0-9]{1,4}" title="Enter Numeric values only(4 digit only)" required="">
                                            <?php if($error['pulse']){?> <span class="text-danger"><?php echo $error['pulse']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Respiration</label>
                                            <input type="text" class="form-control" name="respiration" placeholder="Enter respiration" pattern="[0-9]{1,4}" title="Enter Numeric values only(4 digit only)" required="">
                                            <?php if($error['respiration']){?> <span class="text-danger"><?php echo $error['respiration']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Allergy</label>
                                            <input type="text" class="form-control" name="allergy" placeholder="Enter allergy symptoms"  required="">
                                            <?php if($error['allergy']){?> <span class="text-danger"><?php echo $error['allergy']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Diet</label>
                                            <input type="text" class="form-control" name="diet" placeholder="Enter diet" required="">
                                            <?php if($error['diet']){?> <span class="text-danger"><?php echo $error['diet']; ?></span> <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Add New Patient</button>
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

<?php include_once('includes/footer_end.php'); ?>