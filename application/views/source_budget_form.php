<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='table-responsive'>
                
                  <h3 class='box-title'>SOURCE_BUDGET</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Name Source <?php echo form_error('name_source') ?></td>
            <td><input type="text" class="form-control" name="name_source" id="name_source" placeholder="Name Source" value="<?php echo $name_source; ?>" />
        </td>
	    <input type="hidden" name="id_budget" value="<?php echo $id_budget; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('source_budget') ?>" class="btn btn-default">Back</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->