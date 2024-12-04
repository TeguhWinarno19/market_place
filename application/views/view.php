<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="YOUR_CLIENT_KEY"></script>
</head>
<body>
    <h3>Total Harga: Rp <?= number_format($total_price, 0, ',', '.'); ?></h3>
    <button id="pay-button">Bayar Sekarang</button>

    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function () {
            snap.pay('<?= $snapToken; ?>', {
                onSuccess: function(result){ 
                    console.log(result);
                    alert("Transaksi sukses!"); 
                    window.location.href = '<?= base_url("payment/finish"); ?>';
                },
                onPending: function(result){ 
                    console.log(result);
                    alert("Transaksi pending, selesaikan di Midtrans.");
                },
                onError: function(result){ 
                    console.log(result);
                    alert("Terjadi kesalahan pada pembayaran.");
                }
            });
        };
    </script>
</body>
</html>
