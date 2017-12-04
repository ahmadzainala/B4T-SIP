<!doctype html>
<html>
    <head>
        <title>Lembar Pengajuan Permintaan Pengadaan</title>
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

        <table width="100%">
            <tr>
                <td>Nama Kegiatan</td>
                <td>:</td>
                <td><?php echo $form_data->name_activity;?></td>
                <td>
                    <?php 
                        $date = explode(" ",$form_data->date); 
                        echo "Tgl. Diajukan : ";
                        $date = explode(" ",$form_data->date); 
                        echo $date[0];
                    ?>
                </td>
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
                <td>Diperlukan Tanggal</td>
                <td>:</td>
                <td><?php echo $form_data->date_needs;?></td>
            </tr>
        </table>

        <br><br><br>

        <table class="word-table" style="margin-bottom: 10px">
            <thead>
                <tr>
                    <th>No</th>     
                    <th>Kategori Barang</th>     
                    <th>Barang atau Jasa</th>     
                    <th>Qty</th>        
                    <th>Keterangan</th>        
                </tr>
            </thead>
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

        <table class="word-table" border="1">
            <tr>
                <td><b>Sumber Anggaran :</b> <?php echo $form_data->name_source; ?></td>
            </tr>
            <tr>
                <td>
                    <b>Keterangan : </b><br>
                    <?php echo $form_data->information;?>
                </td>
            </tr>
        </table>
        <br>
        <table  class="word-table" border="1">
            <tr>
                <td>
                    <b>Catatan Kabid :</b><br>
                    <?php
                        if($form_data->information_kabid!=''){
                            echo $form_data->information_kabid;
                        }
                    ?>
                </td>
            </tr>
        </table>

        <br>

        <table class="word-table">
            <tr>
                <td><b>Catatan Bagian Tata Usaha</b></td>
            </tr>
            <tr>
                <?php 
                    if ($form_data->read_status_TU != 0 && $form_data->information_TU != "") {
                ?>
                        <td>
                            Permintaan telah diterima pada tanggal : 
                            <?php echo $form_acc->date_acc;?>
                        </td>
            </tr>
            <tr>
                        <td>
                            Rekomendasi / Catatan Kabag Tata usaha : <br>
                            <?php echo $form_data->information_TU; ?>
                        </td>
                <?php
                    }
                ?> 
            </tr>
        </table>

        <br>

        <table class="word-table">
            <?php  if ($form_data->read_status_PPK != 0 && $form_data->information_PPK != "") { ?>
                <tr>
                    <td><b>Catatan Pejabat Pembuat Komitmen :</b> <br>
                        <?php echo $form_data->information_PPK; ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
</body>
</html>