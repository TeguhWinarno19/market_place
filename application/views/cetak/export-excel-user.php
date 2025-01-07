<?php

header('Content-type: application/vnd-ms-excel');
header('Content-Disposition: attachment; filename="' . $title . '.xls"');
header('Pragma: no-cache');
header('Expires:0');

?>
<h3><center>Laporan Data Pengguna</center></h3>
<br/>
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Nama Email</th>
            <th>No Telepon</th>
            <th>Role</th>
            <th>Waktu Daftar</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no = 1; 
    foreach($pengguna as $b){ 
    ?>
    <tr>
        <th scope="row"><?= $no++; ?></th> 
        <td><?= $b['nama']; ?></td>
        <td><?= $b['email']; ?></td>
        <td><?= $b['no_telepon']; ?></td>
        <td>
            <?php if($b['role'] == "1"){
                echo "Admin";
            } else {
                echo "User";
            } ?>
        </td>
        <td>
            <?= date('d F Y', $b['waktu_daftar']); ?>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>
