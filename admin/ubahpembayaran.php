<?php
// Koneksi database
$koneksi = new mysqli("localhost", "root", "", "db_toko");

// Ambil ID pembayaran dari URL
$id = $_GET['id'];

// Query untuk mengambil data pembayaran berdasarkan ID
$query = "SELECT * FROM tb_pembayaran WHERE id_pembayaran = '$id'";
$result = $koneksi->query($query);
$pecah = $result->fetch_assoc();

// Proses update data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pembelian = $_POST['id_pembelian'];
    $nama = $_POST['nama'];
    $bank = $_POST['bank'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    // Query untuk memperbarui data pembayaran
    $update_query = "UPDATE tb_pembayaran 
                     SET id_pembelian = '$id_pembelian', 
                         nama = '$nama', 
                         bank = '$bank', 
                         jumlah = '$jumlah', 
                         tanggal = '$tanggal' 
                     WHERE id_pembayaran = '$id'";

    // Eksekusi query
    if ($koneksi->query($update_query)) {
        echo "<script>alert('Data berhasil diubah!'); window.location='index.php?halaman=pembayaran';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Pembayaran</title>
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

        form h1 {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #333333;
        }

        .form-label {
            font-size: 14px;
            font-weight: bold;
            color: #555555;
            margin-bottom: 5px;
            display: block;
        }

        .form-control,
        .form-select {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 14px;
            color: #555555;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-group {
            margin-bottom: 15px;
        }

        button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .row {
                display: flex;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <form method="POST">
        <h1>Ubah Pembayaran</h1>
        <div class="form-group">
            <label for="id_pembelian" class="form-label">ID Pembelian</label>
            <select name="id_pembelian" id="id_pembelian" class="form-select" required>
                <option value="">Pilih ID Pembelian</option>
                <?php
                $result_pembelian = $koneksi->query("SELECT id_pembelian FROM tb_pembelian");
                while ($row = $result_pembelian->fetch_assoc()) {
                    $selected = $row['id_pembelian'] == $pecah['id_pembelian'] ? 'selected' : '';
                    echo "<option value='{$row['id_pembelian']}' $selected>{$row['id_pembelian']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $pecah['nama']; ?>" required>
        </div>
        <div class="form-group">
            <label for="bank" class="form-label">Bank</label>
            <input type="text" name="bank" id="bank" class="form-control" value="<?php echo $pecah['bank']; ?>" required>
        </div>
        <div class="form-group">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="<?php echo $pecah['jumlah']; ?>" required>
        </div>
        <div class="form-group">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $pecah['tanggal']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Ubah Data</button>
    </form>
</body>
</html>
