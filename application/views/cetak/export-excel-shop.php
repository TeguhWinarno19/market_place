<?php

header('Content-type: application/vnd-ms-excel');
header('Content-Disposition: attachment; filename="' . $title . '.xls"');
header('Pragma: no-cache');
header('Expires:0');

?>
<h3><center>Laporan Data Barang</center></h3>
<br/>
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama toko</th>
            <th>Pemilik</th>
            <th>Status</th>
            <th>Kota</th>
            <th>Bank</th>
            <th>Rekening</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no = 1; 
    foreach($toko as $p){ 
    ?>
    <tr>
        <th scope="row"><?= $no++; ?></th> 
        <td><?= $p['nama_toko']; ?></td>
        <td><?= $p['nama']; ?></td>
        <td>
            <?php if($p['status'] == 0){
                echo "aktif";
            } else {
                echo "tidak aktif";
            }                
            ?>
        </td>
        <td><?= $p['kota']; ?></td>
        <td><?= $p['bank']; ?></td>
        <td><?= $p['no_rekening']; ?></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
