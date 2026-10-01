<?php
$products = [
    [
        "name"     => "Monitor 999 Inch",
        "category" => "MONITOR",
        "price"    => 1800000,
        "stock"    => 4
    ],
    [
        "name"     => "Laptop lenovo yoga 6, cash no nyicil",
        "category" => "LAPTOP",
        "price"    => 8500000,
        "stock"    => 3
    ],
    [
        "name"     => "Mouse S50 ada lampunya",
        "category" => "AKSESORIS",
        "price"    => 150000,
        "stock"    => 12
    ],
    [
        "name"     => "Keyboard Mechanical",
        "category" => "AKSESORIS",
        "price"    => 650000,
        "stock"    => 0 
    ],
    [
        "name"     => "Headset Gaming buat main ff",
        "category" => "AUDIO",
        "price"    => 1200000,
        "stock"    => 5
    ],
    [
        "name"     => "Webcam Full HD",
        "category" => "AKSESORIS",
        "price"    => 450000,
        "stock"    => 8
    ]
];

// frmt rupiah
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ',', '.');
}
?>