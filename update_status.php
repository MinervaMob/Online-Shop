<?php
$koneksi = new mysqli("localhost", "root", "", "db_toko");
if (isset($_GET['id'])) {
    $id_pembelian = $_GET['id'];
    $koneksi->query("UPDATE tb_pembelian SET status='Pembayaran Berhasil' WHERE id_pembelian='$id_pembelian'");
}
?>
