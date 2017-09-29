
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url() ?>template/user/img/favicon.ico">

    <title>Balai Besar Bahan dan Barang Teknik</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>template/user/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->    
    <link href="<?php echo base_url() ?>template/user/css/material-icons.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>template/user/css/dashboard.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>template/user/css/main.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url(); ?>Login/main_page"><img src="<?php echo base_url() ?>template/user/img/logo.png" class="img-fluid" style="max-width: 20%; and height: auto" alt="Responsive image"> Balai Besar Bahan dan Barang Teknik</a>
        <div class="dropdown">
          <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons" style="font-size: 13px">account_circle</i><?php echo " ".$this->session->userdata('username'); ?></button>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?php echo base_url() ?>Login/edit_profile">Edit Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" style="color: red; font-weight: bold" href="<?php echo base_url() ?>Login/logout">Logout</a>
          </div>
        </div>       
      </div>
    </nav>     

<script src="<?php echo base_url() ?>template/user/js/jquery-1.12.4.min.js" type="text/javascript"></script> 
    <script src="<?php echo base_url() ?>template/user/js/popper.min.js" type="text/javascript"></script> 
    <script src="<?php echo base_url() ?>template/user/js/bootstrap.min.js" type="text/javascript"></script>