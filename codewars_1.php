<?php

function spinWords(string $str): string
{
    $words = explode(" ", $str);
    //   print_r($words);
    foreach ($words as $i => $word) {
        // print_r($word);
        if (strlen($word) >= 5) {
            $word = str_split($word);
            // print_r($word);
            $wordReverse = array_reverse($word);
            // print_r($wordReverse);
            $word = implode("", $wordReverse);
            // print_r($word);
            $words[$i] = $word;
        }
    }
    // print_r($words);
    $str = implode(" ", $words);
    return $str;
}

echo spinWords("salut comment tu vas ?");
