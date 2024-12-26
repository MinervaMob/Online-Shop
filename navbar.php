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
                    <a class="nav-link text-white" href="keranjang.php">Keranjang</a>
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
                        <a class="nav-link text-white" href="logout.php">Log Out</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="login.php">Login</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>

        <!-- Search bar -->
        <form action="produk.php" method="get" class="d-flex search-bar">
            <input type="text" placeholder="cari gadget impian" name="keyword" autocomplete="off">
            <button type="submit"><i class="fa-solid fa-magnifying-glass" style="color: #D8C4B6;"></i></button>
        </form>
    </div>
</nav>
