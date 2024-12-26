<h1 style="text-align: center;">Halaman Detail Pembayaran</h1>

	<br>
	
	 <div class="col-md-6 col-md-6">
           <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="tambahpembayaran.php?halaman=tambahpembayaran">
            	<i class="zmdi zmdi-plus"></i>Tambah Transaksi
            </a>                                 
     </div>
    

  <div class="row m-t-30">
      <div class="col-md-12">
		<div class="table-responsive m-b-40">
		<table class="table table-borderless table-data3">
			<thead>
				<tr>
					<th>ID Pembayaran</th>
					<th>ID Pembelian</th>
					<th>Nama</th>
					<th>Bank</th>
					<th>Jumlah</th>
					<th>Tanggal</th>
					<th>Bukti</th>
					<th>Aksi</th>
				</tr>
			</thead>

			<tbody>
			<?php
// Query untuk mengambil data dari tabel tb_pembayaran
$ambil = $koneksi->query("SELECT * FROM tb_pembayaran");

// Loop untuk menampilkan data dalam bentuk tabel
while ($pecah = $ambil->fetch_assoc()) {
?>
    <tr>
        <td><?php echo $pecah['id_pembayaran']; ?></td>
        <td><?php echo $pecah['id_pembelian']; ?></td>
        <td><?php echo $pecah['nama']; ?></td>
        <td><?php echo $pecah['bank']; ?></td>
        <td><?php echo $pecah['jumlah']; ?></td>
        <td><?php echo $pecah['tanggal']; ?></td>
        <td>
            <?php 
            // Cek apakah file gambar ada
            if (!empty($pecah['bukti']) && file_exists($pecah['bukti'])) { ?>
                <img src="<?php echo $pecah['bukti']; ?>" width="100">
            <?php } else { ?>
                <p>Gambar tidak ditemukan.</p>
            <?php } ?>
        </td>
        <td>
            <div class="table-data-feature">
                <!-- Tombol Edit -->
                <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" 
                   href="ubahpembayaran.php?id=<?php echo $pecah['id_pembayaran']; ?>">
                    <i class="zmdi zmdi-edit"></i>
                </a>
                <!-- Tombol Hapus -->
                <a class="item" data-toggle="tooltip" data-placement="top" title="Delete" 
                   href="hapuspembayaran.php?id=<?php echo $pecah['id_pembayaran']; ?>" 
                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                    <i class="zmdi zmdi-delete"></i>
                </a>
            </div>
        </td>
    </tr>
<?php 
} // Akhir loop while
?>

			</tbody>
		</table>
		</div>
	</div>
</div>