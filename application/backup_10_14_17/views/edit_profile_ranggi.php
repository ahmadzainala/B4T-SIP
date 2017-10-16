
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <title>Balai Besar Bahan dan Barang Teknik</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->    
    <link href="css/material-icons.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
  </head>


  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="img-fluid" style="max-width: 20%; and height: auto" alt="Responsive image"> Balai Besar Bahan dan Barang Teknik</a>
        <div class="dropdown">
          <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons" style="font-size: 13px">account_circle</i> Username</button>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Edit Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" style="color: red; font-weight: bold" href="#">Logout</a>
          </div>
        </div>       
      </div>
    </nav>      
      </div>
    </nav>

    <div class="container" style="padding-top: 70px">
      <div class="card">
        <h4 class="card-header"><i class="material-icons">person</i> Edit Profile</h4>
        <div class="card-body">
          <form action='response.php' method='POST'>
            <table class="table borderless">
              <tr>
                <td width="15%">Username</td>
                <td ><input class="form-control" type="text" name="username" placeholder="Username" readonly></td>
                <td></td>
                <td width="20%"></td>
              </tr>
              <tr>
                <td width="15%">Divisi</td>
                <td ><input class="form-control" type="text" name="divisi" placeholder="Seksi Informasi" readonly></td>
                <td></td>
                <td width="20%"></td>
              </tr>
              <tr>
                <td width="15%">Jabatan</td>
                <td ><input class="form-control" type="text" name="jabatan" placeholder="Kepala Seksi Informasi" readonly></td>
                <td></td>
                <td width="20%"></td>
              </tr>
              <tr>
                <td>Ganti Nama</td>
                <td><input class="form-control" type="text" name="nama"></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td>Ganti Password</td>
                <td><input class="form-control" type="password" name="ps1" placeholder="Masukan password baru"></td>
                <td><input class="form-control" type="password" name="ps2" placeholder="Masukan password baru lagi"></td>
              </tr>                               
            </table>      
          </form>          
        </div>
        <div class="card-footer">                  
          <center><a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Simpan</a></center>
        </div>
      </div>
      <br>
      <br>
      <br>
      <br>
    </div> <!-- /container -->

    <!-- Modal -->
    <div class="modal fade" style="padding-top: 200px" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Belum Disi Dengan Benar </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    
    <script src="js/jquery-1.12.4.min.js" type="text/javascript"></script> 
    <script src="js/popper.min.js" type="text/javascript"></script> 
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

    <script type="text/javascript">
      // modal
      $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
      })
    </script>


  </body>
</html>
