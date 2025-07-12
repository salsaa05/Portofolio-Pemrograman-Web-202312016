<?php
include 'koneksi.php';

$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk']; 
$harga = $_POST['harga'];
$stok = $_POST['stok']; 

$sql = "UPDATE produk SET nama_produk='$nama_produk', harga='$harga', stok='$stok' WHERE id_produk=$id_produk";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close(); 