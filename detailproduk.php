<?php 
  session_start();
	$koneksi = new mysqli("localhost", "root", "","db_toko");

	$id_produk = $_GET['id'];
	$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
	$pecah = $ambil->fetch_assoc();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin/css/global.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>SIX-TEE OLSHOP</title>
  </head>
 <body>

	
<!-- NAVBAR -->
  <?php include 'navbar.php'; ?>
 <br>
<!-- NAVBAR -->

<!-- KONTEN -->
<form method="POST" onsubmit="return validateInput()">
	<div class="content">
		<div class="container mt-5 pt-5">
			<div class="row">
				
				<div class="col-md-4">
					<img class="img-responsive" src="images/<?= $pecah['foto_produk']; ?>" >
				</div>

				<div class="col-md-6">
					<div class="alert alert-info">
						<h6 class="alert-heading"><?php echo $pecah['nama_produk']; ?> | <?php echo "Rp. ".$pecah['harga_produk']; ?></h6>
						<hr>
						<?php echo $pecah['deskripsi_produk']; ?>
					</div>

					<div class="alert alert-success">
						<h6 class="alert-heading">Tambahkan Produk</h6>
						<hr>
						<input type="number" min="1" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan jumlah produk">
            <div>
						<button class="btn btn-success btn-block" name="beli" type="submit">BELI</button>
						</div>
					</div>
				</div>
			</div>					
	</div>
</form>

<script>
function validateInput() {
    const jumlah = document.getElementById('jumlah').value;
    if (!jumlah || jumlah <= 0) {
        alert('Jumlah produk harus diisi sebelum melanjutkan.');
        return false;
    }
    return true;
}
</script>

<!-- KONTEN -->

  <?php 

    if (isset($_POST["beli"])) {
      $jumlah = $_POST["jumlah"];
      $_SESSION["keranjang"][$id_produk] = $jumlah;
      echo "<script>alert('Produk Tambah Ke Keranjang');</script>";
      echo "<script>location = 'keranjang.php';</script>";
    }

  ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
