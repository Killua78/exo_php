<?php



function solution($number)
{
    $romains = [
        1000 => "M",
        900  => "CM",
        500  => "D",
        400  => "CD",
        100  => "C",
        90   => "XC",
        50   => "L",
        40   => "XL",
        10   => "X",
        9    => "IX",
        5    => "V",
        4    => "IV",
        1    => "I"
    ];
    $result = [];
    foreach($romains as $valeur => $lettre){
        while($number >= $valeur){
            $result[]= $lettre;
            $number -= $valeur;
        }
    }
    $result = implode("", $result);
    return $result;
}

echo solution(1666);

?>