
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='table-responsive'>
                <h3 class='box-title'>User_akun Read</h3>
        <table class="table table-bordered">
      <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Id Position</td><td><?php echo $id_position; ?></td></tr>
      <tr><td>Id Division</td><td><?php echo $id_division; ?></td></tr>
      <tr><td>Date Create</td><td><?php echo $date_create; ?></td></tr>
	    <tr><td>Date Expired</td><td><?php echo $date_expired; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('user_akun') ?>" class="btn btn-default">Back</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->