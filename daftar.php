<?php  
  session_start();
  $koneksi = new mysqli("localhost", "root", "","db_toko");

  // if (!isset($_SESSION["keranjang"])) {
  //   echo "<script>alert('Pilih Produk Dulu Baru Login');</script>";
  //       echo "<script>location='index.php';</script>";
  //  } 
 
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
 
<!-- KONTEN -->


  <section class="container-fluid mt-5 pt-5" >

      <section class="row justify-content-center">

        <section class="col-12 col-sm-6 col-md-3">

            <form class="kotak-datar" method="POST">
              <div class="form-group row">
                  <label for="staticEmail" >Email</label>
                  <input type="email" class="form-control"  id="staticEmail" placeholder="email@example.com" name="email">
              </div>

              <div class="form-group row">
                  <label for="inputPassword" >Password</label>
                  <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
              </div>

              <div class="form-group row">
                  <label for="inputPassword" >Nama Lengkap</label>
                  <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
              </div>

               <div class="form-group row">
                  <label for="inputPassword" >No. Handphone</label>
                  <input type="text" class="form-control" placeholder="No Handphone" name="hp">
              </div>


              <button type="submit" class="btn btn-success btn-block" name="daftar">Sign Up</button>
              
          </form>
        </section>
        
      </section>
    
  </section>
<!-- KONTEN -->

<?php 

    if (isset($_POST["daftar"]) && empty($_SESSION["keranjang"])) {
        
         $email = $_POST["email"];
         $password = $_POST["password"];
         $nama = $_POST["nama"];
         $hp = $_POST["hp"];

        $sql = $koneksi->query("INSERT INTO tb_pelanggan (email, password, nama_pelanggan, telepon)  VALUES ('$email', '$password', '$nama', '$hp')" );

         if($sql === true){
          echo "<script>alert('PENDAFTARAN BERHASIL');</script> ";
          echo "<script>location='login.php';</script> " ;
        } else {
          echo "Gagal: ". $koneksi->error;
        }

    } 

 ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>