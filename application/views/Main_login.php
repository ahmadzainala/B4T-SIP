
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
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
                    if($this->session->userdata('id_position')== 3){
                      foreach ($form_data as $d){
                      $link = base_url()."Login/form_acc/".$d->id_form;
                        if($d->read_status_Ketua == 0){  
                         echo "<tr href='$link' style='font-weight:bold'>";
                        }else{
                         echo "<tr href='$link' style='font-weight:italic'>";
                        }
                          echo "<td>".$d->username."</td>";
                          echo "<td>".$d->information."</td>";
                          echo "<td>".$d->date."</td>";
                          echo "<td>Usulan Dalam Antrian</td>";
                        echo "</tr>";
                      }
                    }else{
                      foreach ($form_data as $d){
                        //print_r($d);
                        $link = base_url()."Login/detail_form/".$d->id_form;
                       echo "<tr href='$link'>";
                          echo "<td>".$d->username."</td>";
                          echo "<td>".$d->information."</td>";
                          echo "<td>".$d->date."</td>";
                          echo "<td>Usulan Dalam Antrian</td>";
                        echo "</tr>";
                      }
                    }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      <br>
      <br>
      <br>
      <br>
    </div> <!-- /container -->



 <script src="<?php echo base_url() ?>template/user/js/jquery-1.12.4.min.js" type="text/javascript"></script> 
    <script src="<?php echo base_url() ?>template/user/js/popper.min.js" type="text/javascript"></script> 
    <script src="<?php echo base_url() ?>template/user/js/bootstrap.min.js" type="text/javascript"></script>

  <script type="text/javascript">
      $(document).ready(function(){
          $('table tr').click(function(){
              window.location = $(this).attr('href');
              return false;
          });
      });
  </script>
  </body>
</html>
