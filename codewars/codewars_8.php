<?php 

function comp($a1, $a2) {
    $a1 = [121, 144, 19, 161, 19, 144, 19, 11];
    $a2 = [11*11, 121*121, 144*144, 19*19, 161*161, 19*19, 144*144, 19*19];
    if($a1 === NULL || $a2 === NULL){
        return false;
    }

    if(empty($a1) && empty($a2)){
        return true;
    }else if(empty($a1) || empty($a2)){
        return false;
    }

    $square = array_map(function($value){
        return pow($value, 2);
    }, $a1);
    print_r($square);
}

echo comp($a1, $a2);
?>