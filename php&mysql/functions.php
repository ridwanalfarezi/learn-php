<?php
require 'connection.php';

function query($query)
{
    global $connection;
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Database query failed");
    }
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload()
{
    $fileName = $_FILES['gambar']['name'];
    $fileSize = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "
            <script>
                alert('Pilih gambar terlebih dahulu');
            </script>
        ";
        return false;
    }

    $validExtension = ['jpg', 'jpeg', 'png'];
    $extension = explode('.', $fileName);
    $extension = strtolower(end($extension));
    if (!in_array($extension, $validExtension)) {
        echo "
            <script>
                alert('Yang anda upload bukan gambar');
            </script>
        ";
        return false;
    }

    if ($fileSize > 1000000) {
        echo "
            <script>
                alert('Ukuran gambar terlalu besar');
            </script>
        ";
        return false;
    }

    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $extension;
    move_uploaded_file($tmpName, 'img/' . $newFileName);
    return $newFileName;
}

function tambah($data)
{
    global $connection;
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);


    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa
                VALUES
                ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
                ";
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}



function hapus($id)
{
    global $connection;
    mysqli_query($connection, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($connection);
}



function ubah($userId, $data)
{
    global $connection;

    $id = $userId;
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = $data["gambarLama"];


    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE mahasiswa SET
                nrp = '$nrp',
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
                WHERE id = $id
                ";

    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}


function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa
                WHERE
                nama LIKE '%$keyword%' OR
                nrp LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'
                ";

    if ($_GET['page'] > 1) {
        $query .= " LIMIT " . ($_GET['page'] - 1) * 3 . ", 2";
    }
    return query($query);
}



function register($data)
{
    global $connection;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($connection, $data["password"]);
    $confirmPassword = mysqli_real_escape_string($connection, $data["confirm_password"]);

    $result = mysqli_query($connection, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('Username sudah terdaftar');
                document.location.href = 'register.php';
            </script>
        ";
        return false;
    }

    if ($password !== $confirmPassword) {
        echo "
            <script>
                alert('Konfirmasi password tidak sesuai');
                document.location.href = 'register.php';
            </script>
        ";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users VALUES
                ('', '$username', '$password')
                ";
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}


function login($data)
{
    global $connection;
    $username = $data["username"];
    $password = $data["password"];

    $result = mysqli_query($connection, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;

            if (isset($data["remember"])) {
                setcookie('cookie', $row["username"], time() + 60);
                setcookie('cookie2', hash('sha256', $row["password"]), time() + 60);
            }

            return 1;
        }
    }

    echo "
        <script>
            alert('Username / Password Salah');
            document.location.href = 'login.php';
        </script>
    ";
}
