<?php
require "../functions.php";

$keyword = $_GET['keyword'];

$query = "SELECT * FROM mahasiswa
                WHERE
                nama LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'
                ";

$mahasiswa = query($query);

?>

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
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
    <tr>
        <td><?= $i ?></td>
        <td><?= $row['nrp'] ?></td>
        <td><img src="img/<?= $row['gambar']; ?>" alt="<?= $row['gambar']; ?>" width="100"></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['jurusan'] ?></td>
        <td>
            <a href="ubah.php?id=<?= $row['id'] ?>">ubah</a> |
            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?');">hapus</a>
        </td>
    </tr>
    <?php $i++; ?>
<?php endforeach; ?>

</tr>
</table>