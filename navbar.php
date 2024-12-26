<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3 sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <i class="fas fa-store me-2"></i>
            <span>FASHION SHOP</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fs-3" href="keranjang.php"><i class="bi bi-cart4"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="produk.php">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="checkout.php">Checkout</a>
                </li>
                <?php if (isset($_SESSION["pelanggan"])) : ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="riwayat.php">Riwayat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-3 fw-bold" href="logout.php"><i class="bi bi-box-arrow-right"></i>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-3" href="login.php"><i class="bi bi-box-arrow-in-right"></i>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </div>

        <!-- Search bar -->
        <form action="produk.php" method="get" class="d-flex search-bar">
            <input type="text" placeholder="mau cari apa" name="keyword" autocomplete="off">
            <button type="submit"><i class="fa-solid fa-magnifying-glass" style="color: #D8C4B6;"></i></button>
        </form>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>