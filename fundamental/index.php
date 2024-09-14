<?php
// Variables
$firstname = "Ridwan";
$lastname = "Alfarezi";
$tech = "PHP";
$year = 2024;

// Concat
$fullname = $firstname . " " . $lastname;

// Assignment Operators
$tech .= " in ";
$tech .= $year;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fundamentals PHP</title>
</head>

<body>
    <h1>Hello, I'm <?php echo $fullname ?></h1>
    <p>I'm currently learning <?php echo $tech ?></p>


</body>

</html>