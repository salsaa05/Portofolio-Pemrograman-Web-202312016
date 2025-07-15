<?php
include 'koneksi.php';

$nama_produk = $_POST['nama_produk']; 
$harga = $_POST['harga']; 
$stok = $_POST['stok'];

$sql = "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama_produk', '$harga', '$stok')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();