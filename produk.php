<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "db_toko");

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dy/1LTTsbG/XO3Xc1G1AB43XYhzZV6ne+lYrAHw3FvnkxwNiY+gY4bObAqFwl+VLoN+p2O/rLsDB4u9hE+ztKg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

  <title>Fashion Shop</title>
</head>

<body>
  <!-- NAVBAR -->
  <?php include 'navbar.php'; ?>

    <!-- banner -->
    <header class="site-header section-padding d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-12">
                    <h1>
                        <span class="d-block text-primary">Choose your</span>
                        <span class="d-block text-dark">favorite stuffs</span>
                    </h1>
                </div>
            </div>
        </div>
    </header>

    <!-- KONTEN -->
    <div class="container py-5 mt-5 text-center">
    <h3>Produk</h3>
    <div class="container h-100 mt-5 pt-5">
      <div class="row">

        <?php
        // Logika Pencarian
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $query = "SELECT * FROM tb_produk";

        if (!empty($keyword)) {
          $query .= " WHERE nama_produk LIKE '%$keyword%'";
        }

        $ambil = $koneksi->query($query);

        // Jika data tidak ditemukan
        if ($ambil->num_rows == 0) {
          echo "<div class='col-12'><p class='text-center'>Produk tidak ditemukan</p></div>";
        }

        // Menampilkan produk
        while ($perproduk = $ambil->fetch_assoc()) { ?>
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="image-box">
                <a href="detailproduk.php?id=<?= $perproduk['id_produk']; ?>">
                  <img src="images/<?= $perproduk['foto_produk']; ?>" class="card-img-top" alt="">
                </a>
              </div>
              <div class="card-body">
                <h6 class="card-title"><?= $perproduk['nama_produk']; ?></h6>
                <h3 class="card-title"><?= "Rp. " . number_format($perproduk['harga_produk']);  ?></h3>
                <p class="card-text text-truncate"><?= substr($perproduk['deskripsi_produk'], 0, 50);  ?></p>
              </div>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>
  </div>
  <!-- Footer -->
  <div class="mt-5">
    <?php include 'footer.php'; ?>
  </div>


  <!-- Optional JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>

</html>