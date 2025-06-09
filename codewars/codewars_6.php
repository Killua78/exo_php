<?php 

$MORSE_CODE = [
    '.-' => 'A',
    '-...' => 'B',
    '-.-.' => 'C',
    '-..' => 'D',
    '.' => 'E',
    '..-.' => 'F',
    '--.' => 'G',
    '....' => 'H',
    '..' => 'I',
    '.---' => 'J',
    '-.-' => 'K',
    '.-..' => 'L',
    '--' => 'M',
    '-.' => 'N',
    '---' => 'O',
    '.--.' => 'P',
    '--.-' => 'Q',
    '.-.' => 'R',
    '...' => 'S',
    '-' => 'T',
    '..-' => 'U',
    '...-' => 'V',
    '.--' => 'W',
    '-..-' => 'X',
    '-.--' => 'Y',
    '--..' => 'Z',
    '-----' => '0',
    '.----' => '1',
    '..---' => '2',
    '...--' => '3',
    '....-' => '4',
    '.....' => '5',
    '-....' => '6',
    '--...' => '7',
    '---..' => '8',
    '----.' => '9',
];

function decode_morse(string $code): string {
    global $MORSE_CODE;
    $code = trim($code);
    $words = explode("   ", $code);
    $morseWords = [];

    foreach($words as $word){
        $letters = explode(" ", $word);
        $morseWord = "";
        foreach($letters as $letter){
            if($letter !== ''){
                $morseCode = $MORSE_CODE[$letter];
                $morseWord .= $morseCode;
            }
        }
        $morseWords[] = $morseWord; 
    }

    return implode(" ", $morseWords);
}

echo decode_morse('.... . -.--   .--- ..- -.. .');

?>