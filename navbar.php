<!-- CSS FILES -->
<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-icons.css" rel="stylesheet">

<link rel="stylesheet" href="css/slick.css" />
<link rel="stylesheet" href="style.css">
<link href="css/tooplate-little-fashion.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg py-3 sticky-top">
    <div class="container   ">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3 sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <i class="fas fa-store me-2"></i>
            <strong><span>Fashion</span> Shop</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="keranjang.php">Keranjang</a>
                    <a class="nav-link text-white fs-3" href="keranjang.php"><i class="bi bi-cart4"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="produk.php">Produk</a>
                </li>
                <?php if (isset($_SESSION["pelanggan"])) : ?>
                    <li class="nav-item">
                        <a class="nav-link " href="riwayat.php">Riwayat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="logout.php">Log Out</a>
                        <a class="nav-link text-white fs-3 fw-bold" href="logout.php"><i class="bi bi-box-arrow-right"></i>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link " href="login.php">Login</a>
                        <a class="nav-link text-white fs-3" href="login.php"><i class="bi bi-box-arrow-in-right"></i>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </div>

        <!-- Search bar -->
        <form action="produk.php" method="get" class="d-flex search-bar">
            <input type="text" placeholder="cari perlengkapan fashion" name="keyword" autocomplete="off">
            <input type="text" placeholder="mau cari apa" name="keyword" autocomplete="off">
            <button type="submit"><i class="fa-solid fa-magnifying-glass" style="color: #D8C4B6;"></i></button>
        </form>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>