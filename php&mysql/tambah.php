<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';



if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script >
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <style>
        img {
            display: none;
            max-width: 100px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nrp">NRP</label>
                <input type="text" name="nrp" placeholder="NRP" id="nrp" required>
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" placeholder="Nama" id="nama" required>
            </li>
            <li>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email" id="email" required>
            </li>
            <li>
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" placeholder="Jurusan" id="jurusan" required>
            </li>
            <li>
                <img id="img-preview" alt="Image Preview">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar" accept="image/*" onchange="previewImage()" required>
            </li>
            <button type="submit" name="submit">Tambah</button>
        </ul>
    </form>
    <script>
        function previewImage() {
            const fileInput = document.getElementById('gambar');
            const previewImage = document.getElementById('img-preview');

            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                }

                reader.readAsDataURL(file);
            } else {
                previewImage.style.display = 'none';
            }
        }
    </script>
</body>

</html>