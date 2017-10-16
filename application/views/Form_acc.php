 <div class="container" style="padding-top: 70px">
      <div class="card">
        <h4 class="card-header">Form Daftar Pemesanan Barang / Jasa</h4>
        <div class="card-body">
          <form action='<?php echo base_url(); ?>Form/acc' method='POST'>
            <table class="table borderless">
            <tr>
              <td width="20%">Kepada</td>
              <td colspan="2">Kepala B4T,u.p. Kepala Bagian Tata Usaha</td>
              <td width="30%"><input name="id_form" type="hidden" value = "<?php echo $id_form;?>" /></td>
            </tr>
            <tr>
              <td>Dari</td>
              <td colspan="2"><?php echo $user_data->first_name.' '. $user_data->last_name.' ('.$divisi->name_division.')'; ?></td>
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
                  <th width="20%" colspan="2" style="text-align:center;">Banyaknya</th>
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
            <label for="keterangan">Keterangan / Sumber Anggaran</label>
            <div class="card">
              <div class="card-body"><?php echo $form_data->information; ?></div>
            </div>
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
                    <input class="form-check-input" type="radio" name="status_acc" id="exampleRadios2" value="2">
                    <b>Setuju bersyarat</b> (revisi)
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
                <button class="btn btn-success" type="submit" name="submit" data-toggle="modal" data-target="#exampleModal">Submit</button>
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
      // modal
      $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
      })

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