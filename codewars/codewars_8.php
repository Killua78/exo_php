<?php 

$a1 = [121, 144, 19, 161, 19, 144, 19, 11];
$a2 = [11*11, 121*121, 144*144, 19*19, 161*161, 19*19, 144*144, 19*19];

function comp($a1, $a2) {
    if($a1 === NULL || $a2 === NULL){
        return false;
    }

    if(empty($a1) && empty($a2)){
        return true;
    }else if(empty($a1) || empty($a2)){
        return false;
    }

    $squareRootB = array_map('sqrt', $a2);
    // print_r($squareRootB);
    $aSorted = $a1;
    sort($aSorted);
    // print_r($a1);
    $bSorted = $squareRootB;
    sort($bSorted);
    // print_r($squareRootB);

    if($aSorted == $bSorted){
        echo "True";
        return true;
    }else{
        echo "False";
        return false;
    }
}

comp($a1, $a2);
?>