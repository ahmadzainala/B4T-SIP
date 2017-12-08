
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>FORM LIST <?php echo anchor('form/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('form/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('form/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('form/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table-responsive table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Id User</th>
		    <th>Date</th>
		    <th>Information</th>
		    <th>Information Kabid</th>
		    <th>Information TU</th>
		    <th>Information PPK</th>
		    <th>Date Needs</th>
		    <th>That</th>
		    <th>Read Status Ketua</th>
		    <th>Read Status TU</th>
		    <th>Read Status PPK</th>
		    <th>Status Submit</th>
		    <th>Id Budget</th>
		    <th>Name Activity</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($form_data as $form)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $form->id_user ?></td>
		    <td><?php echo $form->date ?></td>
		    <td><?php echo $form->information ?></td>
		    <td><?php echo $form->information_kabid ?></td>
		    <td><?php echo $form->information_TU ?></td>
		    <td><?php echo $form->information_PPK ?></td>
		    <td><?php echo $form->date_needs ?></td>
		    <td><?php echo $form->that ?></td>
		    <td><?php echo $form->read_status_Ketua ?></td>
		    <td><?php echo $form->read_status_TU ?></td>
		    <td><?php echo $form->read_status_PPK ?></td>
		    <td><?php echo $form->status_submit ?></td>
		    <td><?php echo $form->id_budget ?></td>
		    <td><?php echo $form->name_activity ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('form/read/'.$form->id_form),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('form/update/'.$form->id_form),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('form/delete/'.$form->id_form),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->