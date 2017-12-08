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
        <h2>Supplier_category List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Category</th>
		<th>Id Supplier</th>
		
            </tr><?php
            foreach ($supplier_category_data as $supplier_category)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $supplier_category->id_category ?></td>
		      <td><?php echo $supplier_category->id_supplier ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>