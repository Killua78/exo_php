<?php

function createPhoneNumber($numbersArray) {
    $slice1 = implode(array_slice($numbersArray, 0, 3));
    // print_r($slice1);
    $slice2 = implode(array_slice($numbersArray, 
    3, 3));
    // print_r($slice2);
    $slice3 = implode(array_slice($numbersArray, 
    6));
    // print_r($slice3);
    echo "'(" . $slice1 . ")" . " " . $slice2 . "-" . $slice3 ."'";

}

createPhoneNumber([1,2,3,4,5,6,7,8,9,0]);