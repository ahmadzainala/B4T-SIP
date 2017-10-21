<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>FORM</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id User <?php echo form_error('id_user') ?></td>
            <td><input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </td>
	    <tr><td>Date <?php echo form_error('date') ?></td>
            <td><input type="text" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo $date; ?>" />
        </td>
	    <tr><td>Information <?php echo form_error('information') ?></td>
            <td><textarea class="form-control" rows="3" name="information" id="information" placeholder="Information"><?php echo $information; ?></textarea>
        </td></tr>
	    <tr><td>Information Kabid <?php echo form_error('information_kabid') ?></td>
            <td><textarea class="form-control" rows="3" name="information_kabid" id="information_kabid" placeholder="Information Kabid"><?php echo $information_kabid; ?></textarea>
        </td></tr>
	    <tr><td>Information TU <?php echo form_error('information_TU') ?></td>
            <td><textarea class="form-control" rows="3" name="information_TU" id="information_TU" placeholder="Information TU"><?php echo $information_TU; ?></textarea>
        </td></tr>
	    <tr><td>Information PPK <?php echo form_error('information_PPK') ?></td>
            <td><textarea class="form-control" rows="3" name="information_PPK" id="information_PPK" placeholder="Information PPK"><?php echo $information_PPK; ?></textarea>
        </td></tr>
	    <tr><td>Date Needs <?php echo form_error('date_needs') ?></td>
            <td><input type="text" class="form-control" name="date_needs" id="date_needs" placeholder="Date Needs" value="<?php echo $date_needs; ?>" />
        </td>
	    <tr><td>That <?php echo form_error('that') ?></td>
            <td><textarea class="form-control" rows="3" name="that" id="that" placeholder="That"><?php echo $that; ?></textarea>
        </td></tr>
	    <tr><td>Read Status Ketua <?php echo form_error('read_status_Ketua') ?></td>
            <td><input type="text" class="form-control" name="read_status_Ketua" id="read_status_Ketua" placeholder="Read Status Ketua" value="<?php echo $read_status_Ketua; ?>" />
        </td>
	    <tr><td>Read Status TU <?php echo form_error('read_status_TU') ?></td>
            <td><input type="text" class="form-control" name="read_status_TU" id="read_status_TU" placeholder="Read Status TU" value="<?php echo $read_status_TU; ?>" />
        </td>
	    <tr><td>Read Status PPK <?php echo form_error('read_status_PPK') ?></td>
            <td><input type="text" class="form-control" name="read_status_PPK" id="read_status_PPK" placeholder="Read Status PPK" value="<?php echo $read_status_PPK; ?>" />
        </td>
	    <tr><td>Status Submit <?php echo form_error('status_submit') ?></td>
            <td><input type="text" class="form-control" name="status_submit" id="status_submit" placeholder="Status Submit" value="<?php echo $status_submit; ?>" />
        </td>
	    <tr><td>Id Budget <?php echo form_error('id_budget') ?></td>
            <td><input type="text" class="form-control" name="id_budget" id="id_budget" placeholder="Id Budget" value="<?php echo $id_budget; ?>" />
        </td>
	    <tr><td>Name Activity <?php echo form_error('name_activity') ?></td>
            <td><input type="text" class="form-control" name="name_activity" id="name_activity" placeholder="Name Activity" value="<?php echo $name_activity; ?>" />
        </td>
	    <input type="hidden" name="id_form" value="<?php echo $id_form; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('form') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->