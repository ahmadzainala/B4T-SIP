
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='table-responsive'>
                  <h3 class='box-title'>TRACKING_HISTORY LIST 
		<?php echo anchor(site_url('tracking_history/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('tracking_history/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		 </h3>
                </div><!-- /.box-header -->
                 <div class='table-responsive'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Id Tracking</th>
            <th>Name User Acc</th>
            <th>Position</th>
		    <th>Division</th>
		    <th>Date Acc</th>
		    <th>Acc</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($tracking_history_data as $tracking_history)
            {
                    $acc = $tracking_history->acc==1?'DITERIMA':'DITOLAK';
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $tracking_history->id_tracking ?></td>
            <td><?php echo $tracking_history->name ?></td>
            <td><?php echo $tracking_history->name_position ?></td>
		    <td><?php echo $tracking_history->name_division ?></td>
		    <td><?php echo $tracking_history->date_acc ?></td>
		    <td><?php echo $acc ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('tracking_history/read/'.$tracking_history->id_catalog),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('tracking_history/delete/'.$tracking_history->id_catalog),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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