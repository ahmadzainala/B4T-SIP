    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
      <section class="row text-center placeholders">
        <div class="col-6 col-sm-2 placeholder" style="padding-top: 70px">
          <h1><i class="material-icons" style="font-size: 28px">timelapse</i> <?php echo $jmlmenunggudisetujuiKD; ?></h1>
          <b>Menunggu Disetujui Kabid</b>
        </div>
        <div class="col-6 col-sm-2 placeholder" style="padding-top: 70px">
          <h1><i class="material-icons" style="font-size: 28px">assignment_ind</i> <?php echo $jmlprosespengadaan; ?></h1>
          <b>Menunggu Disetujui TU</b>
        </div>
        <div class="col-6 col-sm-2 placeholder" style="padding-top: 70px">
          <h1><i class="material-icons" style="font-size: 28px">assignment_returned</i> <?php echo $jmltidakdisetujui; ?></h1>
          <b>Menunggu Disetujui PPK</b>
        </div>
        <div class="col-6 col-sm-2 placeholder" style="padding-top: 70px">
          <h1><i class="material-icons" style="font-size: 28px">assignment_late</i> <?php echo $jmlselesaipengadaan; ?></h1>
          <b>Revisi</b>
        </div>
        <div class="col-6 col-sm-2 placeholder" style="padding-top: 70px">
          <h1><i class="material-icons" style="font-size: 28px">assignment</i> <?php echo $jmlselesaipengadaan; ?></h1>
          <b>Verifikasi Pengadaan</b>
        </div>
        <div class="col-6 col-sm-2 placeholder" style="padding-top: 70px">
          <h1><i class="material-icons" style="font-size: 28px">assignment_turned_in</i> <?php echo $jmlselesaipengadaan; ?></h1>
          <b>Selesai Pengadaan</b>
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
                          $link = base_url()."Form/detail_form/".$d->id_form;
                          if($d->id_status_tracking==4){
                            $temp = "<i class='material-icons' style='color:red;'>clear</i>";
                          }else{
                            $temp = "<i class='material-icons' style='color:green;'>check_circle</i>";
                          }

                        }
                      }
                      
                      if(($this->session->userdata('id_position')== 3 && $d->read_status_Ketua == 0) || ($this->session->userdata('id_position')== 5 && $d->read_status_TU == 0) || ($this->session->userdata('id_position')== 6 && $d->read_status_PPK == 0)){  
                         echo "<tr href='$link' style='font-weight:bold'>";
                      }else{
                         echo "<tr href='$link' style='font-weight:italic'>";
                      }
                          echo "<td>".$temp." ".$d->first_name." ".$d->last_name."</td>";
                          echo "<td>".$d->that."</td>";
                          echo "<td>".$d->date."</td>";
                          echo "<td><i class='material-icons' style='font-size: 20px'>timelapse</i><i class='material-icons' style='font-size: 20px'>assignment_ind</i><i class='material-icons' style='font-size: 20px'>assignment_returned</i><i class='material-icons' style='font-size: 20px'>assignment_late</i><i class='material-icons' style='font-size: 20px'>assignment</i><i class='material-icons' style='font-size: 20px'>assignment_turned_in</i></td>";
                          //echo "<td>".$d->description."</td>";
                        echo "</tr>";
                      }
                    }else{
                      foreach ($form_data as $d){
                        //print_r($d);
                        $link = base_url()."Form/detail_form/".$d->id_form;
                        $temp ="";
                       if($d->id_status_tracking == 6){
                        $temp = "<i class='material-icons' style='color:black;'>assignment_late</i>";
                        $link = base_url()."Form/edit_form/".$d->id_form;
                      }
                       echo "<tr href='$link'>";
                          echo "<td>".$temp."".$d->first_name." ".$d->last_name."</td>";
                          echo "<td>".$d->that."</td>";
                          echo "<td>".$d->date."</td>";
                          echo "<td><i class='material-icons' style='font-size: 20px'>timelapse</i><i class='material-icons' style='font-size: 20px'>assignment_ind</i><i class='material-icons' style='font-size: 20px'>assignment_returned</i><i class='material-icons' style='font-size: 20px'>assignment_late</i><i class='material-icons' style='font-size: 20px'>assignment</i><i class='material-icons' style='font-size: 20px'>assignment_turned_in</i></td>";
                          // echo "<td>".$d->description."</td>";
                        echo "</tr>";
                      }
                    }
                  ?>
              </tbody>
            </table>
          </div>
          <hr>
          <div>
            <nav aria-label="paging">
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>  
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
