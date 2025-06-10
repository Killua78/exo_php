<?php

function uniqueInOrder($iterable){
    if (empty($iterable)) {
        return [];
    }
  
    if (is_string($iterable)) {
        $arrayValue = str_split($iterable);
    } elseif (is_array($iterable)) {
        $arrayValue = $iterable;
    }
    $finalArray = [];
//   return $ret; 
    for($i = 0; $i < count($arrayValue); $i++){
        if(!isset($arrayValue[$i + 1]) || $arrayValue[$i] !== $arrayValue[$i + 1]){
            $finalArray[] = $arrayValue[$i];
        }
    }
    return $finalArray;
//    print_r($finalArray);
}

uniqueInOrder("AAAABBBCCDAABBB");
?>