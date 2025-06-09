<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Traduction en Morse</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem auto;
            max-width: 600px;
            padding: 0 1rem;
            background: #f9f9f9;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #005f73;
        }
        form {
            margin-top: 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }
        textarea {
            resize: vertical;
            min-height: 100px;
            font-size: 1.1rem;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #0a9396;
            border: none;
            color: white;
            padding: 0.7rem;
            font-size: 1.1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.25s ease;
        }
        button:hover {
            background-color: #005f73;
        }
        pre {
            background: #e0fbfc;
            border: 1px solid #94d2bd;
            border-radius: 4px;
            padding: 1rem;
            font-size: 1.1rem;
            white-space: pre-wrap;
            word-wrap: break-word;
            margin-top: 1rem;
        }
        .error {
            color: #d90429;
            font-weight: bold;
            margin-top: 1rem;
        }
    </style>
</head>
<body>

<h1>Traduction en Morse</h1>

<form method="post" action="">
    <textarea name="texte" placeholder="Entrez votre texte"><?php
        echo isset($_POST['texte']) ? htmlspecialchars($_POST['texte']) : '';
    ?></textarea>
    <button type="submit">Traduire</button>
</form>

<?php
$MORSE_CODE = [
    // Lettres A-Z
    '.-'    => 'A',
    '-...'  => 'B',
    '-.-.'  => 'C',
    '-..'   => 'D',
    '.'     => 'E',
    '..-.'  => 'F',
    '--.'   => 'G',
    '....'  => 'H',
    '..'    => 'I',
    '.---'  => 'J',
    '-.-'   => 'K',
    '.-..'  => 'L',
    '--'    => 'M',
    '-.'    => 'N',
    '---'   => 'O',
    '.--.'  => 'P',
    '--.-'  => 'Q',
    '.-.'   => 'R',
    '...'   => 'S',
    '-'     => 'T',
    '..-'   => 'U',
    '...-'  => 'V',
    '.--'   => 'W',
    '-..-'  => 'X',
    '-.--'  => 'Y',
    '--..'  => 'Z',

    // Chiffres 0-9
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

    // Ponctuations et caractères spéciaux
    '.-.-.-' => '.',      // point
    '--..--' => ',',      // virgule
    '..--..' => '?',      // point d'interrogation
    '.----.' => "'",      // apostrophe
    '-.-.--' => '!',      // point d'exclamation
    '-..-.'  => '/',      // slash
    '-.--.'  => '(',      // parenthèse ouvrante
    '-.--.-' => ')',      // parenthèse fermante
    '.-...'  => '&',      // esperluette (&)
    '---...' => ':',      // deux-points
    '-.-.-.' => ';',      // point-virgule
    '-...-'  => '=',      // égal
    '.-.-.'  => '+',      // plus
    '-....-' => '-',      // tiret
    '..--.-' => '_',      // underscore
    '.-..-.' => '"',      // guillemets
    '...-..-' => '$',     // dollar
    '.--.-.' => '@',      // arobase

    // Accents français courants (représentations courantes en Morse étendu)
    '.-.-'   => 'À',
    '--.-.'  => 'Ç',
    '..-..'  => 'É',
    '..--.'  => 'È',
    '.-..-'  => 'Ë',
    '.-..'   => 'L',  // déjà défini mais utilisé aussi pour Ë
    '...-.'  => 'Ü',
    '---.'   => 'Ö',
    '--.--'  => 'Ñ',
];

function translateMorse(string $text): string {
    global $MORSE_CODE;
    $letterToMorse = array_flip($MORSE_CODE);

    $words = explode(' ', mb_strtoupper($text));
    $morseWords = [];

    foreach ($words as $word) {
        $morseLetters = [];
        $letters = mb_str_split($word);
        foreach ($letters as $letter) {
            $morseLetters[] = $letterToMorse[$letter] ?? '?';
        }
        $morseWords[] = implode(' ', $morseLetters);
    }
    return implode('   ', $morseWords);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = trim($_POST['texte'] ?? '');

    if (empty($input)) {
        echo '<p class="error">Veuillez entrer un texte à traduire.</p>';
    }else{
        $result = translateMorse($input);
        echo '<pre>' . htmlspecialchars($result) . '</pre>';
    }
}
?>

</body>
</html>
