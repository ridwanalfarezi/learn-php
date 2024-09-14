<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function</title>
</head>

<body>
    <h1>Function</h1>

    <h2>Date Function</h2>
    <p><?php echo date("l, d-M-Y") ?></p>

    <h2>Time Function</h2>
    <p><?php echo time() ?></p>

    <h2>User Defined Function</h2>
    <?php function sayHello($name = "Guest")
    {
        return "Hello $name";
    }
    ?>
    <p><?= sayHello() ?></p>
    <p><?= sayHello("Ridwan") ?></p>
</body>

</html>