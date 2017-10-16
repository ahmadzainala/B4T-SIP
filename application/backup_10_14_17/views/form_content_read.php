
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Form_content Read</h3>
        <table class="table table-bordered">
	    <tr><td>Id Form</td><td><?php echo $id_form; ?></td></tr>
	    <tr><td>Id Items Detail</td><td><?php echo $id_items_detail; ?></td></tr>
	    <tr><td>Id Supplier</td><td><?php echo $id_supplier; ?></td></tr>
	    <tr><td>Quantity</td><td><?php echo $quantity; ?></td></tr>
	    <tr><td>Status Acc</td><td><?php echo $status_acc; ?></td></tr>
	    <tr><td>Unit</td><td><?php echo $unit; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('form_content') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->