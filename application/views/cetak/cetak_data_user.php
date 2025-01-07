<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
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
    <h3><center>Data User</center></h3>
    <hr>
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Role</th>
                <th>Waktu Daftar</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach($pengguna as $p) :?>
            <tr>
                <td scope="row"><?= $no ?></td>
                <td><?= $p->nama ?></td>
                <td><?= $p->email ?></td>
                <td><?= $p->no_telepon ?></td>
                <td>
                    <?php if($p->role == "1"){
                    echo "Admin";
                    } else{
                        echo "User"; 
                    }?>
                </td>
                <td>
                <p class="card-text"><small class="text-muted"><?= date('d F Y', $p->waktu_daftar); ?></small></p>
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