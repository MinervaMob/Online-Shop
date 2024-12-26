<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "db_toko");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id_pembelian = $_POST['id_pembelian']; // Ambil id_pembelian dari dropdown
    $nama = $_POST['nama'];
    $bank = $_POST['bank'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    // Query untuk menyimpan data pembayaran ke dalam database
    $query = "INSERT INTO tb_pembayaran (id_pembelian, nama, bank, jumlah, tanggal) 
          VALUES ('$id_pembelian', '$nama', '$bank', '$jumlah', '$tanggal')";


    // Eksekusi query
    if ($koneksi->query($query)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php?halaman=pembayaran';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data!');</script>";
    }
}

// Ambil data id_pembelian dari tabel tb_pembelian untuk dropdown
$query_pembelian = "SELECT * FROM tb_pembelian";
$result_pembelian = $koneksi->query($query_pembelian);
?>

<!-- HTML Form -->
 <style>
	/* Global Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f7f8fc;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

/* Form Container */
form {
    background-color: #ffffff;
    padding: 20px 30px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
}

/* Form Header */
form h1 {
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
    color: #333333;
}

/* Input Fields */
form .form-label {
    font-size: 14px;
    font-weight: bold;
    color: #555555;
    margin-bottom: 5px;
    display: block;
}

form .form-control,
form .form-select {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #cccccc;
    border-radius: 5px;
    font-size: 14px;
    color: #555555;
    outline: none;
    transition: all 0.3s ease;
}

form .form-control:focus,
form .form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* File Input Styling */
form input[type="file"] {
    padding: 5px;
    font-size: 14px;
    border: none;
}

/* Form Groups */
form .row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 20px;
}

form .mb-3 {
    margin-bottom: 15px;
}

/* Submit Button */
form button {
    background-color: #007bff;
    color: #ffffff;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

form button:hover {
    background-color: #0056b3;
}

/* Responsive Design */
@media (max-width: 768px) {
    form .row {
        grid-template-columns: 1fr;
    }
}
 </style>
<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <!-- Dropdown ID Pembelian -->
        <div class="col-md-6 mb-3">
            <label for="id_pembelian" class="form-label">ID Pembelian</label>
            <select name="id_pembelian" id="id_pembelian" class="form-select" required>
                <option value="">Pilih ID Pembelian</option>
                <?php while ($row = $result_pembelian->fetch_assoc()) { ?>
                    <option value="<?php echo $row['id_pembelian']; ?>">
                        <?php echo $row['id_pembelian']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>

    <!-- Input Nama -->
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" required>
    </div>

    <!-- Input Bank -->
    <div class="mb-3">
        <label for="bank" class="form-label">Bank</label>
        <input type="text" name="bank" id="bank" class="form-control" required>
    </div>

    <!-- Input Jumlah -->
    <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control" required>
    </div>

    <!-- Input Tanggal -->
    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
    </div>

    <!-- Input Bukti Pembayaran -->
    <div class="mb-3">
        <label for="bukti" class="form-label">Bukti Pembayaran</label>
        <input type="file" name="bukti" id="bukti" class="form-control" required>
    </div>

    <!-- Button Submit -->
    <button type="submit" class="btn btn-primary">Tambah Data</button>
</form>

