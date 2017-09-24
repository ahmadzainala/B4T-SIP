
    <!-- Main -->
    <div class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h1 class="display-3">Sistem Informasi Pengadaan Barang dan Jasa</h1>
          </div>
          <div class="col-md-1">        
          </div>
          <div class="col-md-3" style="padding-top: 20px">            
            <form action="<?php echo base_url(); ?>/Login/validation" method="POST">
              <table border=0>
                <th><h3>Login</h3></th>
                <tr height="50px">
                    <td><input class="form-control" type="user" name="username" placeholder="Username" maxlength="40" size="40"></td>
                </tr>
                <tr height="50px">
                    <td><input class="form-control" type="password" name="password" placeholder="Password" maxlength="40" size="40"></td>
                </tr>
              </table>
              <hr>
              <table border=0>
                <tr>
                  <td><input class="btn btn-success" type="submit" name="submit" value="Login"></td>
                  <td><input class="btn btn-warning" type="submit" name="submit" value="Lupa Password"></td>
                </tr>                            
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
