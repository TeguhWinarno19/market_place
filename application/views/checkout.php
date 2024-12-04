<h3>Detail Pesanan</h3>
<table border="1">
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>ID Toko</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $item['name']; ?></td>
                <td><?= $item['qty']; ?></td>
                <td>Rp <?= number_format($item['price'], 0, ',', '.'); ?></td>
                <td><?= $item['options']['store_id']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<p>Total Ongkir: Rp <?= number_format($total_shipping_cost, 0, ',', '.'); ?></p>
<p>Total Harga (Termasuk Ongkir): Rp <?= number_format($total_price, 0, ',', '.'); ?></p>
