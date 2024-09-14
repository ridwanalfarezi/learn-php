<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>

<body>
    <h1>POST</h1>
    <form method="post">
        <input type="text" name="nama">
        <button type="submit">Submit</button>
    </form>
    <?php if (isset($_POST["nama"])) : ?>
        <p><?php echo $_POST["nama"] ?></p>
    <?php else : ?>
        <p>Please enter your name</p>
    <?php endif ?>
</body>

</html>