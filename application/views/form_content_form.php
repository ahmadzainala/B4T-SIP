<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='table-responsive'>
                
                  <h3 class='box-title'>FORM_CONTENT</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Form <?php echo form_error('id_form') ?></td>
            <td><input type="text" class="form-control" name="id_form" id="id_form" placeholder="Id Form" value="<?php echo $id_form; ?>" />
        </td>
	    <tr><td>Id Items Detail <?php echo form_error('id_items_detail') ?></td>
            <td><input type="text" class="form-control" name="id_items_detail" id="id_items_detail" placeholder="Id Items Detail" value="<?php echo $id_items_detail; ?>" />
        </td>
	    <tr><td>Id Supplier <?php echo form_error('id_supplier') ?></td>
            <td><input type="text" class="form-control" name="id_supplier" id="id_supplier" placeholder="Id Supplier" value="<?php echo $id_supplier; ?>" />
        </td>
	    <tr><td>Quantity <?php echo form_error('quantity') ?></td>
            <td><input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="<?php echo $quantity; ?>" />
        </td>
	    <tr><td>Status Acc <?php echo form_error('status_acc') ?></td>
            <td><input type="text" class="form-control" name="status_acc" id="status_acc" placeholder="Status Acc" value="<?php echo $status_acc; ?>" />
        </td>
	    <tr><td>Unit <?php echo form_error('unit') ?></td>
            <td><input type="text" class="form-control" name="unit" id="unit" placeholder="Unit" value="<?php echo $unit; ?>" />
        </td>
	    <tr><td>Quantity Origin <?php echo form_error('quantity_origin') ?></td>
            <td><input type="text" class="form-control" name="quantity_origin" id="quantity_origin" placeholder="Quantity Origin" value="<?php echo $quantity_origin; ?>" />
        </td>
	    <input type="hidden" name="id_form_content" value="<?php echo $id_form_content; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('form_content') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->