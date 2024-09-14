<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>

<body>

    <h1>GET</h1>
    <form>
        <input type="text" name="name">
        <button type="submit">Submit</button>
    </form>
    <?php if (isset($_GET["name"])) : ?>
        <p><?php echo $_GET["name"] ?></p>
    <?php else : ?>
        <p>Please enter your name and check url after submitted form</p>
    <?php endif ?>
</body>

</html>