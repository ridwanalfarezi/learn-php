<?php
$grade1 = 80;
$grade2 = 50;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Flow</title>
</head>

<body>
    <h1>Control Flow</h1>
    <h2>Loops</h2>

    <h3>For Loop</h3>
    <table border="1" cellpadding="10">
        <?php for ($i = 0; $i < 10; $i++) : ?>
            <tr>
                <?php for ($j = 0; $j < 10; $j++) : ?>
                    <td>
                        <?php echo "$i, $j" ?>
                    </td>
                <?php endfor ?>
            </tr>
        <?php endfor ?>
    </table>

    <h3>While Loop</h3>
    <table>
        <?php $i = 0; ?>
        <?php while ($i < 10) : ?>
            <tr>
                <td>
                    <?php echo "No. $i" ?>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endwhile ?>
    </table>

    <h3>Do While Loop</h3>
    <?php
    $i = 0;
    do {
        echo "Do While Loop: " . $i . "<br>";
        $i++;
    } while ($i < 10);
    ?>

    <h3>For Each Loop</h3>
    <?php
    $fruits = ["Apple", "Banana", "Cherry"];
    ?>
    <ul>
        <?php foreach ($fruits as $fruit) : ?>
            <li>
                <?php echo $fruit ?>
            </li>
        <?php endforeach ?>
    </ul>

    <h3>Conditional Statements</h3>
    <p>Grade 1 : <?php echo $grade1 ?></p>
    <?php if ($grade1 >= 70) : ?>
        <h4 style="color: green">Passed</h4>
    <?php else : ?>
        <h4 style="color: red">Failed</h4>
    <?php endif ?>

    <p>Grade 2 : <?php echo $grade2 ?></p>
    <?php if ($grade2 >= 70) : ?>
        <h4 style="color: green">Passed</h4>
    <?php else : ?>
        <h4 style="color: red">Failed</h4>
    <?php endif ?>

    <h3>Looping with conditial</h3>

    <table border="1">
        <?php for ($i = 0; $i < 10; $i++) : ?>
            <tr>
                <?php if ($i % 2 == 0) : ?>
                    <td style="background-color: red">
                    <?php else : ?>
                    <td style="background-color: green">
                    <?php endif ?>
                    <?php echo $i ?>
                    </td>
            </tr>
        <?php endfor ?>
    </table>
</body>

</html>