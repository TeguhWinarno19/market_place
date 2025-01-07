<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Toko</title>
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
    <h3><center>Data Toko</center></h3>
    <hr>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Toko</th>
                <th>Pemilik</th>
                <th>Kota</th>
                <th>Status</th>
                <th>Waktu Daftar</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach($shop as $s) :?>
            <tr>
                <td scope="row"><?= $no ?></td>
                <td><?= $s->nama_toko ?></td>
                <td><?= $s->nama ?></td>
                <td><?= $s->kota ?></td>
                <td>
                    <?php if($s->status == "1"){
                    echo "Nonaktif";
                    } else{
                        echo "Aktif"; 
                    }?>
                </td>
                <td>
                <p class="card-text"><small class="text-muted"><?= date('d F Y', $s->waktu_daftar); ?></small></p>
                </td>
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