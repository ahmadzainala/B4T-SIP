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
        <h3><p align="center">Lembar Pengajuan Barang dan Jasa</p></h3>
        <p align="right"> 
            <?php 
                $date = explode(" ",$form_data->date); 
                echo date('d F Y', strtotime($date[0]));
            ?>
        </p>
        <table>
            <tr>
                <td>Nama Kegiatan</td>
                <td>:</td>
                <td><?php echo $form_data->name_activity;?></td>
            </tr>
            <tr>
                <td>Kepada</td>
                <td>:</td>
                <td>Kepala B4T,u.p. Kepala Bagian Tata Usaha</td>
            </tr>
            <tr>
                <td>Dari</td>
                <td>:</td>
                <td><?php echo $form_data->name.' ('.$divisi->name_division.')'; ?></td>
            </tr>
            <tr>
                <td>Agar</td>
                <td>:</td>
                <td><?php echo $form_data->that;?></td>
            </tr>
            <tr>
                <td>Tanggal Diperlukan</td>
                <td>:</td>
                <td><?php echo $form_data->date_needs;?></td>
            </tr>
        </table>
        <br><br><br>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>     
                <th>Kategori Barang</th>     
                <th>Barang atau Jasa</th>     
                <th>Qty</th>        
            </tr>
            <!--Isi nama barang-->
            <tbody>   
                <?php
                  $no = 1;
                  if($item_list != ""){
                    foreach ($item_list as $barang) {
                        if ($barang->status_acc == 1) {
                            $status = "Acc.";
                        }else{
                            $status = "Tidak di Acc.";
                        }
                        echo "<tr>";
                            echo "<td>$no</td>";
                            echo "<td>$barang->name_category</td>";
                            echo "<td> $barang->name_items </td>";
                            echo "<td> $barang->quantity $barang->unit</td>";
                            if ($this->session->userdata('id_division') != 5) {
                                echo "<td align='center'>$status</td>";
                            }
                        echo "</tr>";
                        $no++;
                    }
                  }else{
                    echo "<tr><td></td><td></td><td>Belum ada item yang akan dipesan</td><td></td><td></td></tr>";
                  }
                ?>   
              </tbody>
        </table>

        <br>
        <p>Sumber Anggaran : <?php $form_data->name_source; ?> </p>
        <p>Keterangan : </p>
        <p><?php echo $form_data->information;?></p>
        <p>
            <?php
                if($form_data->information_kabid!=''){
                    echo 'Tambahan kabid: '.$form_data->information_kabid;
                }
            ?>
        </p>
        <?php
            if ($form_data->read_status_TU != 0 && $form_data->information_TU != "") {
        ?>
                <p>Permintaan telah diterima oleh Kabag Tata Usaha pada tanggal <?php echo $form_acc->date_acc;?> </p>
                <p>Rekomendasi / Catatan Kabag Tata usaha : </p>
                <p><?php echo $form_data->information_TU; ?></p>
        <?php
            }

            if ($form_data->read_status_PPK != 0 && $form_data->information_PPK != "") {
        ?>
                <p>Catatan Pejabat Pembuat Komitmen :</p>
                <p><?php echo $form_data->information_PPK; ?></p>
        <?php
            }
        ?>
</body>
</html>