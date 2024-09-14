<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie("cookie", "", time() - 3600);
setcookie("cookie2", "", time() - 3600);

header("Location: login.php");
