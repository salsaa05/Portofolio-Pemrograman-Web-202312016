<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital STITEK Bontang</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #ffffff; /* putih polos */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form label {
            font-weight: 600;
            display: block;
            margin-top: 15px;
            color: #333;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        .submit-btn {
            margin-top: 20px;
            width: 100%;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 12px;
            font-weight: bold;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .output {
            margin-top: 25px;
            background: #f0f8ff;
            border-left: 6px solid #007BFF;
            padding: 20px;
            border-radius: 6px;
            font-size: 14px;
            color: #333;
        }

        .error {
            color: red;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Buku Tamu STITEK Bontang</h1>

    <?php
    $nama = $email = $pesan = "";
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"]) || empty($_POST["email"]) || empty($_POST["pesan"])) {
            $error = "Semua kolom wajib diisi!";
        } else {
            $nama = htmlspecialchars($_POST["nama"]);
            $email = htmlspecialchars($_POST["email"]);
            $pesan = htmlspecialchars($_POST["pesan"]);
        }
    }
    ?>

    <form method="post" action="">
        <label>Nama Lengkap:</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>">

        <label>Alamat Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($email) ?>">

        <label>Pesan/Komentar:</label>
        <textarea name="pesan" rows="4"><?= htmlspecialchars($pesan) ?></textarea>

        <input type="submit" class="submit-btn" value="Kirim Pesan">
    </form>

    <?php if ($error): ?>
        <p class="error"><?= $error ?></p>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class="output">
            <strong>Terima kasih!</strong><br>
            Berikut data yang Anda kirim:<br><br>
            <strong>Nama:</strong> <?= $nama ?><br>
            <strong>Email:</strong> <?= $email ?><br>
            <strong>Pesan:</strong><br> <?= nl2br($pesan) ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
