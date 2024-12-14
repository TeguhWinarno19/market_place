<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container-fluid">
    <div class="card mb-2">
        <div class="card-body">
            <h4>Admin Dashboard</h4>
            <hr>
            <div class="row mb-2">
                <div class="col-lg-3 col-sm-6 col-12 mb-1">
                    <div class="card border-left-primary">
                        <div class="card-body">
                            <h5 class=" text-primary"><strong>Total User</strong></h5>
                            <h5><?= $total_pengguna ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 mb-1">
                    <div class="card border-left-success">
                        <div class="card-body">
                            <h5 class=" text-success"><strong>Total Toko</strong></h5>
                            <h5><?= $jumlah_toktok ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 mb-1">
                    <div class="card border-left-warning">
                        <div class="card-body">
                            <h5 class=" text-warning"><strong>Total Barang</strong></h5>
                            <h5><?= $barang_count ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 mb-1">
                    <div class="card border-left-danger">
                        <div class="card-body">
                            <h5 class=" text-danger"><strong>Total Order</strong></h5>
                            <h5><?= $total_barang_pesan ?></h5>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>    
    <div class="card mb-2">
        <div class="card-body">
            <h3>User Management</h3>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4 col-sm-7 col-9 text-center mb-1">
                    <div class="card">
                        <div class="card-body">
                            <h5><small>Pengguna Aktif</small></h5>
                            <canvas id="Chart_user_aktif"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-7 col-9 text-center mb-1">
                    <div class="card">
                        <div class="card-body">
                            <h5><small>Pengguna Role</small></h5>
                            <canvas id="Chart_user_role"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-7 col-9 text-center mb-1">
                    <div class="card">
                        <div class="card-body">
                            <h5><small>Jumlah toko</small></h5>
                            <canvas id="Chart_user_toko"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-4 col-sm-7 col-8 mb-1">
                    <a class="btn btn-block btn-primary" href="<?= base_url('admin/user_management') ?>"><i class="fas fa-user-friends"></i> Ke User Management</a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-7 col-8 mb-1">
                    <a class="btn btn-block btn-primary" href="<?= base_url('admin/shop_management') ?>"><i class="fas fa-store-alt"></i> Ke Shop Management</a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-7 col-8 mb-1">
                    <a class="btn btn-block btn-primary" href="<?= base_url('admin/product_management') ?>"><i class="fas fa-box"></i> Ke Product Management</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <h4><strong>Pesanan</strong></h4>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8 col-sm-9 col-10 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class=" text-center"><strong>Order Status</strong></h5>
                            <hr>
                            <canvas id="Chart_pesanan"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-9 col-10 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <h4><strong>Keterangan : </strong></h4>
                                <table class="table table-stripped table-hover">
                                    <tr>
                                        <th>Menunggu Konfirmasi</th>
                                        <td><?= $menunggu_value ?> <strong>Order</strong></td>
                                    </tr>
                                    <tr>
                                        <th>Diproses</th>
                                        <td><?= $proses_value ?> <strong>Order</strong></td>
                                    </tr>
                                    <tr>
                                        <th>Sedang Dikirim</th>
                                        <td><?= $dikirim_value ?> <strong>Order</strong></td>
                                    </tr>
                                    <tr>
                                        <th>Tiba Tujuan</th>
                                        <td><?= $tiba_value ?> <strong>Order</strong></td>
                                    </tr>
                                    <tr>
                                        <th>Selesai</th>
                                        <td><?= $selesai_value ?> <strong>Order</strong></td>
                                    </tr>
                                    <tr>
                                        <th>Batal</th>
                                        <td><?= $batal_value ?> <strong>Order</strong></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
            <div class="card">
                <div class="card-body">
                    <h2><strong>Top Selling Items</strong></h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Top</th>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Nama Toko</th>
                                    <th>Total Terjual</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $top = 0; ?>
                                <?php foreach ($top_selling_items as $item): ?>
                                <?php if ($top < 3) {?>
                                <tr>
                                    <td class="text-center">
                                        <strong>
                                        <?php
                                        if ($top == 0){
                                    echo "#1 <i class='fas fa-trophy' style='color: gold;''></i>";
                                        } else if($top == 1){
                                            echo "#2 <i class='fas fa-medal' style='color: silver;''></i>";
                                        }
                                        else {
                                            echo "#3 <i class='fas fa-award' style='color: #cd7f32;'></i>";
                                        }
                                        ?>
                                        </strong>
                                    </td>
                                    <td><p><?= $item['id_barang']; ?></p></td>
                                    <td><p><?= $item['nama_barang']; ?></p></td>
                                    <td><p><?= $item['nama_toko']; ?></p></td>
                                    <td class="text-center"><?= $item['total_terjual']; ?> pcs </td>
                                </tr>
                                <?php $top++; ?>
                                <?php } ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <a href="#">Lihat Data Penjualan >></a>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Data untuk Chart Pengguna Aktif
        const labels_user_aktif = <?php echo $labels_user_aktif; ?>;
        const values_user_aktif = <?php echo $values_user_aktif; ?>;

        // Konfigurasi Chart Pengguna Aktif
        const ctx_user_aktif = document.getElementById('Chart_user_aktif').getContext('2d');
        const donutChartUserAktif = new Chart(ctx_user_aktif, {
            type: 'doughnut',
            data: {
                labels: labels_user_aktif,
                datasets: [{
                    data: values_user_aktif,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    tooltip: {
                        enabled: true,
                    }
                }
            }
        });

        // Data untuk Chart Pengguna Role
        const labels_user_role = <?php echo $labels_user_role; ?>;
        const values_user_role = <?php echo $values_user_role; ?>;

        // Konfigurasi Chart Pengguna Role
        const ctx_user_role = document.getElementById('Chart_user_role').getContext('2d');
        const donutChartUserRole = new Chart(ctx_user_role, {
            type: 'doughnut',
            data: {
                labels: labels_user_role,
                datasets: [{
                    data: values_user_role,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    tooltip: {
                        enabled: true,
                    }
                }
            }
        });
        
        // Data untuk Chart Pengguna Role
        const labels_user_toko = <?php echo $labels_user_toko; ?>;
        const values_user_toko = <?php echo $values_user_toko; ?>;

        // Konfigurasi Chart Pengguna Role
        const ctx_user_toko = document.getElementById('Chart_user_toko').getContext('2d');
        const donutChartUserToko = new Chart(ctx_user_toko, {
            type: 'doughnut',
            data: {
                labels: labels_user_toko,
                datasets: [{
                    data: values_user_toko,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    tooltip: {
                        enabled: true,
                    }
                }
            }
        });
        const labels_pesanan = <?php echo $labels_pesanan; ?>;
        const values_pesanan = <?php echo $values_pesanan; ?>;

        // Konfigurasi Chart Pengguna Role
        const ctx_pesanan = document.getElementById('Chart_pesanan').getContext('2d');
        const donutChartpesanan = new Chart(ctx_pesanan, {
            type: 'doughnut',
            data: {
                labels: labels_pesanan,
                datasets: [{
                    data: values_pesanan,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56','#48B626',"#CC6CE7",'#F44336'],
                    hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56',"#48B626","CC6CE7", '#F44336']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                    },
                    tooltip: {
                        enabled: true,
                    }
                }
            }
        });
    </script>
</div>
