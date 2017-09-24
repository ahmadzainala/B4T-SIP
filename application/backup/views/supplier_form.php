<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>SUPPLIER</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Supplier Category <?php echo form_error('id_supplier_category') ?></td>
            <td><input type="text" class="form-control" name="id_supplier_category" id="id_supplier_category" placeholder="Id Supplier Category" value="<?php echo $id_supplier_category; ?>" />
        </td>
	    <tr><td>Name Supplier <?php echo form_error('name_supplier') ?></td>
            <td><input type="text" class="form-control" name="name_supplier" id="name_supplier" placeholder="Name Supplier" value="<?php echo $name_supplier; ?>" />
        </td>
	    <tr><td>Alamat <?php echo form_error('alamat') ?></td>
            <td><textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </td></tr>
	    <input type="hidden" name="id_supplier" value="<?php echo $id_supplier; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('supplier') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->