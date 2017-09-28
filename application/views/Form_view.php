    <div class="container" style="padding-top: 70px">
      <div class="card">
        <h4 class="card-header">Daftar Pemesanan Barang / Jasa</h4>
        <div class="card-body">
          <table class="table borderless">
            <tr>
              <td width="20%">Kepada</td>
              <td colspan="2">Kepala B4T,u.p. Kepala Bagian Tata Usaha</td>
              <td width="30%"></td>
            </tr>
            <tr>
              <td>Dari</td>
              <td colspan="2"><?php echo $this->session->userdata('first_name').' '. $this->session->userdata('last_name').' ('.$divisi->name_division.')'; ?></td>
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
                  <th>Acc</th>
                </tr>
              </thead>
              <tbody>   
                <?php
                  $i = 1;
                  if($item_list != ""){
                    foreach ($item_list as $il) {
                      echo "<tr style=''><td>$i</td><td>$il->name_category</td><td>$il->name_items</td><td>$il->quantity $il->unit</td><td></td></tr>";
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
            <div class="card-body"><?php echo $form_data->information;?></div>
          </div>
          <hr>
          <table>
            <tr>
              <td><b>Permintaan diterima oleh Ka.Bag Tata Usaha :</b></td>
              <td>NULL</td>
            </tr>
          </table>
          <label for="keterangan"><b>Rekomendasi / Catatan Ka.Bag Tata Usaha</b></label>
          <div class="card">
            <div class="card-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
          </div>
          <hr>
          <label for="keterangan"><b>Perintah / Catatan Pejabat Pembuat Komitmen</b></label>
          <div class="card">
            <div class="card-body">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. </div>
          </div>  
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