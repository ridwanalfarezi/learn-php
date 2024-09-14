<?php
require 'connection.php';
session_start();

if (isset($_COOKIE["cookie"]) && isset($_COOKIE["cookie2"])) {
    global $connection;
    $cookie = $_COOKIE["cookie"];
    $cookie2 = $_COOKIE["cookie2"];
    $result = mysqli_query($connection, "SELECT username FROM users WHERE username = '$cookie'");
    if (!mysqli_fetch_assoc($result)) {
        die("Invalid Cookies");
    }
    $row = mysqli_fetch_assoc($result);
    if (password_verify($cookie2, $row["password"])) {
        $_SESSION["login"] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'functions.php';


if (isset($_POST["submit"])) {
    if (login($_POST) > 0) {
        echo "<script>
        alert('anda berhasil login');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('anda gagal login');
        document.location.href = 'login.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>

    <form method="post">
        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>

            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember"></label>
                <label for="remember">Remember me</label>
            </li>
            <li>
                <button type="submit" name="submit">Login</button>
            </li>
    </form>
</body>

</html>