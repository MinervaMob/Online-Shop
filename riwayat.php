<?php 

	session_start();
 	$koneksi = new mysqli("localhost", "root", "","db_toko");
	
?>


<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
	<title>SIXTEE OLSHOP</title>
</head>
<body>

<!-- NAVBAR -->
<?php include 'navbar.php'; ?>

  <br>
<!-- NAVBAR -->

<!-- KONTEN -->


<div class="container mt-5 pt-5 h-100">

	<h4>Riwayat Belanja</h4>

	<table class="table table-bordered">
	  
	  <thead>
	    <tr>
	      <th scope="col">No</th>
	      <th scope="col">Tanggal</th>
	      <th scope="col">Total Belanja</th>
	      <th scope="col">Status</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>

	  <?php 
	  	$no = 1;
		$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan']; 
		$ambil = $koneksi->query("SELECT * FROM tb_pembelian WHERE id_pelanggan='$id_pelanggan'");
		while ($pecah = $ambil->fetch_assoc()) {
	  ?>

	  <tbody>
	  	<tr>
	  		<td><?php echo $no; ?></td>
	  		<td><?php echo $pecah['tanggal_pembelian']; ?></td>
	  		<td><?php echo "Rp." .number_format($pecah['total_pembelian']); ?></td>
	  		<td><?php echo $pecah['status'] ?></td>
	  		<td style="text-align: center">
          <?php if ($pecah['status'] == 'Sedang di Kirim' || $pecah['status'] == 'Produk di Terima') :?>
              <a href="nota.php?id=<?= $pecah['id_pembelian']; ?>" class="btn btn-primary btn-block">DETAIL</a>
          <?php endif; ?>

          <?php if ($pecah['status'] == 'Menunggu Konfirmasi' || $pecah['status'] == 'Pending' ) :?>
                <a href="nota.php?id=<?= $pecah['id_pembelian']; ?>" class="btn btn-primary">DETAIL</a>
          <a href="pembayaran.php?id=<?= $pecah['id_pembelian']; ?>" class="btn btn-success">BAYAR</a>
          <?php endif; ?>

	  		
	  		</td>
	  	</tr>
	  </tbody>
	  <?php $no++; ?>
	  <?php } ?>

	</table>
</div>


<!-- KONTEN -->




 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

		<?php include 'footer.php'; ?>
</body>
</html>