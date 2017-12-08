<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='table-responsive'>
                
                  <h3 class='box-title'>SUPPLIER_CATEGORY</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Name Category <?php echo form_error('id_category') ?></td>
        <td>
          <?php echo get_select_other_field_from_key('items_category','name_category','id_category',$id_category) ?>
        </td>
      <tr><td>Name Supplier <?php echo form_error('id_supplier') ?></td>
        <td>
          <?php echo get_select_other_field_from_key('supplier','name_supplier','id_supplier',$id_supplier) ?>
        </td>
	    <input type="hidden" name="id_supplier_category" value="<?php echo $id_supplier_category; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('supplier_category') ?>" class="btn btn-default">Back</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->