 
    <div class="container" style="padding-top: 70px">
      <div class="card">
        <div class="row card-header" style="margin: 0px 0.5px 0px 0.5px;padding-bottom: 1px;">
          <div class="col-md-6">
            <h4>Form Daftar Pemesanan Barang / Jasa</h4> 
          </div>
          <div class="col-md-6" style="text-align: right;">
            <p>Tanggal Diajukan : <?php $date = explode(" ",$form_data->date); echo $date[0];?>
              <?php //print_r($tracking);?>
            </p>
          </div> 
        </div> 
        <div class="card-body">
          <table class="table borderless">
            <tr>              
              <td width="20%">Nama Kegiatan</td>
              <td width="20px">:</td>
              <td colspan="2"><?php echo $form_data->name_activity;?></td>
              <td rowspan="5">
                  <img src="<?php echo base_url() ?>uploads/profile/<?php echo $this->session->userdata('id_user');?>.jpg?dummy=8484744" class="rounded" height="200px" width="200px" align="right" onerror=this.src="<?php echo base_url() ?>template/user/img/default_profile.jpg">
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
            <table border="1" class="table">
              <thead class="thead-default">
                <tr>
                  <th>No.</th>
                  <th width="17%">Kategori</th>
                  <th>Nama dan Spesifikasi Barang / Jasa</th>
                  <th width="20%" style='text-align: center;'>Banyaknya</th>
                  <?php if($this->session->userdata('id_division')!=5){?>
                  <th>Acc</th>
                  <?php }else{ ?>
                  <th colspan='2'>Pengadaan</th>
                  <form action='<?php echo base_url(); ?>Form/detail_form/<?php echo $id_form ?>' id='form_pengadaan' method='POST'></form>
                  <form action='<?php echo base_url(); ?>Form/edit_item_pengadaan/<?php echo $id_form ?>' id='edit_item' method='POST'></form>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
              <input class="form-control" type="hidden" id="linkforauto2" value="<?php echo base_url(); ?>Form/autocompleteItems">
                <?php
                  $i = 1;
                  $j = 0;
                  $k = 0;
                  $n = 0;
                  if($item_list != ""){
                    foreach ($item_list as $il) {
                      if($il->status_acc == 1){
                        $stat = "<i class='material-icons' style='color:green;'>done</i>";
                      }else if(isset($tracking) && $tracking->id_status_tracking != 0 && $tracking->id_status_tracking != 10){

                        $stat = "<i class='material-icons' style='color:red;'>clear</i>";
                      }else{
                        $stat = "";
                      }
                      echo "<tr style=''><td>$i</td><td><input class='form-control' type='text' form='edit_item' name='kategori' id='cat_edit[$i]' style='text-align: left;' value=$il->name_category readonly/></td>";
                      echo "<td style='text-align:center;' title='yang diadakan pengadaan :".
                        $item_list_pengadaan[$n]->name_items
                      ."'><input class='form-control' type='text' form='edit_item' name='item' id='item_edit[$i]' style='text-align: left;' placeholder=$il->name_items value=$il->name_items readonly />";
                      echo "</td>";
                      echo "<td style='text-align:center;' title='Usulan Awal : $il->quantity_origin $il->unit'>$il->quantity $il->unit</td><td align='right'>";
                      if($this->session->userdata('id_division')!=5){
                         echo $stat;
                      }else{
                        $k++;
                        if($il->ready == 0){

                          echo "<button type='submit' value='$il->id_form_content' name='tersedia' form='form_pengadaan' id='tersedia[$i]' class='btn btn-success'>Tersedia</button></td><td align='left'><button class='btn btn-warning btn-sm' id='edit_this[$i]' type='button'  style='display:block;' form='edit_item' name='edit' value='$i' onclick='changeText(this)'><i class='material-icons'>edit</i></button></td>";
                        }else{
                          echo "<i class='material-icons' style='color:green; '>done</i>";
                          $j++;
                        }
                      }
                      echo "</td></tr>";
                      $i++;
                      $n++;
                    }
                    ?>
                    <tr>
                      <td><input type="hidden" class="form-control" name="form_content_edit" id="form_content_edit" form='edit_item' required/></td>
                      <td>
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="kategori_edit" placeholder="Kategori item" id="category"  form='edit_item' required/>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <input class="form-control" type="hidden" id="linkforauto2" value="<?php echo base_url(); ?>Form/autocompleteItems" />
                        <input type="hidden" class="form-control" name="item_edit" placeholder="Item" form='edit_item' id="item_complete"  required />
                      </div>
                    </td>
                    <td></td>
                    <td align="right"><button class='btn btn-danger btn-sm' type='button' name='cancel' id='cancel' style='display:none;' onclick='cancel()'><i class='material-icons'>delete_forever</i></button></td>
                    <td><button class='btn btn-warning btn-sm' type='submit' id='update' style='display:none;' form='edit_item' name='update' onclick='setInput(this)'><i class='material-icons'>done</i></button></td>
                  </tr>
                    <?php
                  }else{
                    echo "<tr style=''><td></td><td></td><td>Belum ada item yang akan dipesan</td><td></td><td></td></tr>";
                  }
                ?>   
              </tbody>
            </table>
          </div>
          <?php if($this->session->userdata('id_division')!=5){?>
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
            <br>
              <?php }else{
        if($j == $k){
          ?>
          <form action='<?php echo base_url(); ?>Form/pengadaan' id='pengadaan' method='POST'>
        <div class="card-footer">
          <p align="center">Semua item telah tersedia dan siap dikirim</p>
        </div>
        <div class="card-footer">
          <table border=0>
            <tr>
              <td style="padding-right: 20px">
                Masukan Kembali Password Akun Anda
              </td>
              <td style="padding-right: 20px">
                <input class="form-control" type="password" form='pengadaan' name="password" required>
                <input class="form-control" type="hidden" form='pengadaan' name="id_form" value='<?php echo $id_form;?>' required>
              </td>
              <td>            
                <button type="submit" name="submit" form='pengadaan' class="btn btn-success">Kirim</button>
              </td>
            </tr>
          </table>
        </div>
          </form>
          <?php
        }
      }?>
      <?php
            if (isset($tracking) && $tracking->id_status_tracking == 5) {
      ?>
          <a href="<?php echo base_url('Report/wordDokumen/'.$form_data->id_form);?>"><button class="btn btn-primary" >Save to Word</button></a> 
          <a href="<?php echo base_url('Report/PDFDokumen/'.$form_data->id_form);?>"><button class="btn btn-primary">Save to PDF</button></a>
      <?php
            }
      ?>
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
    
    <script src="<?php echo base_url() ?>template/user/js/jquery-1.12.4.min.js" type="text/javascript"></script> 
    <script src="<?php echo base_url() ?>template/user/js/popper.min.js" type="text/javascript"></script> 
    <script src="<?php echo base_url() ?>template/user/js/bootstrap.min.js" type="text/javascript"></script>
    <script>
    
    function cancel(){
       var items = document.getElementsByName("kategori");
         //alert(items.length);
         document.getElementById("category").type = "hidden";
          document.getElementById("item_complete").type = "hidden";
          document.getElementById("update").style.display = "none";
          document.getElementById("cancel").style.display = "none";
         for(i=1;i<=items.length;i++){

          document.getElementById("item_edit["+i+"]").type = "text";
          document.getElementById("cat_edit["+i+"]").type = "text";
          var cek = document.getElementById("edit_this["+i+"]");
           //alert(cek);
          if(cek!=null){
            document.getElementById("edit_this["+i+"]").style.display = "block";
            document.getElementById("tersedia["+i+"]").style.display = "block";
          }
         }
    }

    function changeText(data){
        //alert(data.value);
        var items = document.getElementsByName("kategori");
         //alert(items.length);
          
         for(i=1;i<=items.length;i++){

          document.getElementById("item_edit["+i+"]").type = "text";
          document.getElementById("cat_edit["+i+"]").type = "text";
          var cek = document.getElementById("edit_this["+i+"]");
        
          if(cek!=null){
            document.getElementById("edit_this["+i+"]").style.display = "block";
            document.getElementById("tersedia["+i+"]").style.display = "block";
          }
         }

        var x = data.value;
          var temp= document.getElementById("item_edit["+x+"]").value;
          var cat = document.getElementById("cat_edit["+x+"]").value
          //alert(temp + cat);
          //document.getElementById('category').setAttribute('value', cat);
          document.getElementById("category").readOnly = true;
          document.getElementById("category").type = "text";
          document.getElementById("item_complete").type = "text";
          document.getElementById("update").style.display = "block";
          document.getElementById("cancel").style.display = "block";
          $('#category').val(cat)
                 .trigger('change');
          document.getElementById("update").value = x;
          document.getElementById('item_complete').setAttribute('placeholder', temp);
          document.getElementById('item_complete').setAttribute('placeholder', temp);
          
          //document.getElementById("update_this["+x+"]").style.display = "block";
          document.getElementById("item_edit["+x+"]").type = "hidden";
          document.getElementById("cat_edit["+x+"]").type = "hidden";
          document.getElementById("edit_this["+x+"]").style.display = "none";
          document.getElementById("tersedia["+x+"]").style.display = "none";
      }

     function setInput(data){
        var x = data.value;
        //alert(x);
        document.getElementById("form_content_edit").value = document.getElementById("tersedia["+x+"]").value;
        
        document.getElementById("update").submit();
        //var x = document.getElementById("cek").value;
        //alert(document.getElementById("id_item_edit").value+document.getElementById("val_unit_edit").value + document.getElementById("val_qty_edit").value);
      }

    </script>

    <script>

       $(function() {
          var temp2 = $('#linkforauto2').val();
              
          var kategori = "";
          var item = "";

            //alert(kategori);
            $( "#category" ).change(function() {
              kategori = $('#category').val();
              $( "#item_complete" ).autocomplete({
               source: temp2+"/"+kategori,  
                 minLength:1, 
              });
            });

            $( "#item_complete" ).autocomplete({
               source: temp2+"/"+kategori,  
                 minLength:1, 
              });

            
        });

    
    </script>
     
  </body>
</html>