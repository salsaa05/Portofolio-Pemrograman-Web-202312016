<?php
include 'koneksi.php';

if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    if (is_numeric($id_produk)) {
        $sql = "DELETE FROM produk WHERE id_produk = $id_produk";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit(); 
        } else {
            echo "Error saat menghapus data: " . $conn->error;
        }
    } else {
        echo "ID produk tidak valid.";
    }
} else {
    echo "ID produk tidak ditemukan di URL.";
}

$conn->close();
?>
