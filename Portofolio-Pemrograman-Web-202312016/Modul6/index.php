<!DOCTYPE html> 
<html>
<head>
    <title>Toko</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-4">
        <h2 class="mb-3">Daftar Produk</h2> 
        <a href="form_tambah.html" class="btn btn-primary mb-3">Tambah Produk</a> 
        
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID Produk</th> 
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                $sql = "SELECT id_produk, nama_produk, harga, stok FROM produk";
                $result = $conn->query($sql); 

                if ($result->num_rows > 0) { 
                    while ($row = $result->fetch_assoc()) { 
                        echo "<tr>";
                        echo "<td>" . $row["id_produk"] . "</td>"; 
                        echo "<td>" . $row["nama_produk"] . "</td>"; 
                        echo "<td>Rp " . number_format($row["harga"], 0, ',', '.') . "</td>";
                        echo "<td>" . $row["stok"] . "</td>"; 
                        echo "<td>
                                <a href='form_edit.php?id_produk=" . $row["id_produk"] . "' class='btn btn-sm btn-warning'>Edit</a> 
                                <a href='hapus.php?id_produk=" . $row["id_produk"] . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Tidak ada barang tersebut</td></tr>"; 
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
