<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
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
		<th>First Name</th>
		<th>Last Name</th>
		<th>Id Position</th>
		<th>Id Division</th>
		
            </tr><?php
            foreach ($user_akun_data as $user_akun)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $user_akun->username ?></td>
		      <td><?php echo $user_akun->password ?></td>
		      <td><?php echo $user_akun->first_name ?></td>
		      <td><?php echo $user_akun->last_name ?></td>
		      <td><?php echo $user_akun->id_position ?></td>
		      <td><?php echo $user_akun->id_division ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>