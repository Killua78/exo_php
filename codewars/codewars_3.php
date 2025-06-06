<?php

function toJadenCase(string $string): string
{
    $arrayString = explode(" ", $string);
    // print_r($arrayString);
    foreach($arrayString as $i => $value){
        $arrayString[$i] = ucfirst($value);
        // print_r($word);

    }

    $arrayString = implode(" ", $arrayString);
    echo $arrayString;
    return $arrayString;
}

toJadenCase("How can mirrors be real if our eyes aren't real");

?>