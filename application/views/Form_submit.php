

    <div class="container" style="padding-top: 70px">
      <div class="card">
        <h4 class="card-header">Form Daftar Pemesanan Barang / Jasa</h4>
          <div class="card-body">
            <form action='<?php echo base_url(); ?>/Login/add_form' method='POST'>
              <table class="table borderless">
                <tr>
                  <td width="20%">Kepada</td>
                  <td colspan="2"><input class="form-control" type="text" name="kepada" placeholder="Kepala B4T,u.p. Kepala Bagian Tata Usaha" readonly></td>
                  <td width="30%"></td>
                </tr>
                <tr>
                  <td>Dari</td>
                  <td colspan="2"><input class="form-control" type="text" name="dari" placeholder="<?php echo $this->session->userdata('first_name').' '. $this->session->userdata('last_name').' ('.$divisi->name_division.')'; ?>" data-toggle="popover" title="" data-content="Sesuai ID Login Anda" readonly></td>
                  <td width="30%"></td>
                </tr>
                <tr>
                  <td>Agar</td>
                  <td colspan="2">
                    <input class="form-control" type="text" name="that" value="<?php echo $form_data->that;?>" required>
                    
                  </td>
                  <td width="30%"></td>
                </tr>
                <tr>
                  <td>Diperlukan Tanggal</td>
                  <td>
                    <select name='date_needs' class='selectpicker' onchange="getinput(this);">
                      <?php 
                        if($form_data->date_needs == "Segera"){
                      ?>
                          <option value='Segera' selected='selected'>Segera</option>
                          <option value='Date' id='cek'>Date</option>
                      <?php
                        }else{
                      ?>
                          <option value='Segera'>Segera</option>
                          <option value='Date' id='cek'>Date</option>
                          <option value='<?php echo $form_data->date_needs;?>' id='cek' selected='selected'><?php echo $form_data->date_needs ?></option>
                      <?php
                        }
                      ?>
                    </select>
                    
                  </td>
                  <td width="50%"><input class="form-control" type="hidden" placeholder="YYYY-MM-DD" id="tes" onchange="setvalue(this);"></td>
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
                    <th width="20%" colspan="2">Banyaknya</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $i = 1;
                  if($item_list != ""){
                    foreach ($item_list as $il) {
                      echo "<tr style=''><td>$i</td><td>$il->name_category</td><td>$il->name_items</td><td colspan='2'>$il->quantity</td></tr>";
                      $i++;
                    }
                  }else{
                    echo "<tr style=''><td></td><td></td><td>Belum ada item yang akan dipesan</td><td colspan='2'></td></tr>";
                  }
                ?>   
                  
                  <tr style="">
                    <td></td>
                    <td>

                      <select name='kategori' class='selectpicker' onchange="this.form.submit()" required>
                      <?php 
                        
                        foreach ($data_kategori as $d){
                          if($d->id_category == $this->session->userdata('category_item')){
                            echo "<option value='$d->id_category' selected='selected'>";
                          }else{
                            echo "<option value='$d->id_category'>";
                          }
                              echo $d->name_category;
                            echo "</option>";
                        }
                      ?>
                      </select>
                      <input type="hidden" id"kategorinew" placeholder="Kategori baru" value="" required>
                    </td>
                    <td>
                      <select name='item' class='selectpicker' required>
                      <?php 
                        
                        foreach ($data_item as $d){
                         echo "<option value='$d->id_items_detail' selected='selected'>";
                            echo $d->name_items;
                          echo "</option>";
                        }
                      ?>
                      </select>
                      <input type="hidden" id"itemnew" placeholder="Item baru" value="" required>
                    </td>
                    <td><input class="form-control" type="number" name="quantity" required></td>
                    <td><button class="btn btn-info" type="submit" name="add" value ="1">Add</button></td>
                  </tr>    
                </tbody>
              </table>
            </form>
          </div>
          <hr>
          <form action='<?php echo base_url(); ?>/Login/submit_form' method='POST'>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" rows="5" id="keterangan" name="information" value="<?php echo $form_data->information;?>" required><?php echo $form_data->information;?></textarea>
          </div>
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
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
              </td>
            </tr>
          </table>
        </div>
      </form>
        
      </div>
      <br>
      <br>
      <br>
      <br>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    
    <script src="<?php echo base_url() ?>template/user/js/jquery-1.12.4.min.js" type="text/javascript"></script> 
    <script src="<?php echo base_url() ?>template/user/js/popper.min.js" type="text/javascript"></script> 
    <script src="<?php echo base_url() ?>template/user/js/bootstrap.min.js" type="text/javascript"></script>

    <script type="text/javascript">
      //modal
      $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
      })

      //pop up mini
      $(function () {
        $('[data-toggle="popover"]').popover()
      })

      function getinput(data){
        if(data.value == "Date"){
          document.getElementById("tes").type = "date";
          document.getElementById("tes").required = true;
          
            //document.body.appendChild(x);
        }else{
          document.getElementById("tes").type = "hidden";
        }
      }
      function setvalue(data){
        document.getElementById("cek").value = data.value;
        //var x = document.getElementById("cek").value;
        //alert(x);
      }
    </script>

