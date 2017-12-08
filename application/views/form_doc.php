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
        <h2>Form List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
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
		
            </tr><?php
            foreach ($form_data as $form)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $form->name ?></td>
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
		      <td><?php echo $form->name_source ?></td>
		      <td><?php echo $form->name_activity ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>