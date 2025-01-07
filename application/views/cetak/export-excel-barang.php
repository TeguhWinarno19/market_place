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
            <th>Nama Barang</th>
            <th>Keterangan</th>
            <th>stok</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no = 1; 
    foreach($barang as $b){ 
    ?>
    <tr>
        <th scope="row"><?= $no++; ?></th> 
        <td><?= $b['nama_barang']; ?></td>
        <td><?= $b['keterangan']; ?></td>
        <td><?= $b['stok']; ?></td>
        <td><?= $b['harga']; ?></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
