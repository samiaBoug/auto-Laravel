<?php
function quickSort($arr) {
    if (count($arr) <= 1) {
        return $arr;
    }

    $pivot = $arr[0];
    $left = [];
    $right = [];

    foreach ($arr as $key => $value) {
        if ($key === 0) continue; 
        if ($value < $pivot) {
            $left[] = $value;
        } else {
            $right[] = $value;
        }
    }

    return array_merge(quickSort($left), [$pivot], quickSort($right));
}

// Test de l'algorithme
$array = [5, 2, 7, 3, 8, 5];
$sorted = quickSort($array);

echo "Tableau trié : " . implode(", ", $sorted);