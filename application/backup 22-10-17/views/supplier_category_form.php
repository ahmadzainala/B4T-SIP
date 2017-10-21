<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>SUPPLIER_CATEGORY</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Category <?php echo form_error('id_category') ?></td>
            <td><input type="text" class="form-control" name="id_category" id="id_category" placeholder="Id Category" value="<?php echo $id_category; ?>" />
        </td>
	    <tr><td>Id Supplier <?php echo form_error('id_supplier') ?></td>
            <td><input type="text" class="form-control" name="id_supplier" id="id_supplier" placeholder="Id Supplier" value="<?php echo $id_supplier; ?>" />
        </td>
	    <input type="hidden" name="id_supplier_category" value="<?php echo $id_supplier_category; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('supplier_category') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->