<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$jumlahDataPerHalaman = 2;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC LIMIT $awalData, $jumlahDataPerHalaman");

if (isset($_POST['cari'])) {
    $mahasiswa = cari($_POST['keyword']);
    if (empty($mahasiswa)) {
        echo "<script>alert('Data tidak ditemukan');document.location.href='index.php'</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP & MySQL</title>
    <style>
        @media print {
            .logout, .search, .action {
                display: none;
            }
        }
    </style>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <h2>
        <a href="tambah.php">Tambah Data</a>
        <a href="logout.php" class="logout">Logout</a>
    </h2>

    <form method="post" class="search">
        <input type="text" name="keyword" id="keyword" size="40" placeholder="Cari Mahasiswa..." autocomplete="off" autofocus>
        <button type="submit" name="cari" id="tombol-cari">Cari</button>
    </form>

    <br>

    <div id="container">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>NRP</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <?php $i = $awalData + 1; ?>
                <?php foreach ($mahasiswa as $row) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $row['nrp'] ?></td>
                <td><img src="img/<?= $row['gambar']; ?>" alt="<?= $row['gambar']; ?>" width="100"></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['jurusan'] ?></td>
                <td class="action">
                    <a href="ubah.php?id=<?= $row['id'] ?>">ubah</a> |
                    <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?');">hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>

        </tr>
        </table>
    </div>
    <br>
    <div>
        <?php if ($halamanAktif > 1) : ?>
            <a href="?page= <?= $halamanAktif - 1 ?>">&laquo;</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
            <?php if ($i == $halamanAktif) : ?>
                <a href="?page= <?= $i ?>" style="font-weight: bold; color: red;"><?= $i ?></a>
            <?php else : ?>
                <a href="?page= <?= $i ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($halamanAktif < $jumlahHalaman) : ?>
            <a href="?page= <?= $halamanAktif + 1 ?>">&raquo;</a>
        <?php endif; ?>
    </div>

    <script src="js/script.js"></script>
</body>

</html>