
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='table-responsive'>
                  <h3 class='box-title'>MENU_ADMIN LIST <?php echo anchor('menu_admin/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('menu_admin/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('menu_admin/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		 </h3>
                </div><!-- /.box-header -->
                 <div class='table-responsive'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Name</th>
		    <th>Link</th>
		    <th>Icon</th>
		    <th>Is Active</th>
		    <th>Is Parent</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($menu_admin_data as $menu_admin)
            {
                $active = $menu_admin->is_active==1?'AKTIF':'TIDAK AKTIF';
                $parent = $menu_admin->is_parent>1?'SUBMENU':'MENU'
                
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $menu_admin->name ?></td>
		    <td><?php echo $menu_admin->link ?></td>
		    <td><i class='<?php echo $menu_admin->icon ?>'></td>
		    <td><?php echo $active ?></td>
            <td><?php echo $parent ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('menu_admin/read/'.$menu_admin->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('menu_admin/update/'.$menu_admin->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('menu_admin/delete/'.$menu_admin->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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