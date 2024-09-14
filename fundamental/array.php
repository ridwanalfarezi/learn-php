<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>

<body>
    <h1>Array</h1>

    <h2>Simple Array</h2>
    <?php
    $numbers = [1, 2, 3, 4, 5];
    ?>
    <ul>
        <?php foreach ($numbers as $number) : ?>
            <li>
                <?php echo $number ?>
            </li>
        <?php endforeach ?>
    </ul>

    <h2>Multi Dimensional Array</h2>
    <?php
    $teams = [
        ["Real Madrid", "Barcelona", "Bayern Munchen"],
        ["Liverpool", "Man City", "Man United"],
        ["Chelsea", "Arsenal", "Tottenham"]
    ]
    ?>
    <ol>
        <?php foreach ($teams as $team) : ?>
            <li>
                <?php foreach ($team as $club) : ?>
                    <ul>
                        <li>
                            <?php echo $club ?>
                        </li>
                    </ul>
                <?php endforeach ?>
            </li>
        <?php endforeach ?>
    </ol>

    <h2>Associative Array</h2>
    <?php
    $person = [
        [
            "firstname" => "Ridwan",
            "lastname" => "Alfarezi",
            "country" => "Indonesia",
            "photo" => "https://picsum.photos/id/237/200/300"
        ],
        [
            "firstname" => "John",
            "lastname" => "Doe",
            "country" => "USA",
            "photo" => "https://picsum.photos/id/238/200/300"
        ]
    ];
    ?>

    <ol>
        <?php foreach ($person as $data) : ?>
            <li>
                <?php foreach ($data as $key => $value) : ?>
                    <ul>
                        <li>
                            <?php if ($key == "photo") : ?>
                                <img src="<?= $value ?>" alt="<?= $data["firstname"] ?>">
                            <?php else : ?>
                                <?= $key ?> : <?= $value ?>
                            <?php endif ?>
                        </li>
                    </ul>
                <?php endforeach ?>
            </li>
        <?php endforeach ?>
    </ol>
</body>

</html>