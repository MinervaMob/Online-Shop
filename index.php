<?php  
  session_start();
  $koneksi = new mysqli("localhost", "root", "","db_toko");
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

    <title>FASHION SHOP</title>
  </head>

  <body>
  <?php include 'navbar.php'; ?>
 
<!-- SLide slideshow -->
  <section class="slick-slideshow">   
      <div class="slick-custom">
          <img src="images/slideshow/medium-shot-business-women-high-five.jpeg" class="img-fluid" alt="">

          <div class="slick-bottom">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-6 col-10">
                          <h1 class="slick-title">Fashion Shop</h1>

                          <p class="lead text-white mt-lg-3 mb-lg-5">Selamat datang di toko fashion terlengkap, menyediakan segala kebutuhan fashion kamu</p>

                          <a href="produk.php" class="btn custom-btn">LIhat Produk</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="slick-custom">
          <img src="images/slideshow/team-meeting-renewable-energy-project.jpeg" class="img-fluid" alt="">

          <div class="slick-bottom">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-6 col-10">
                          <h1 class="slick-title">New Design</h1>

                          <p class="lead text-white mt-lg-3 mb-lg-5">Please share this Little Fashion template to your friends. Thank you for supporting us.</p>

                          <a href="product.html" class="btn custom-btn">Explore products</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="slick-custom">
          <img src="images/slideshow/two-business-partners-working-together-office-computer.jpeg" class="img-fluid" alt="">

          <div class="slick-bottom">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-6 col-10">
                          <h1 class="slick-title">Talk to us</h1>

                          <p class="lead text-white mt-lg-3 mb-lg-5">Tooplate is one of the best HTML CSS template websites for everyone.</p>

                          <a href="contact.html" class="btn custom-btn">Work with us</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </section>

  <!-- produk terbaru -->
  <div class="container-fluid py-5 " id="produk">
    <div class="container text-center">
      <h3 class="pt-5">New Produk</h3>

      <div class="row mt-5">
      <?php $ambil = $koneksi->query("SELECT * FROM tb_produk LIMIT 6"); ?>
      <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
      <div class="col-md-4 mb-4">
        <div class="card ">
          <div class="image-box">
            <a href="detailproduk.php?id=<?= $perproduk['id_produk']; ?>">
              <img src="images/<?= $perproduk['foto_produk']; ?>" class="card-img-top" alt="">
            </a>
          </div>
          <div class="card-body">
          <h6 class="card-title"><?= $perproduk['nama_produk']; ?></h6>
          <h3 class="card-title"><?= "Rp. " .number_format($perproduk['harga_produk']);  ?></h3>
          <p class="card-text text-truncate"><?= substr($perproduk['deskripsi_produk'], 0, 50);  ?></p>
            
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

      <a class="view-all mt-3 p-2" href="produk.php">See More</a>
    </div>
  </div>




<!-- Optional JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <!-- JAVASCRIPT FILES -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/Headroom.js"></script>
  <script src="js/jQuery.headroom.js"></script>
  <script src="js/slick.min.js"></script>
  <script src="js/custom.js"></script>

  <?php include 'footer.php'; ?>

</body>
</html>

