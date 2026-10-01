<?php
// Mengimpor data dan fungsi
require_once 'data.php';

// Menghitung jumlah total produk otomatis
$totalProducts = count($products);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Navbar/Header -->
    <nav class="navbar">
        <div class="logo">Cia Store</div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </nav>

    <!-- Hero / Bagian Pembuka -->
    <header class="hero">
        <div class="sub-title">CIA STORE</div>
        <h1>Simple Tech Store.</h1>
        <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
        <a href="#katalog" class="btn-hero">Lihat Produk</a>
    </header>

    <!-- Header Katalog & Total Produk -->
    <div class="section-header" id="katalog">
        <div class="section-title">
            <span>OUR PRODUCTS</span>
            <h2>Katalog Produk</h2>
        </div>
        <div class="total-count">
            Total Produk: <?= $totalProducts; ?>
        </div>
    </div>

    <!-- Katalog Produk -->
    <main class="catalog-container">
        <?php foreach ($products as $product) : ?>
            <?php 
                // Challenge Diskon 10% jika harga >= Rp1.000.000
                $hasDiscount = $product['price'] >= 1000000;
                $discountPercent = 10;
                $finalPrice = $product['price'];

                if ($hasDiscount) {
                    $finalPrice = $product['price'] - ($product['price'] * ($discountPercent / 100));
                }

                // Status stok
                $isAvailable = $product['stock'] > 0;
            ?>

            <div class="card">
                <div>
                    <!-- Kategori & Label Diskon -->
                    <div class="card-category">
                        <?= $product['category']; ?> 
                        <?= $hasDiscount ? "DISKON {$discountPercent}%" : ""; ?>
                    </div>

                    <!-- Nama Produk -->
                    <h3 class="card-title"><?= $product['name']; ?></h3>

                    <!-- Harga Produk -->
                    <div class="price-container">
                        <?php if ($hasDiscount) : ?>
                            <div class="price-normal"><?= formatRupiah($product['price']); ?></div>
                        <?php endif; ?>
                        <div class="price-final"><?= formatRupiah($finalPrice); ?></div>
                    </div>
                </div>

                <div>
                    <!-- Stok & Status -->
                    <div class="info-row">
                        <span class="stock-text">Stok: <?= $product['stock']; ?></span>
                        <?php if ($isAvailable) : ?>
                            <span class="status-badge available">Tersedia</span>
                        <?php else : ?>
                            <span class="status-badge out">Stok Habis</span>
                        <?php endif; ?>
                    </div>

                    <!-- Tombol Beli -->
                    <?php if ($isAvailable) : ?>
                        <button class="btn-buy">Beli Sekarang</button>
                    <?php else : ?>
                        <button class="btn-buy disabled" disabled>Stok Habis</button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; <?= date('Y'); ?> Cia Store. All rights reserved.</p>
    </footer>

</body>
</html>