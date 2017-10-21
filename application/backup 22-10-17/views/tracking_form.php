<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>TRACKING</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Status Tracking <?php echo form_error('id_status_tracking') ?></td>
            <td><input type="text" class="form-control" name="id_status_tracking" id="id_status_tracking" placeholder="Id Status Tracking" value="<?php echo $id_status_tracking; ?>" />
        </td>
	    <tr><td>Id Form <?php echo form_error('id_form') ?></td>
            <td><input type="text" class="form-control" name="id_form" id="id_form" placeholder="Id Form" value="<?php echo $id_form; ?>" />
        </td>
	    <input type="hidden" name="id_tracking" value="<?php echo $id_tracking; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tracking') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->