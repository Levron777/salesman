<!DOCTYPE html>
<html lang="en">
<head>
    <meta chmatrixset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="conteiner">
    <img src="img/img.png" alt="">
</div>

    <?php
    
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
        
        $startPosition = 1;
        
        $currentPosition = $startPosition;
        $previousPosition = 0;
        $totalDistance = 0;
        $visitedPositions = [];
        

        function getMinimumDistance($matrix) {

            global $totalDistance, $currentPosition, $visitedPositions, $previousPosition; //$i
            $totalNumberOfPosition = count($matrix);

            for ($i = $currentPosition, $j = 1; $j <= $totalNumberOfPosition; $j++) {
                if ($matrix[$i][$j] > 0 && !in_array($j, $visitedPositions) && $j != $previousPosition) {
                    $sumDistanceForCurrentPosition[$j] = $totalDistance + $matrix[$i][$j];
                }
            }

            $previousPosition = $currentPosition;
            // $visitedPositions[] = $currentPosition; // стоит выше для того, чтобы нельзя было посетить первоначальную позицию
            
            if(is_array($sumDistanceForCurrentPosition)) {
                $totalDistance = min($sumDistanceForCurrentPosition);
            } else {
                $totalDistance = $totalDistance;
            }

            if(is_array($sumDistanceForCurrentPosition)) {
                $currentPosition = array_keys($sumDistanceForCurrentPosition, $totalDistance)[0];
            } else {
                $currentPosition = 0;
            }
            $visitedPositions[] = $currentPosition; //стоит ниже для того, чтобы можно было посетить первоначальную позицию, при условии коратчайщего пути до нее

            if (count($visitedPositions) < count($matrix)) {
                getMinimumDistance($matrix);
            } else {
                echo 'Кратчайшее расстояние между позициями:  ';
                return print_r($totalDistance);
            }
        }

        getMinimumDistance($matrix);

        echo '</br>';
        echo "Начальная позиция: " . "$startPosition";

        echo '</br>';
        echo "Порядок проследования позиций: ";
        foreach ($visitedPositions as $position) {
            echo "$position, ";
        }
    ?>
</body>
</html>