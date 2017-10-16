    

    <div class="container" style="padding-top: 70px">
      <div class="card">
        <h4 class="card-header"><i class="material-icons">person</i> Edit Profile</h4>
        <div class="card-body">
          <form action='<?php echo base_url(); ?>User_akun/submit_profile' method='POST'>
            <table class="table borderless">
              <tr>
                <td width="15%">Username</td>
                <td><input class="form-control" type="text" name="username" placeholder="<?php echo $this->session->userdata('username'); ?>" readonly></td>
                <td></td>
                <td width="20%"></td>
              </tr>
              <tr>
                <td>Nama Awal</td>
                <td><input class="form-control" type="text" name="first_name" placeholder="<?php echo $this->session->userdata('first_name'); ?>"></td>
                <td></td>
                <td width="20%"></td>
              </tr>
              <tr>
                <td>Nama Akhir</td>
                <td><input class="form-control" type="text" name="last_name" placeholder="<?php echo $this->session->userdata('last_name'); ?>"></td>
                <td></td>
                <td width="20%"></td>
              </tr>
              <tr>
                <td>Bidang</td>
                <td><input class="form-control" type="text" name="division" placeholder="<?php echo $name_dp->name_division; ?>" readonly></td>
                <td></td>
                <td width="20%"></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td><input class="form-control" type="text" name="position" placeholder="<?php echo $name_dp->name_position; ?>" readonly></td>
                <td></td>
                <td width="20%"></td>
              </tr>
              <tr>
                <td>Ganti Password</td>
                <td><input class="form-control" type="password" name="ps1" placeholder="Masukan password baru"></td>
                <td><input class="form-control" type="password" name="ps2" placeholder="Masukan password baru lagi"></td>
              </tr>                               
            </table>
          </div>
             <div class="card-footer">                  
                <center><input class="btn btn-success" type="submit" name="submit" value="Simpan"></center>
              </div>      
          </form>          
        </div>
       
      </div>
      <br>
      <br>
      <br>
      <br>
    </div> <!-- /container -->

