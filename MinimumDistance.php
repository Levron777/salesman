<?php
class MinimumDistance
{
    private $matrix = [];
    private $currentPosition; // $startPosition
    private $previousPosition; // 0
    private $totalDistance = 0; 
    public $visitedPositions = []; 
    private $totalNumberOfPosition;
    
    public function __construct($request, $matrix) {
        $this->currentPosition = $request;
        $this->totalNumberOfPosition = count($matrix);
    }

    public function getMinimumDistance($matrix) {

        $this->previousPosition = 0;

        for ($i = $this->currentPosition, $j = 1; $j <= $this->totalNumberOfPosition; $j++) {
            if ($matrix[$i][$j] > 0 && !in_array($j, $this->visitedPositions) && $j != $this->previousPosition) {
                $sumDistanceForCurrentPosition[$j] = $this->totalDistance + $matrix[$i][$j];
            }
        }

        $this->previousPosition = $this->currentPosition;
        $this->visitedPositions[] = $this->currentPosition; // стоит выше для того, чтобы нельзя было вернуться в первоначальную позицию
        
        if(is_array($sumDistanceForCurrentPosition)) {
            $this->totalDistance = min($sumDistanceForCurrentPosition);
        } else {
            $this->totalDistance = $this->totalDistance;
        }

        if(is_array($sumDistanceForCurrentPosition)) {
            $this->currentPosition = array_keys($sumDistanceForCurrentPosition, $this->totalDistance)[0];
        } else {
            $this->currentPosition = 0;
        }
        //$visitedPositions[] = $currentPosition; //стоит ниже для того, чтобы можно было вернуться в первоначальную позицию

        if (count($this->visitedPositions) < count($matrix)) {
            self::getMinimumDistance($matrix);
        } else {
            echo 'Кратчайшее расстояние между позициями:  ';
            return print_r($this->totalDistance);
        }
    }
}