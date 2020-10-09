<?php
    if(!isset($_SESSION['userinfo']))
    {
        redirect(base_url());
    }
    $data = $this->user_mo->get_user();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta content="Doctorist - Patient Management System" name="description" />
        <meta content="Landinghub(themesbrand)" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/<?php echo $data[0]['favicon']; ?>">

        <!-- App title -->
        <title><?php echo $data[0]['title']." - ".$title; ?></title>
