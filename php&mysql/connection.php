<?php
$connection = mysqli_connect('localhost', 'root', '', 'phpfundamental');

if (!$connection) {
    die("Database connection failed");
}
