
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
        <a class="navbar-brand" href="<?php echo base_url(); ?>Main"><img src="<?php echo base_url() ?>template/user/img/logo.png" class="img-fluid" style="max-width: 20%; and height: auto" alt="Responsive image"> Balai Besar Bahan dan Barang Teknik</a>
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
          <a href="<?php echo base_url() ?>Main/panduan" class="btn btn-warning" role="button"><i class="material-icons" style="font-size: 22px">book</i> Panduan</a>

          <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="material-icons" style="font-size: 22px">account_circle</i><?php echo " ".$this->session->userdata('username'); ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
               <table>
                  <tr>
                    <td rowspan="2">
                       <img src="<?php echo base_url() ?>uploads/profile/<?php echo $this->session->id_user;?>.jpg?dummy=8484744" class="rounded" height="50px" width="50px" onerror=this.src="<?php echo base_url() ?>template/user/img/default_profile.jpg" style="margin: 0px 0px 0px 20px;">
                    </td>
                    <td>
                      <a class="dropdown-item" href="<?php echo base_url() ?>User_akun/edit_profile">Edit Profile</a>
                      <a class="dropdown-item" style="color: red;" href="<?php echo base_url() ?>Login/logout">Logout</a>
                    </td>
                  </tr>
                </table>           
            </div>
          </div>
        </div>       
      </div>
    </nav>     

<script src="<?php echo base_url() ?>template/user/js/jquery-1.12.4.min.js" type="text/javascript"></script> 
    <script src="<?php echo base_url() ?>template/user/js/popper.min.js" type="text/javascript"></script> 
    <script src="<?php echo base_url() ?>template/user/js/bootstrap.min.js" type="text/javascript"></script>
    