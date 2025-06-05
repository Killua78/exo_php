<?php

function narcissistic(int $value): bool
{
  // Your code here
  $arrayNarcis = str_split($value);
//   print_r($arrayNarcis);
  foreach($arrayNarcis as $i => $number){
    $arrayNarcis[$i] = $number ** count($arrayNarcis);
    // print_r($arrayNarcis[$i]);
  }
  $sum = array_sum($arrayNarcis);
//   print_r($sum);
  if($sum === $value){
    echo "c'est un nombre narcissique";
    return true;
  }else{
    echo "ce n'est pas un nombre narcissique";
    return false;
  }
//   print_r($number);
//   return true;
}

narcissistic(153);

?>

