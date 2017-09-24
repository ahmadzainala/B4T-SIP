
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
      <div class="row">

        <main class="ml-sm-auto col-md-12" role="main">
          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder" style="padding-top: 70px">
              <h1><i class="material-icons" style="font-size: 28px">timelapse</i> 11</h1>
              <h4>Menunggu Disetujui</h4>
            </div>
            <div class="col-6 col-sm-3 placeholder" style="padding-top: 70px">
              <h1><i class="material-icons" style="font-size: 28px">shopping_cart</i> 12</h1>
              <h4>Proses Pengadaan</h4>
            </div>
            <div class="col-6 col-sm-3 placeholder" style="padding-top: 70px">
              <h1><i class="material-icons" style="font-size: 28px">speaker_notes_off</i> 10</h1>
              <h4>Tidak Disetujui</h4>
            </div>
            <div class="col-6 col-sm-3 placeholder" style="padding-top: 70px">
              <h1><i class="material-icons" style="font-size: 28px">assignment_turned_in</i> 10</h1>
              <h4>Selesai Pengadaan</h4>
            </div>
          </section>

          <div class="table-responsive" style="padding-top: 20px">
            <table class="table">
              <thead>
                <tr>
                  <th>
                    <form action="<?php echo base_url(); ?>/Login/add_form" method="POST">
                      <button class="btn btn-success" type="submit"><i class="material-icons" style="font-size: 15px">add</i> Buat Pesanan</button>
                    </form>
                  </th>                  
                  <form class="form-inline">
                    <th>
                      <input class="form-control" type="text" placeholder="Cari Berkas" size="100%" aria-label="Search">
                    </th>
                    <th>
                      <button class="btn btn-primary" type="submit"><i class="material-icons" style="font-size: 13px">search</i></button>
                    </th>
                  </form>
                </tr>              
              </thead>         
            </table> 
          </div>

          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="thead-inverse">
                <tr>
                  <th>Pemesan</th>
                  <th>Deskripsi Pesanan</th>
                  <th>Tanggal</th>
                  <th>Monitor</th>
                </tr>
              </thead>
              <tbody>
                
                  <?php 

                    foreach ($form_data as $d){
                      //print_r($d);
                     echo "<tr style='font-weight:bold'>";
                        echo "<td>".$this->session->userdata('username')."</td>";
                        echo "<td>".$d->information."</td>";
                        echo "<td>".$d->date."</td>";
                        echo "<td>Usulan Dalam Antrian</td>";
                      echo "</tr>";
                    }
                  ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    
    <script src="<?php echo base_url() ?>template/user/js/jquery-1.12.4.min.js" type="text/javascript"></script> 
    <script src="<?php echo base_url() ?>template/user/js/popper.min.js" type="text/javascript"></script> 
    <script src="<?php echo base_url() ?>template/user/js/bootstrap.min.js" type="text/javascript"></script>

    <script type="text/javascript">
      $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
      })
    </script>

