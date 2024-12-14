<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <style type="text/css">
    .table-data{ width: 100%; border-collapse: collapse; } 
    .table-data tr th, 
    .table-data tr td{ 
        border:1px solid black; 
        font-size: 11pt; 
        font-family:Verdana; 
        padding: 10px 10px 10px 10px; 
    } 
    .table-data th{ background-color:grey; } 
    h3{ font-family:Verdana; } 
</style>
</head>
<body>
    <h3><center>Data Barang</center></h3>
    <hr>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Keterangan</th>
                <th>Qty</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach($barang as $b) :?>
            <tr>
                <td scope="row"><?= $no ?></td>
                <td><?= $b->nama_barang ?></td>
                <td><?= $b->keterangan ?></td>
                <td><?= $b->stok ?></td>
                <td><?= $b->harga ?></td>
                <?php $no++ ?>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print(); 
    </script>
    
</body>
</html>