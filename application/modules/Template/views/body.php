<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SHIELD - Free Bootstrap 3 Theme">
    <meta name="author" content="Carlos Alvarez - Alvarez.is - blacktie.co">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title> Adasoft Test </title>
    <!-- 
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"> -->



    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/modules/common/assets/css/globalcss/bootstrap.min.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>application/modules/common/assets/js/global/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>application/modules/common/assets/js/global/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/common/assets/css/globalcss/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/common/assets/css/globalcss/jquery-ui.css">

    <script src="<?php echo base_url(); ?>application/modules/common/assets/js/global/jquery-ui.js"></script>

    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"> 



    <link rel="stylesheet" href="<?php echo base_url(); ?>application/modules/common/assets/css/localcss/Ada.TepBody.css">


</head>

<body data-spy="scroll" data-offset="0" data-target="#navbar-main">
    <div class="xCNContainer">
        <?php
        $this->load->view('header');
        ?>
        <div class="xCNBody_wrap">
            <?php $this->session->userdata("lang"); ?>
            <?php echo $body; ?>
        </div>
        <?php
        $this->load->view('footer');
        ?>
    </div>

</body>

</html>