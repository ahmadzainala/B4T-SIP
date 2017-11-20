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
          <form action='<?php echo base_url(); ?>Form/acc' method='POST'>
          
            
          <table class="table borderless">
            <tr>              
              <td width="20%">Nama Kegiatan</td>
              <td width="20px">:</td>
              <td colspan="2"><?php echo $form_data->name_activity;?><input name="id_form" type="hidden" value = "<?php echo $id_form;?>" /></td>
              <td rowspan="5">
                  <img src="<?php echo base_url() ?>uploads/profile/<?php echo $form_data->id_user;?>.jpg?dummy=8484744" class="rounded" height="200px" width="200px" align="right" onerror=this.src="<?php echo base_url() ?>template/user/img/default_profile.jpg">
                </div>
              </td>
            </tr>            
            <tr>
              <td>Kepada</td>
              <td>:</td>
              <td colspan="2">Kepala B4T,u.p. Kepala Bagian Tata Usaha</td>
            </tr>
            <tr>
              <td>Dari</td>
              <td>:</td>
              <td colspan="2"><?php echo $form_data->name.' ('.$divisi->name_division.')'; ?></td>
            </tr>
            <tr>
              <td>Agar</td>
              <td>:</td>
              <td colspan="2"><?php echo $form_data->that;?></td>
            </tr>
            <tr>
              <td>Diperlukan Tanggal</td>
              <td>:</td>
              <td colspan="2"><?php echo $form_data->date_needs;?></td>
            </tr>                   
          </table>
          <hr>
          <div class="table-responsive">
            <table border="0" class="table">
              <thead class="thead-default">
                <tr>
                  <th width="5%">No.</th>
                  <th width="15%">Kategori</th>
                  <th>Nama dan Spesifikasi Barang / Jasa</th>
                  <th width="10%" colspan="2">Banyaknya</th>
                  <th><input type="checkbox" onClick="toggle(this)" id="all"> All</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i = 1;
                  if($item_list != ""){
                    foreach ($item_list as $il) {
                      echo "<tr style=''><td>$i</td><td>$il->name_category</td><td>$il->name_items</td><td><input class='form-control' type='number' name='qty$il->id_items_detail' style='text-align: right;' value=$il->quantity min='1'></td><td>$il->unit</td><td><input type='checkbox' name='$il->id_items_detail' class='acc' value='0' onClick='check($il->id_items_detail)'></td></tr>";
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
            <table class="table borderless">
              <tr>
                <td width="20%">
                  <label for="budget">Sumber Anggaran</label>
                </td>
                <td width="20px">:</td>
                <td>
                  <?php echo $form_data->name_source;?>                    
                </td>
              </tr>
            </table>    
            <hr>
            <label for="keterangan">Keterangan</label>
            <div class="card">
              <div class="card-body"><?php echo $form_data->information; ?></div>
            </div>
            <hr>
            <a target="_blank" href="<?php echo base_url()."uploads/lampiran/".$id_form.".zip";?>"><button class="btn btn-primary" form="nothing"><i class="material-icons">attach_file</i>Unduh Lampiran</button></a> 
            <hr>
            <div class="card">
              <h5 class="card-header">Form Pernyataan</h5>              
                <div class="card-body">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="status_acc" id="exampleRadios1" value="1" checked>
                    <b>Setuju</b> dengan pengadaan barang / jasa yang saya tandai
                  </label>
                </div>           
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="status_acc" id="exampleRadios2" value="0">
                    <b>Tidak Setuju</b> dengan semua pengadaan barang / jasa
                  </label>
                </div>
                <hr>
                <label for="keterangan">Rekomendasi / Catatan</label>
                <textarea class="form-control" name="keterangan" rows="5" id="keterangan" required></textarea>
              </div>
            </div>
          <!--</form>!-->          
        </div>
        <div class="card-footer">
          <table border=0>
            <tr>
              <td style="padding-right: 20px">
                Masukan Kembali Password Akun Anda
              </td>
              <td style="padding-right: 20px">
                <input class="form-control" type="password" name="password" required>
              </td>
              <td>            
                <button class="btn btn-success" type="submit" name="submit">Submit</button>
              </td>
            </tr>
            </form>
          </table>
        </div>
      </div>
      <br>
      <br>
      <br>
      <br>
    </div> <!-- /container -->

     <!-- Bootstrap core JavaScript
    ================================================== -->
    
    <script src="js/jquery-1.12.4.min.js" type="text/javascript"></script> 
    <script src="js/popper.min.js" type="text/javascript"></script> 
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

    <script type="text/javascript">
      
      // Acc All
      function toggle(source) {
        if(source.checked == true){
          source.value = 1;
        }else{
          source.value = 0;
        }
        var elements = document.getElementsByClassName("acc");
       
        for(var i=0; i<elements.length; i++) {
            elements[i].checked = source.checked;
            elements[i].value = source.value;
        }
        
      }

      function check(nameinput) {
        temp = document.getElementsByName(nameinput);
        cek = document.getElementById('all');
        if(cek.checked == true){
          cek.checked = false;
          cek.value = 0;
        }
        if(temp.checked == true){
          temp.value = 0;
          temp.checked = false;
        }else{
          temp.value = 1;
          temp.checked = true;
        }
      }

    </script>

  </body>
</html>