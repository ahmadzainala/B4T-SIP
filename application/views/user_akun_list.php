
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='table-responsive'>
                  <h3 class='box-title'>USER_AKUN LIST <?php echo anchor('user_akun/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('user_akun/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('user_akun/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		 </h3>
                </div><!-- /.box-header -->
                 <div class='table-responsive'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Username</th>
		    <th>Password</th>
		    <th>Name</th>
		    <th>Id Position</th>
            <th>Id Division</th>
            <th>Date Create</th>
            <th>Date Expired</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($user_akun_data as $user_akun)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $user_akun->username ?></td>
		    <td><?php echo $user_akun->password ?></td>
		    <td><?php echo $user_akun->name ?></td>
		    <td><?php echo $user_akun->id_position ?></td>
            <td><?php echo $user_akun->id_division ?></td>
            <td><?php echo $user_akun->date_create ?></td>
		    <td><?php echo $user_akun->date_expired ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('user_akun/read/'.$user_akun->id_user),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('user_akun/update/'.$user_akun->id_user),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('user_akun/delete/'.$user_akun->id_user),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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