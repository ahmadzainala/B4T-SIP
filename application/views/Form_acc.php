 <div class="container" style="padding-top: 70px">
      <div class="card">
        <h4 class="card-header">Form Daftar Pemesanan Barang / Jasa</h4>
        <div class="card-body">
          <form action='#' method='POST'>
            <table class="table borderless">
            <tr>
              <td width="20%">Kepada</td>
              <td colspan="2">Kepala B4T,u.p. Kepala Bagian Tata Usaha</td>
              <td width="30%"></td>
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
                  <th width="20%">Banyaknya</th>
                  <th><input type="checkbox" onClick="toggle(this)"> All</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i = 1;
                  if($item_list != ""){
                    foreach ($item_list as $il) {
                      echo "<tr style=''><td>$i</td><td>$il->name_category</td><td>$il->name_items</td><td>$il->quantity</td><td><input type='checkbox' name='acckabid' value='$il->id_items_detail'></td></tr>";
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
            <label for="keterangan">Keterangan</label>
            <div class="card">
              <div class="card-body"><?php echo $form_data->information; ?></div>
            </div>
            <hr>

            <div class="card">
              <h5 class="card-header">Form Pernyataan</h5>              
                <div class="card-body">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <b>Setuju</b> dengan pengadaan barang / jasa yang saya tandai
                  </label>
                </div>            
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <b>Tidak Setuju</b> dengan semua pengadaan barang / jasa
                  </label>
                </div>
                <hr>
                <label for="keterangan">Rekomendasi / Catatan</label>
                <textarea class="form-control" rows="5" id="keterangan" required></textarea>
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
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Submit</a>
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
        checkboxes = document.getElementsByName('acckabid');
        for(var i=0, n=checkboxes.length;i<n;i++) {
          checkboxes[i].checked = source.checked;
        }
      }
    </script>

  </body>
</html>