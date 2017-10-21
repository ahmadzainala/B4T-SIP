<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>ITEMS_DETAIL</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Category <?php echo form_error('id_category') ?></td>
            <td>
              <?php echo cmb_dinamis('id_category', 'items_category', 'name_category', 'id_category', $id_category); ?>
              <!--
              <input type="text" class="form-control" name="id_category" id="id_category" placeholder="Id Category" value="<?php echo $id_category; ?>" />
        !-->
        </td>
	    <tr><td>Name Items <?php echo form_error('name_items') ?></td>
            <td><input type="text" class="form-control" name="name_items" id="name_items" placeholder="Name Items" value="<?php echo $name_items; ?>" />
        </td>
	    <input type="hidden" name="id_items_detail" value="<?php echo $id_items_detail; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('items_detail') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->