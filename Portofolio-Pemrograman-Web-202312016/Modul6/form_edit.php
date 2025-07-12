<?php
include 'koneksi.php'; 

if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    if (is_numeric($id_produk)) {
        $sql = "SELECT * FROM produk WHERE id_produk = $id_produk";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            die("Data tidak ditemukan.");
        }
    } else {
        die("ID produk tidak valid.");
    }
} else {
    die("ID produk tidak ditemukan di URL.");
}
?>
<!DOCTYPE html> 
<html>
<head>
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center min-vh-100">
    <div class="p-4 bg-white shadow rounded" style="width: 100%; max-width: 500px;">
        <h2 class="mb-4 text-center">Form Edit Produk</h2> 
        <form action="edit.php" method="post"> 
            <input type="hidden" name="id_produk" value="<?php echo htmlspecialchars($row['id_produk']); ?>">

            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk:</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php echo htmlspecialchars($row['nama_produk']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?php echo htmlspecialchars($row['harga']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok:</label>
                <input type="number" class="form-control" id="stok" name="stok" value="<?php echo htmlspecialchars($row['stok']); ?>" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
