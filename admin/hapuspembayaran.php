<?php
$id = $_GET['id']; // Ambil ID pembayaran dari URL

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "db_toko");

// Cek apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk menghapus data pembayaran berdasarkan ID
$query = "DELETE FROM tb_pembayaran WHERE id_pembayaran = '$id'";

// Eksekusi query
if ($koneksi->query($query)) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='index.php?halaman=pembayaran';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!');</script>";
}

// Tutup koneksi setelah operasi selesai
$koneksi->close();
?>
