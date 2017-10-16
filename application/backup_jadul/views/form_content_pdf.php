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
        <h2>Form_content List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Form</th>
		<th>Id Items Detail</th>
		<th>Id Supplier</th>
		<th>Quantity</th>
		
            </tr><?php
            foreach ($form_content_data as $form_content)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $form_content->id_form ?></td>
		      <td><?php echo $form_content->id_items_detail ?></td>
		      <td><?php echo $form_content->id_supplier ?></td>
		      <td><?php echo $form_content->quantity ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>