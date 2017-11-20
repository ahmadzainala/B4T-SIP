<div class="container" style="padding-top: 70px">
      <div class="card">
        <h4 class="card-header"><i class="material-icons">person</i> Edit Profile</h4>
        <div class="card-body">         
          <!-- <form action='<?php echo base_url(); ?>User_akun/submit_profile' method='POST'> -->
            <?php echo form_open_multipart('User_akun/submit_profile');?>
            <table class="table borderless">
              <tr>
                <td colspan="4">
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Foto profile anda dapat diganti dengan file berformat <strong>.jpg</strong> dengan max ukuran <strong>100KB</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </td>
              </tr>
              <tr>
                <td rowspan="5" width="10%">
                  <div class="card">
                    <div class="card-body">
                      <img src="<?php echo base_url() ?>uploads/profile/<?php echo $this->session->userdata('id_user');?>.jpg?dummy=8484744" class="rounded" height="200" width="200" onerror=this.src="<?php echo base_url() ?>template/user/img/default_profile.jpg">
                      <hr>
                      <input class="btn btn-sm" type="file" name="userfile" style="width: 98%"> 
                    </div>
                  </div>
                </td>
                <td width="15%">Username</td>
                <td><input class="form-control" type="text" name="username" placeholder="<?php echo $this->session->userdata('username'); ?>" title="Hanya Admin Yang Dapat Mengubah Username" readonly></td>
                <td></td>                
              </tr>
              <tr>
                <td>Nama</td>
                <td><input class="form-control" type="text" name="name" placeholder="<?php echo $this->session->userdata('name'); ?>"></td>
                <td></td>                
              </tr>
              <tr>
                <td>Bidang</td>
                <td><input class="form-control" type="text" name="division" placeholder="<?php echo $name_dp->name_division; ?>" title="Hanya Admin Yang Dapat Mengubah Bidang" readonly></td>
                <td></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td><input class="form-control" type="text" name="position" placeholder="<?php echo $name_dp->name_position; ?>" title="Hanya Admin Yang Dapat Mengubah Jabatan" readonly></td>
                <td></td>
              </tr>
              <tr>
                <td>Ganti Password</td>
                <td><input class="form-control" type="password" name="ps1" placeholder="Masukan Password Baru"></td>
                <td><input class="form-control" type="password" name="ps2" placeholder="Masukan Password Baru Lagi"></td>
              </tr>                               
            </table>
          </div>
             <div class="card-footer">                  
                <center><input class="btn btn-success" type="submit" name="submit" value="Simpan"></center>
              </div>                
        </div>
       
      </div>
      <br>
      <br>
      <br>
      <br>
    </div> <!-- /container -->