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
        <h2>Tracking_history List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Tracking</th>
		<th>Id User Acc</th>
		<th>Date Acc</th>
		<th>Acc</th>
		
            </tr><?php
            foreach ($tracking_history_data as $tracking_history)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tracking_history->id_tracking ?></td>
		      <td><?php echo $tracking_history->id_user_acc ?></td>
		      <td><?php echo $tracking_history->date_acc ?></td>
		      <td><?php echo $tracking_history->acc ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>