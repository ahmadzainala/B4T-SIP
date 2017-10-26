    <div class="container" style="padding-top: 70px">
      <div class="card">
        <div class="row card-header" style="margin: 0px 0.5px 0px 0.5px;padding-bottom: 1px;">
          <div class="col-md-6">
            <h4>Form Daftar Pemesanan Barang / Jasa</h4> 
          </div>
          <div class="col-md-6" style="text-align: right;">
            <p>Tanggal Diajukan : <?php $date = explode(" ",$form_data->date); echo $date[0];?></p>
          </div> 
        </div> 
        <div class="card-body">
          <table class="table borderless">
            <tr>
              <td rowspan="5">
                <div class="card">
                  <div class="card-body" style="margin-right: -23px;">
                    <img src="<?php echo base_url() ?>template/user/img/default_profile.jpg" class="rounded" height="100px" width="100px">
                  </div>
                </div>
              </td>
              <td width="20%">Nama Kegiatan</td>
              <td colspan="2"><?php echo $form_data->name_activity;?></td>
              <td width="30%"></td>
            </tr>            
            <tr>
              <td width="20%">Kepada</td>
              <td colspan="2">Kepala B4T,u.p. Kepala Bagian Tata Usaha</td>
              <td width="30%"></td>
            </tr>
            <tr>
              <td>Dari</td>
              <td colspan="2"><?php echo $form_data->name.' ('.$divisi->name_division.')'; ?></td>
              <td width="30%"></td>
            </tr>
            <tr>
              <td>Agar</td>
              <td colspan="2"><?php echo $form_data->that;?></td>
              <td width="30%"></td>
            </tr>
            <tr>
              <td>Diperlukan Tanggal</td>
              <td colspan="2"><?php echo $form_data->date_needs;?></td>
              <td width="30%"></td>
            </tr>                   
          </table>
          <hr>
          <div class="table-responsive">
            <table border="0" class="table">
              <thead class="thead-default">
                <tr>
                  <th>No.</th>
                  <th width="17%">Kategori</th>
                  <th>Nama dan Spesifikasi Barang / Jasa</th>
                  <th width="20%" style='text-align: center;'>Banyaknya</th>
                  <th>Acc</th>
                </tr>
              </thead>
              <tbody>   
                <?php
                  $i = 1;
                  if($item_list != ""){
                    foreach ($item_list as $il) {
                      if($il->status_acc == 1){
                        $stat = "<i class='material-icons' style='color:green;'>done</i>";
                      }else{

                        $stat = "<i class='material-icons' style='color:red;'>clear</i>";
                      }
                      echo "<tr style=''><td>$i</td><td>$il->name_category</td><td>$il->name_items</td><td style='text-align:center;' title='Usulan Awal : $il->quantity_origin $il->unit'>$il->quantity $il->unit</td><td>$stat</td></tr>";
                      $i++;
                    }
                  }else{
                    echo "<tr style=''><td></td><td></td><td>Belum ada item yang akan dipesan</td><td></td><td></td></tr>";
                  }
                ?>   
              </tbody>
            </table>
          </div>
          <hr>
          <label for="keterangan">Keterangan / Sumber Anggaran</label>
          <div class="card">
            <div class="card-body"><?php echo $form_data->information;?></div>
            <div class="card-body"><?php if($form_data->information_kabid!=''){ echo 'tambahan kabid: '.$form_data->information_kabid;}?></div>
          </div>
          <?php if($form_data->read_status_TU != 0 && $form_data->information_TU != ""){ ?>
          <hr>
          <table>
            <tr>
              <td><b>Permintaan diterima oleh Ka.Bag Tata Usaha :</b></td>
              <td><?php echo $form_acc->date_acc;?></td>
            </tr>
          </table>
          <label for="keterangan"><b>Rekomendasi / Catatan Ka.Bag Tata Usaha</b></label>
          <div class="card">
            <div class="card-body"><?php echo $form_data->information_TU;?></div>
          </div>
          <?php }
                if($form_data->read_status_PPK != 0 && $form_data->information_PPK != ""){
          ?>          
          <hr>
          <label for="keterangan"><b>Perintah / Catatan Pejabat Pembuat Komitmen</b></label>
          <div class="card">
            <div class="card-body"><?php echo $form_data->information_PPK;?></div>
          </div>
          <?php }?>  
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

  </body>
</html>