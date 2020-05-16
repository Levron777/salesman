<!DOCTYPE html>
<html lang="en">
<head>
    <meta chmatrixset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="conteiner">
    <img src="img/img.png" alt="picture">
    <br>
    <br>
    <div>
        <form action="" method="post">
            <label for="startPosition">Ведите начальную позицию:</label>
            <input type="text" name="startPosition" value="1">
            <input type="submit" name="submitForm">
        </form>
        <br>
        <hr>
    </div>
</div>

<?php

    require_once("MinimumDistance.php");

    $matrix[1][1] = 0;
    $matrix[1][2] = 7;
    $matrix[1][3] = 9;
    $matrix[1][6] = 14;

    $matrix[2][2] = 0;
    $matrix[2][1] = 7;
    $matrix[2][3] = 10;
    $matrix[2][4] = 15;

    $matrix[3][3] = 0;
    $matrix[3][1] = 9;
    $matrix[3][2] = 10;
    $matrix[3][4] = 11;
    $matrix[3][6] = 2;

    $matrix[4][4] = 0;
    $matrix[4][2] = 15;
    $matrix[4][3] = 11;
    $matrix[4][5] = 6;

    $matrix[5][5] = 0;
    $matrix[5][4] = 6;
    $matrix[5][6] = 9;

    $matrix[6][6] = 0;
    $matrix[6][1] = 14;
    $matrix[6][3] = 2;
    $matrix[6][5] = 9;
    
    $startPosition = $_REQUEST['startPosition'];
    $minimumDistance = new MinimumDistance($startPosition, $matrix);
    $minimumDistance->getMinimumDistance($matrix);

    echo '</br>';
    echo "Начальная позиция: " . "$startPosition";

    echo '</br>';
    echo "Порядок проследования позиций: ";
    foreach ($minimumDistance->visitedPositions as $position) {
        echo "$position ";
    }
?>
</body>
</html>