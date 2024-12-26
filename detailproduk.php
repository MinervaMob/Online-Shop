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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin/css/global.css">
    <link rel="stylesheet" href="style.css">
    <title>FASHION SHOP</title>
  </head>
 <body>

	
<!-- NAVBAR -->
  <?php include 'navbar.php'; ?>
 <br>
<!-- NAVBAR -->

<!-- KONTEN -->
<form method="POST" onsubmit="return validateInput()">
	<div class="content">
		<div class="container shadow rounded p-3 d-flex justify-content-center align-items-center w-100">
			<div class="row w-100 d-flex justify-content-center align-items-center w-100">
				
				<div class="col-md-4">
					<img class="img-responsive" src="images/<?= $pecah['foto_produk']; ?>" >
				</div>

				<div class="col-md-6">
					<div class="">
						<h6 class="alert-heading font-weight-bold fs-3"><?php echo $pecah['nama_produk']; ?> </h6> 
            <h6 class="fw-bold text-dark bg-warning py-2 px-1 fs-4"><?php echo "Rp. ".$pecah['harga_produk']; ?></h6>
						<hr>
						<?php echo $pecah['deskripsi_produk']; ?>
					</div>

					<div class="add-product mt-4 p-3 rounded-2 border border-warning">
						<h6 class="alert-heading text-dark">Tambahkan Produk</h6>
						<input type="number" min="1" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan jumlah produk">
            <div>
              <div class="text-center">
              <button class="btn btn-warning mt-4" name="beli" type="submit">Masukkan Keranjang</button>
              </div>
						
						</div>
					</div>
				</div>
			</div>					
	</div>
</form>

<!-- KONTEN -->

  <?php 

    if (isset($_POST["beli"])) {
      $jumlah = $_POST["jumlah"];
      $_SESSION["keranjang"][$id_produk] = $jumlah;
      echo "<script>alert('Produk Tambah Ke Keranjang');</script>";
      echo "<script>location = 'keranjang.php';</script>";
    }

  ?>

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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
