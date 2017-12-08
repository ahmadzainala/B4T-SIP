<!doctype html>
<html>
    <head>
        <title>Tabel-Admin</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Menu_admin List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Link</th>
		<th>Icon</th>
		<th>Is Active</th>
		<th>Is Parent</th>
		
            </tr><?php
            foreach ($menu_admin_data as $menu_admin)
            {
                $active = $menu_admin->is_active==1?'AKTIF':'TIDAK AKTIF';
                $parent = $menu_admin->is_parent>1?'MAINMENU':'SUBMENU'
                
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $menu_admin->name ?></td>
		      <td><?php echo $menu_admin->link ?></td>
		      <td><?php echo $menu_admin->icon ?></td>
		      <td><?php echo $active ?></td>
		      <td><?php echo $parent ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>