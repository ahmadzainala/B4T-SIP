<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='table-responsive'>
                
                  <h3 class='box-title'>USER_AKUN</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Username <?php echo form_error('username') ?></td>
            <td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </td>
	    <tr><td>Password <?php echo form_error('password') ?></td>
            <td><input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </td>
	    <tr><td>Name <?php echo form_error('name') ?></td>
            <td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </td>
	    <tr><td>Position <?php echo form_error('id_position') ?></td>
        <td>
        <?php echo get_select_other_field_from_key('position','name_position','id_position',$id_position)?>
        </td>
      <tr><td>Division <?php echo form_error('id_division') ?></td>
          <td>
          <?php echo get_select_other_field_from_key('division','name_division','id_division',$id_division)?>
             
        </td>
      <tr><td>Date Expired <?php echo form_error('date_expired') ?></td>
            <td><input type="date" class="form-control" name="date_expired" id="date_expired" placeholder="Expired..." value="<?php echo $date_expired; ?>" />
        </td>
	    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user_akun') ?>" class="btn btn-default">Back</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->