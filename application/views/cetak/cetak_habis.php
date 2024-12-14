<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        Print Barang Habis
    </title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
    <h3><strong>List Barang Habis</strong></h3>
    <hr>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Keterangan</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($barang_kritis)) {?>
            <?php $no = 1 ?>
            <?php foreach($barang_kritis as $b) :?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $b->nama_barang ?></td>
                <td><?= $b->keterangan ?></td>
                <td><?= $b->stok ?></td>
                <td><?= $b->harga ?></td>
            </tr>
            <?php $no++ ?>
            <?php endforeach; ?>
            <?php } ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print(); 
    </script>
</body>
</html>