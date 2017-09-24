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
        <h2>Tracking_catalog List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Tracking</th>
		<th>Id User Acc</th>
		<th>Date Acc</th>
		<th>Acc</th>
		
            </tr><?php
            foreach ($tracking_catalog_data as $tracking_catalog)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tracking_catalog->id_tracking ?></td>
		      <td><?php echo $tracking_catalog->id_user_acc ?></td>
		      <td><?php echo $tracking_catalog->date_acc ?></td>
		      <td><?php echo $tracking_catalog->acc ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>