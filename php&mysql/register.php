<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (register($_POST) > 0) {
        echo "<script>alert('user baru ditambahkan');document.location.href = 'login.php'</script>";
    } else {
        echo "<script>alert('user gagal ditambahkan');document.location.href = 'register.php'</script>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>
    <h1>Register</h1>

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
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password"></label>
            <li>
                <button type="submit">Register</button>
            </li>
        </ul>
    </form>
</body>

</html>