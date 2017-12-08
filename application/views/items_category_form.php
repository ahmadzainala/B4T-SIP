<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='table-responsive'>
                
                  <h3 class='box-title'>ITEMS_CATEGORY</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Name Category <?php echo form_error('name_category') ?></td>
            <td><input type="text" class="form-control" name="name_category" id="name_category" placeholder="Name Category" value="<?php echo $name_category; ?>" />
        </td>
	    <input type="hidden" name="id_category" value="<?php echo $id_category; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('items_category') ?>" class="btn btn-default">Back</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->