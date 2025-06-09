<?php

function uniqueInOrder($iterable){
    $arrayValue = str_split($iterable);
    // print_r($arrayValue);
    $finalArray = [];
//   return $ret; 
    for($i = 0; $i < count($arrayValue); $i++){
        if(!isset($arrayValue[$i + 1]) || $arrayValue[$i] !== $arrayValue[$i + 1]){
            $finalArray[] = $arrayValue[$i];
        }
    }
    return $finalArray;
    print_r($finalArray);
}

uniqueInOrder("AAAABBBCCDAABBB");
?>