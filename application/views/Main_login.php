
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
      <section class="row text-center placeholders">
        <div class="col-6 col-sm-3 placeholder" style="padding-top: 70px">
          <div class="row">
            <h1><i class="material-icons" style="font-size: 28px">timelapse</i> <?php echo $jmlmenunggudisetujui; ?>.</h1>.
            <h4>Menunggu Disetujui</h4>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <p><?php echo $jmlmenunggudisetujuiKD; ?></p>
              <p>Kabid</p>
            </div>
            <div class="col-sm-2">
              <p><?php echo $jmlmenunggudisetujuiTU; ?></p>
              <p>TU</p>
            </div>
            <div class="col-sm-2">
              <p><?php echo $jmlmenunggudisetujuiPPK; ?></p>
              <p>PPK</p>
            </div>
          </div>
        </div>
        <div class="col-6 col-sm-3 placeholder" style="padding-top: 70px">
          <h1><i class="material-icons" style="font-size: 28px">shopping_cart</i> <?php echo $jmlprosespengadaan; ?>.</h1>
          <h4>Proses Pengadaan</h4>
        </div>
        <div class="col-6 col-sm-3 placeholder" style="padding-top: 70px">
          <h1><i class="material-icons" style="font-size: 28px">speaker_notes_off</i> <?php echo $jmltidakdisetujui; ?>.</h1>
          <h4>Tidak Disetujui</h4>
        </div>
        <div class="col-6 col-sm-3 placeholder" style="padding-top: 70px">
          <h1><i class="material-icons" style="font-size: 28px">assignment_turned_in</i> <?php echo $jmlselesaipengadaan; ?>.</h1>
          <h4>Selesai Pengadaan</h4>
        </div>
      </section>

          <div class="table-responsive" style="padding-top: 20px">
            <table class="table">
              <thead>
                <div>
                  <?php if($this->session->userdata('id_position') != 5 && $this->session->userdata('id_position') != 6){?>
                  <th>
                    <form action="<?php echo base_url(); ?>Form/add_form" method="POST">
                      <button class="btn btn-success" type="submit"><i class="material-icons" style="font-size: 15px">add</i> Buat Pesanan</button>
                    </form>
                  </th>    
                  <?php }?>              
                  <form class="form-inline">
                    <th>
                      <input class="form-control" type="text" placeholder="Cari Berkas" size="100%" aria-label="Search">
                    </th>
                    <th>
                      <button class="btn btn-primary" type="submit"><i class="material-icons" style="font-size: 13px">search</i></button>
                    </th>
                  </form>
                </div>              
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
                    if($this->session->userdata('id_position')== 3 || $this->session->userdata('id_position')== 5 || $this->session->userdata('id_position')== 6){
                      $temp = "";
                      foreach ($form_data as $d){
                      if($this->session->userdata('id_position')== 3){
                        if($d->id_status_tracking==10 || $d->id_status_tracking==0){
                           if($d->id_status_tracking==10){
                            $temp = "<i class='material-icons' style='color:orange;'>error</i>";
                          }else{
                            $temp="";
                          } 
                           $link = base_url()."Form/form_acc/".$d->id_form;
                        }else{
                          if($d->id_status_tracking==4){
                            $temp = "<i class='material-icons' style='color:red;'>clear</i>";
                          }else{
                            $temp = "<i class='material-icons' style='color:green;'>check_circle</i>";
                          }

                          $link = base_url()."Form/detail_form/".$d->id_form;
                        }
                      }else if($this->session->userdata('id_position')== 5){
                        if($d->id_status_tracking==11 || $d->id_status_tracking==1){
                           if($d->id_status_tracking==11){
                            $temp = "<i class='material-icons' style='color:orange;'>error</i>";
                          }else{
                            $temp="";
                          }
                           $link = base_url()."Form/form_acc/".$d->id_form;
                        }else{
                          if($d->id_status_tracking==4){
                            $temp = "<i class='material-icons' style='color:red;'>clear</i>";
                          }else{
                            $temp = "<i class='material-icons' style='color:green;'>check_circle</i>";
                          }

                          $link = base_url()."Form/detail_form/".$d->id_form;
                        }
                      }else if($this->session->userdata('id_position')== 6){
                        if($d->id_status_tracking==12 || $d->id_status_tracking==2){
                           if($d->id_status_tracking==12){
                            $temp = "<i class='material-icons' style='color:orange;'>error</i>";
                          }else{
                            $temp="";
                          } 
                           $link = base_url()."Form/form_acc/".$d->id_form;
                        }else{
                          if($d->id_status_tracking==4){
                            $temp = "<i class='material-icons' style='color:red;'>clear</i>";
                          }else{
                            $temp = "<i class='material-icons' style='color:green;'>check_circle</i>";
                          }

                          $link = base_url()."Form/detail_form/".$d->id_form;
                        }
                      }
                      
                      if(($this->session->userdata('id_position')== 3 && $d->read_status_Ketua == 0) || ($this->session->userdata('id_position')== 5 && $d->read_status_TU == 0) || ($this->session->userdata('id_position')== 6 && $d->read_status_PPK == 0)){  
                         echo "<tr href='$link' style='font-weight:bold'>";
                      }else{
                         echo "<tr href='$link' style='font-weight:italic'>";
                      }
                          echo "<td>".$temp." ".$d->first_name." ".$d->last_name."</td>";
                          echo "<td>".$d->information."</td>";
                          echo "<td>".$d->date."</td>";
                          echo "<td>".$d->description."</td>";
                        echo "</tr>";
                      }
                    }else{
                      foreach ($form_data as $d){
                        //print_r($d);
                        $link = base_url()."Form/detail_form/".$d->id_form;
                       echo "<tr href='$link'>";
                          echo "<td>".$d->first_name." ".$d->last_name."</td>";
                          echo "<td>".$d->information."</td>";
                          echo "<td>".$d->date."</td>";
                          echo "<td>".$d->description."</td>";
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
          $('tr').click(function(){
            var x = $(this).attr('href');
            if(x.value!= ""){
              window.location = $(this).attr('href');
              return false;
            }
          });
      });
  </script>
  </body>
</html>
