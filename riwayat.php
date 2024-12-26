<?php 
session_start();
$koneksi = new mysqli("localhost", "root", "","db_toko");
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>SIXTEE OLSHOP</title>
</head>
<body>

<!-- NAVBAR -->
<?php include 'navbar.php'; ?>
<br>
<!-- KONTEN -->
<div class="container">
    <h4>Riwayat Belanja</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total Belanja</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php 
        $no = 1;
        $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan']; 
        $ambil = $koneksi->query("SELECT * FROM tb_pembelian WHERE id_pelanggan='$id_pelanggan'");
        while ($pecah = $ambil->fetch_assoc()) {
            $formattedDate = date('d-m-Y', strtotime($pecah['tanggal_pembelian']));
            $formattedPrice = number_format($pecah['total_pembelian'], 0, ',', '.');
        ?>
        <tbody>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $formattedDate; ?></td>
                <td><?php echo "Rp. " . $formattedPrice; ?></td>
                <td><?php echo $pecah['status']; ?></td>
                <td style="text-align: center">
                    <a href="nota.php?id=<?= $pecah['id_pembelian']; ?>" class="btn btn-primary">DETAIL</a>
                    <?php if ($pecah['status'] == 'Menunggu Konfirmasi' || $pecah['status'] == 'Pending') : ?>
                    <a href="javascript:void(0);" 
                        onclick="redirectToWhatsApp(
                            <?= $pecah['id_pembelian']; ?>, 
                            '<?= urlencode($formattedDate); ?>', 
                            '<?= $formattedPrice; ?>')" 
                        class="btn btn-success">BAYAR</a>
                    <?php endif; ?>
                </td>
            </tr>
        </tbody>
        <?php $no++; } ?>
    </table>
</div>

<!-- JavaScript -->
<script>
function redirectToWhatsApp(idPembelian, tanggal, totalHarga) {
    const whatsAppLink = `https://api.whatsapp.com/send?phone=6282279076077&text=Halo%20SIXTEE%20OLSHOP,%20saya%20ingin%20melakukan%20pembayaran%20dengan%20detail:%0A-%20ID%20Pembelian:%20${idPembelian}%0A-%20Tanggal:%20${tanggal}%0A-%20Total:%20Rp.${totalHarga}%0A%0ATerima%20kasih.`;

    // Kirim permintaan ke server untuk update status
    fetch(`update_status.php?id=${idPembelian}`, { method: 'GET' })
        .then(() => {
            // Redirect ke WhatsApp setelah status diperbarui
            window.open(whatsAppLink, '_blank');
            location.reload(); // Refresh halaman untuk update tampilan status
        })
        .catch(error => console.error('Gagal memperbarui status:', error));
}
</script>

</body>
</html>
