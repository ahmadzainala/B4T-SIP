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
        <h2>User_akun List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Username</th>
		<th>Password</th>
		<th>Name</th>
		<th>Id Position</th>
        <th>Id Division</th>
        <th>Date Create</th>
		<th>Date Expired</th>
		
            </tr><?php
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
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>