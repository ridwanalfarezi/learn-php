<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';


$id = $_GET["id"];

$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (ubah($id, $_POST) > 0) {
        echo "
            <script >
                alert('Data Berhasil Diubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah');
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
    <title>Ubah Data</title>
</head>

<body>
    <h1>Ubah Data Mahasiswa</h1>
    <form method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nrp">NRP</label>
                <input type="text" name="nrp" placeholder="NRP" id="nrp" value="<?= $mahasiswa["nrp"]; ?>" required>
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" placeholder="Nama" id="nama" value="<?= $mahasiswa["nama"]; ?>" required>
            </li>
            <li>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email" id="email" value="<?= $mahasiswa["email"]; ?>" required>
            </li>
            <li>
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" placeholder="Jurusan" id="jurusan" value="<?= $mahasiswa["jurusan"]; ?>" required>
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <br>
                <img id="img-preview" src="img/<?= $mahasiswa["gambar"]; ?>" alt="<?= $mahasiswa["gambar"]; ?>" width="100">
                <br>
                <input type="file" name="gambar" id="gambar" accept="image/*" onchange="previewImage()">
                <input type="hidden" name="gambarLama" value="<?= $mahasiswa["gambar"]; ?>">
            </li>
            <button type="submit" name="submit">Ubah</button>
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
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>