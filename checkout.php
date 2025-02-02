<?php  
  session_start();
  $koneksi = new mysqli("localhost", "root", "","db_toko");
 
	if (!isset($_SESSION["pelanggan"])) {
	 	echo "<script>alert('Silahkan Login Terlebih Dahulu');</script>";
    echo "<script>location='login.php';</script>";
	 } 

   if (empty($_SESSION["keranjang"])) {
     echo "<script>alert('Silahkan Pilih Produk Terlebih Dahulu');</script>";
     echo "<script>location='index.php';</script>";
   }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dy/1LTTsbG/XO3Xc1G1AB43XYhzZV6ne+lYrAHw3FvnkxwNiY+gY4bObAqFwl+VLoN+p2O/rLsDB4u9hE+ztKg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>SIX-TEE OLSHOP</title>
  </head>
  <body>


<!-- NAVBAR -->
  <?php include 'navbar.php'; ?>
  <br>
 
<!-- KONTEN -->

<div class="container mt-5 pt-5">
  <form method="POST">  

      <div class="row"> 
        <div class="col-md-4">
          <div class="form-group">
          <p>Nama Pelanggan</p>
          <input class="form-control" type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>">
          </input>
          </div>
        </div>
      </div>

        <div class="row">    
        <div class="col-md-4"> 
          <div class="form-group">
          <p>No.Handphone</p>
          <input class="form-control" type="text" readonly value="<?php echo $_SESSION['pelanggan']['telepon'] ?>">
          </input>
          </div>
        </div>
      </div>


      <div class="row">    

        <div class="col-md-4"> 
          <div class="form-group">
          <p>Pilih Provinsi Pengiriman</p>

            <select class="form-control" name="id_ongkir" onchange="cek_database()" id="id_prov">
              <option value="">-Pilih Provinsi-</option>
              <?php 
                $ambil = $koneksi->query("SELECT * FROM provinsi"); ;
                while($pecah = $ambil->fetch_assoc()) {
              ?>
              <option value="<?= $pecah['id_prov'] ?>" ><?= $pecah['nama']; ?> </option>
              
              <?php } ?>
            </select>
          
          </div>
        </div>


        <div class="col-md-4"> 
          <div class="form-group">
          <p>Pilih Kabupaten Pengiriman</p>
            <select class="form-control" name="kabupaten">
              <option value="">-Pilih Kabupaten-</option>
              <option value="">Kabupaten A</option>
              <option value="">Kapubaten B</option>
            </select>
          </div>
        </div>


        <div class="col-md-4"> 
          <div class="form-group">
          <p>Pilih Kecamatan Pengiriman</p>
            <select class="form-control" name="kecamatan">
              <option value="">-Pilih Kecamatan-</option>
              <option value="">Kelurahan C</option>
              <option value="">Kelurahan D</option>
            </select>
          </div>
        </div>

      </div>

       <div class="row">    
        <div class="col-md-6"> 
          <div class="form-group">
          <p>Alamat Pengiriman</p>
          <input class="form-control" type="text" placeholder="Masukkan Alamat Anda" name="alamat" id="alamat">
          </input>
          </div>
        </div>

        <div class="col-md-4"> 
          <div class="form-group">
          <p>Biaya Ongkir</p>
          <input class="form-control" type="text" name="biayaOngkir" value="" id="ongkir" readonly>
          </input>
          </div>
        </div>
      </div>
       
  <!-- FORM SEHARUSNYA -->
</div>


  <div class="container">
          <table class="table">
          
          <thead class="thead-light">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Produk</th>
              <th scope="col">Harga</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Sub Harga</th>       
            </tr>
          </thead>

          <?php 
            $no = 1;
            $totalbelanja = 0;
            foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) :  ?>

            <?php 
             
              $ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk'");
              $pecah = $ambil->fetch_assoc();
            ?>

                <tbody>
                  <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $pecah['nama_produk']; ?></td>
                    <td><?= "Rp ".number_format($pecah['harga_produk']); ?></td>
                    <td><?= $jumlah ?></td>
                    <?php $subtotal = $pecah['harga_produk']*$jumlah ?>
                    <td><?= "Rp ".number_format($subtotal); ?></td>
                  </tr>
                </tbody>
              <?php $no++; ?>
            <?php $totalbelanja+=$subtotal; ?>
        <?php endforeach ?>

                <tfoot class="thead-light">
                      <tr>
                          <th colspan="4" style="text-align: center"> Total Belanja</th>
                          <th> <?php echo "Rp ". number_format($totalbelanja) ; ?></th>
                      </tr>
                </tfoot>
        </table>
         
          <button class="btn btn-success" name="checkout">Lanjutkan ke Pembayaran</button>
          <h1></h1>
    </form>
  </div> 


  <?php 
if (isset($_POST["checkout"])) {
    if (!isset($_SESSION["pelanggan"]["id_pelanggan"]) || empty($_POST["id_ongkir"]) || empty($_POST["alamat"]) || empty($_SESSION['keranjang'])) {
        die("Error: Data checkout tidak lengkap.");
    }

    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
    $id_ongkir = intval($_POST["id_ongkir"]);
    $tanggal_pembelian = date("Y-m-d");
    $alamat = $koneksi->real_escape_string($_POST["alamat"]);

    // Validasi data ongkir
    $ambil = $koneksi->prepare("SELECT * FROM provinsi WHERE id_prov = ?");
    $ambil->bind_param("i", $id_ongkir);
    $ambil->execute();
    $result = $ambil->get_result();
    $arrayongkir = $result->fetch_assoc();

    if (!$arrayongkir) {
        die("Error: Data provinsi tidak ditemukan.");
    }

    $tarif = $arrayongkir["ongkir"];
    $total_pembelian = $totalbelanja + $tarif;

    // Simpan ke tabel pembelian
    $stmt = $koneksi->prepare("INSERT INTO tb_pembelian 
        (id_pelanggan, id_prov, tanggal_pembelian, total_pembelian, tarif, alamat, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
    $status = "Pending";
    $stmt->bind_param("iisdsis", $id_pelanggan, $id_ongkir, $tanggal_pembelian, $total_pembelian, $tarif, $alamat, $status);
    $stmt->execute();
    $id_pembelian_barusan = $stmt->insert_id;

    // Simpan detail produk
    $stmt2 = $koneksi->prepare("INSERT INTO tb_pembelian_produk (id_pembelian, id_produk, jumlah) VALUES (?, ?, ?)");
    $stmt2->bind_param("iii", $id_pembelian_barusan, $id_produk, $jumlah);

    foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
        $stmt2->execute();
    }

    // Kosongkan keranjang
    unset($_SESSION['keranjang']);

    // Redirect ke halaman nota
    echo "<script>alert('PEMBELIAN SUKSES');</script>";
    echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
}
?>


  
<!-- KONTEN -->





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script type="text/javascript">
        function cek_database(){
          var id_prov = $("#id_prov").val();
          $.ajax({
            url:'ajax_cek.php',
            data: "id_prov="+id_prov,
          }).success(function (data){
            var json = data,
            obj = JSON.parse(json);
                  $('#ongkir').val(obj.ongkir);
        });
      }


  </script>


  </body>
</html>