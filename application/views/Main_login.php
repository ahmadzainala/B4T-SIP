    <!-- Main jumbotron for a primary marketing message or call to action -->
    <?php

        $no = 0;
        $min = 0;
        $max = 10;
        $this_page = 1;
    ?>
    <div class="container">
      <section class="row text-center placeholders">
        <div class="col-6 col-sm-2 placeholder" style="padding-top: 70px">
          <h1><i class="material-icons" style="font-size: 28px">timelapse</i> <?php echo $jmlmenunggudisetujuiKD; ?></h1>
          <b>Menunggu Disetujui Kabid</b>
        </div>
        <div class="col-6 col-sm-2 placeholder" style="padding-top: 70px">
          <h1><i class="material-icons" style="font-size: 28px">assignment_ind</i> <?php echo $jmlmenunggudisetujuiTU; ?></h1>
          <b>Menunggu Disetujui TU</b>
        </div>
        <div class="col-6 col-sm-2 placeholder" style="padding-top: 70px">
          <h1><i class="material-icons" style="font-size: 28px">assignment</i> <?php echo $jmlmenunggudisetujuiPPK; ?></h1>
          <b>Menunggu Disetujui PPK</b>
        </div>
        <div class="col-6 col-sm-2 placeholder" style="padding-top: 70px">
          <h1><i class="material-icons" style="font-size: 28px">assignment_returned</i> <?php echo $jmlprosespengadaan; ?></h1>
          <b>Proses Pengadaan</b>
        </div>
        <div class="col-6 col-sm-2 placeholder" style="padding-top: 70px">
          <h1><i class="material-icons" style="font-size: 28px">assignment_late</i> <?php echo $jmlverifikasi; ?></h1>
          <b>Verifikasi Pengadaan</b>
        </div>
        <div class="col-6 col-sm-2 placeholder" style="padding-top: 70px">
          <h1><i class="material-icons" style="font-size: 28px">assignment_turned_in</i> <?php echo $jmlselesaipengadaan; ?></h1>
          <b>Selesai Pengadaan</b>
        </div>
      </section>

          <div class="table-responsive" style="padding-top: 22px">
            <table class="table">
              <thead>
                <div>
                  <?php if($this->session->userdata('id_position') != 5 && $this->session->userdata('id_position') != 6){?>
                  <th width="170px">
                    <form action="<?php echo base_url(); ?>Form/add_form" method="POST">
                      <button class="btn btn-success" type="submit"><i class="material-icons" style="font-size: 22px">add</i> Buat Pesanan</button>
                    </form>
                  </th>    
                  <?php }?>              
                  <form class="form-inline" action="<?php echo base_url(); ?>Form/search_form" method="POST">
                    <th>
                      <div class="input-group">
                        <input name="search" type="search" class="form-control" placeholder="Cari Berkas..." aria-label="Cari Berkas..." required>
                        <span class="input-group-btn">
                          <button class="btn btn-primary" type="submit"><i class="material-icons" style="font-size: 22px">search</i></button>
                        </span>
                      </div>                      
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
                  <th></th>
                  <th>Pemesan</th>
                  <th>Nama Kegiatan</th>
                  <th>Tanggal</th>
                  <th>Monitor</th>
                </tr>
              </thead>
              <tbody>
                  <?php 
                    if($this->session->userdata('id_position')== 3 || $this->session->userdata('id_position')== 5 || $this->session->userdata('id_position')== 6){
                      $temp = "";
                      if(isset($_GET['no_up'])){
                        $min = $_GET['no_bot'];
                        $max = $_GET['no_up'];
                        $this_page = intval($max/10);
                      }
                      foreach ($form_data as $d) if ($no++ < $max){
                         if($no > $min){
                          $date = explode(" ",$d->date);
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
                              $temp = "<i class='material-icons' style='color:red;'>cancel</i>";
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
                            if($d->id_status_tracking==13){
                              $temp = "<i class='material-icons' style='color:red;'>cancel</i>";
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
                            if($d->id_status_tracking==14){
                              $temp = "<i class='material-icons' style='color:red;'>cancel</i>";
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
                            echo "<td width=45px>".$temp."</td>"; 
                            echo "<td>".$d->name."</td>";
                            echo "<td>".$d->name_activity."</td>";
                            echo "<td>".$date[0]."</td>";
                            echo "<td title='$d->description'>";
                            if($d->id_status_tracking == 0 || $d->id_status_tracking == 10){
                              echo "<i class='material-icons' style='font-size: 22px; color:#b5bab4;'>timelapse</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_ind</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_late</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_returned</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                              echo "</td>";
                            }else if($d->id_status_tracking == 1 || $d->id_status_tracking == 11){
                              echo "<i class='material-icons' style='font-size: 22px; color:green;'>timelapse</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_ind</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_late</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_returned</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                              echo "</td>";  
                            }else if($d->id_status_tracking == 2 || $d->id_status_tracking == 12){
                              echo "<i class='material-icons' style='font-size: 22px; color:green;'>timelapse</i>
                              <i class='material-icons' style='font-size: 22px; color:green;'>assignment_ind</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_late</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_returned</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                              echo "</td>";  
                            }else if($d->id_status_tracking == 3){
                              echo "<i class='material-icons' style='font-size: 22px; color:green;'>timelapse</i>
                              <i class='material-icons' style='font-size: 22px; color:green;'>assignment_ind</i>
                              <i class='material-icons' style='font-size: 22px; color:green;'>assignment</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_late</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_returned</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                              echo "</td>";  
                            }else if($d->id_status_tracking == 5){
                              echo "<i class='material-icons' style='font-size: 22px; color:green;'>timelapse</i>
                              <i class='material-icons' style='font-size: 22px; color:green;'>assignment_ind</i>
                              <i class='material-icons' style='font-size: 22px; color:green;'>assignment</i>
                              <i class='material-icons' style='font-size: 22px; color:green;'>assignment_late</i>
                              <i class='material-icons' style='font-size: 22px; color:green;'>assignment_returned</i>
                              <i class='material-icons' style='font-size: 22px; color:green;'>assignment_turned_in</i>";
                              echo "</td>";  
                            }else if($d->id_status_tracking == 4){
                              echo "<i class='material-icons' style='font-size: 22px; color:red;'>timelapse</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_ind</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_late</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_returned</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                              echo "</td>";
                            }else if($d->id_status_tracking == 13){
                              echo "<i class='material-icons' style='font-size: 22px; color:green;'>timelapse</i>
                              <i class='material-icons' style='font-size: 22px; color:red;'>assignment_ind</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_late</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_returned</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                              echo "</td>";
                            }else if($d->id_status_tracking == 14){
                              echo "<i class='material-icons' style='font-size: 22px; color:green;'>timelapse</i>
                              <i class='material-icons' style='font-size: 22px; color:green;'>assignment_ind</i>
                              <i class='material-icons' style='font-size: 22px; color:red;'>assignment</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_late</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_returned</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                              echo "</td>";
                            }else if($d->id_status_tracking == 6){
                            echo "<i class='material-icons' style='font-size: 22px; color:green;'>timelapse</i>
                            <i class='material-icons' style='font-size: 22px; color:green;'>assignment_ind</i>
                            <i class='material-icons' style='font-size: 22px; color:green;'>assignment</i>
                            <i class='material-icons' style='font-size: 22px; color:green;'>assignment_late</i>
                            <i class='material-icons' style='font-size: 22px; color:orange;'>assignment_returned</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                            echo "</td>";
                          }else{
                               echo "<i class='material-icons' style='font-size: 22px; color:#b5bab4;'>timelapse</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_ind</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_late</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_returned</i>
                              <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                              echo "</td>";
                            }// echo "<td>".$d->description."</td>";
                          echo "</tr>";
                        }
                      }
                    }else{
                      if(isset($_GET['no_up'])){
                        $min = $_GET['no_bot'];
                        $max = $_GET['no_up'];
                        $this_page = intval($max/10);
                      }
                      foreach ($form_data as $d) if ($no++ < $max){
                        //print_r($d);
                        if($no > $min){
                          $date = explode(" ",$d->date);
                          $link = base_url()."Form/detail_form/".$d->id_form;
                          $temp ="";
                          if($this->session->userdata('id_division')!= 5){
                            if($d->id_status_tracking == 6){
                              $temp = "<i class='material-icons' style='color:orange;'>error</i>";
                              $link = base_url()."Form/acc_item/".$d->id_form;
                            }
                          }else{
                            if($d->id_status_tracking == 6 || $d->id_status_tracking == 5){
                              $temp = "<i class='material-icons' style='color:green;'>check_circle</i>";
                            }else{

                            }
                          }
                            echo "<tr href='$link'>";
                            echo "<td width=45px>".$temp."</td>";
                            echo "<td>".$d->name."</td>";
                            echo "<td>".$d->name_activity."</td>";
                            echo "<td>".$date[0]."</td>";
                            echo "<td title='$d->description'>";
                            if($d->id_status_tracking == 0 || $d->id_status_tracking == 10){
                            echo "<i class='material-icons' style='font-size: 22px; color:#b5bab4;'>timelapse</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_ind</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_late</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_returned</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                            echo "</td>";
                          }else if($d->id_status_tracking == 1 || $d->id_status_tracking == 11){
                            echo "<i class='material-icons' style='font-size: 22px; color:green;'>timelapse</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_ind</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_late</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_returned</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                            echo "</td>";  
                          }else if($d->id_status_tracking == 2 || $d->id_status_tracking == 12){
                            echo "<i class='material-icons' style='font-size: 22px; color:green;'>timelapse</i>
                            <i class='material-icons' style='font-size: 22px; color:green;'>assignment_ind</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_late</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_returned</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                            echo "</td>";  
                          }else if($d->id_status_tracking == 3){
                            echo "<i class='material-icons' style='font-size: 22px; color:green;'>timelapse</i>
                            <i class='material-icons' style='font-size: 22px; color:green;'>assignment_ind</i>
                            <i class='material-icons' style='font-size: 22px; color:green;'>assignment</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_late</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_returned</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                            echo "</td>";  
                          }else if($d->id_status_tracking == 5){
                            echo "<i class='material-icons' style='font-size: 22px; color:green;'>timelapse</i>
                            <i class='material-icons' style='font-size: 22px; color:green;'>assignment_ind</i>
                            <i class='material-icons' style='font-size: 22px; color:green;'>assignment</i>
                            <i class='material-icons' style='font-size: 22px; color:green;'>assignment_late</i>
                            <i class='material-icons' style='font-size: 22px; color:green;'>assignment_returned</i>
                            <i class='material-icons' style='font-size: 22px; color:green;'>assignment_turned_in</i>";
                            echo "</td>";  
                          }else if($d->id_status_tracking == 4){
                            echo "<i class='material-icons' style='font-size: 22px; color:red;'>timelapse</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_ind</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_late</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_returned</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                            echo "</td>";
                          }else if($d->id_status_tracking == 13){
                            echo "<i class='material-icons' style='font-size: 22px; color:green;'>timelapse</i>
                            <i class='material-icons' style='font-size: 22px; color:red;'>assignment_ind</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_late</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_returned</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                            echo "</td>";
                          }else if($d->id_status_tracking == 14){
                            echo "<i class='material-icons' style='font-size: 22px; color:green;'>timelapse</i>
                            <i class='material-icons' style='font-size: 22px; color:green;'>assignment_ind</i>
                            <i class='material-icons' style='font-size: 22px; color:red;'>assignment</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_late</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_returned</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                            echo "</td>";
                          }else if($d->id_status_tracking == 6){
                            echo "<i class='material-icons' style='font-size: 22px; color:green;'>timelapse</i>
                            <i class='material-icons' style='font-size: 22px; color:green;'>assignment_ind</i>
                            <i class='material-icons' style='font-size: 22px; color:green;'>assignment</i>
                            <i class='material-icons' style='font-size: 22px; color:green;'>assignment_late</i>
                            <i class='material-icons' style='font-size: 22px; color:orange;'>assignment_returned</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                            echo "</td>";
                          }else{
                             echo "<i class='material-icons' style='font-size: 22px; color:#b5bab4;'>timelapse</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_ind</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_late</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_returned</i>
                            <i class='material-icons' style='font-size: 22px; color:#b5bab4;'>assignment_turned_in</i>";
                            echo "</td>";
                          }// echo "<td>".$d->description."</td>";
                          echo "</tr>";
                        }
                        
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
                  
                  <?php
                    if($min != 0){

                    ?>
                    <li class="page-item">
                    <a class="page-link" href="<?php echo base_url(); ?>Main?no_bot=<?php echo $min-10;?>&no_up=<?php echo $max-10;?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                  </li>
                    <?php
                    }else{
                      ?>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                  </li>
                      <?php
                    }
                    $total_page = count($form_data);
                    $page = intval($total_page/10);
                    if($total_page%10 !=0){
                      $page++;
                    }
                    //echo "$page";
                    if($page == 1){
                      ?>
                      <li class="page-item active"><a class="page-link" href="#" aria-label="">1</a></li>
                      <?php
                    }else{
                      for ($i=1; $i <= $page; $i++) {
                        if($i == $this_page){
                    ?>  
                        <li class="page-item active"><a class="page-link" href="#" aria-label=""><?php echo $i?></a></li>
                        <?php
                        }else{
                          ?>
                          <li class="page-item"><a class="page-link" href="<?php echo base_url(); ?>Main?no_bot=<?php echo $i*10-10;?>&no_up=<?php echo $i*10;?>" aria-label=""><?php echo $i?></a></li>
                          <?php
                        }
                      }
                    }
                    if($this_page < $page){
                  ?>
                  <li class="page-item">
                    <a class="page-link" href="<?php echo base_url(); ?>Main?no_bot=<?php echo $min+10;?>&no_up=<?php echo $max+10;?>" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                  <?php
                    }else{
                      ?>
                      <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                      <?php
                    }
                  ?>
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
