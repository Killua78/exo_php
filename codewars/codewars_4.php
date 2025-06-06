<?php

function isIsogram($string) {

    $arrayString = str_split(strtolower($string));
    // print_r($arrayString);
    $compare = [];
    foreach($arrayString as $i){
        if(in_array($i, $compare)){
            return false;
        }
        $compare[] = $i;
    }
    return true;
}




var_dump(isIsogram("Dermatoglyphics"));
var_dump(isIsogram("isogram"));
var_dump(isIsogram("aba"));