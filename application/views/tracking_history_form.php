<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>TRACKING_HISTORY</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Tracking <?php echo form_error('id_tracking') ?></td>
            <td><input type="text" class="form-control" name="id_tracking" id="id_tracking" placeholder="Id Tracking" value="<?php echo $id_tracking; ?>" />
        </td>
	    <tr><td>Id User Acc <?php echo form_error('id_user_acc') ?></td>
            <td><input type="text" class="form-control" name="id_user_acc" id="id_user_acc" placeholder="Id User Acc" value="<?php echo $id_user_acc; ?>" />
        </td>
	    <tr><td>Date Acc <?php echo form_error('date_acc') ?></td>
            <td><input type="text" class="form-control" name="date_acc" id="date_acc" placeholder="Date Acc" value="<?php echo $date_acc; ?>" />
        </td>
	    <tr><td>Acc <?php echo form_error('acc') ?></td>
            <td><input type="text" class="form-control" name="acc" id="acc" placeholder="Acc" value="<?php echo $acc; ?>" />
        </td>
	    <input type="hidden" name="id_catalog" value="<?php echo $id_catalog; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tracking_history') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->