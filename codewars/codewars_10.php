<?php

function validBraces($braces) {
    $map = ["(" => ")", "[" => "]", "{" => "}"];
    $stack = [];

    // Parcours chaque caractère de la chaîne
    for ($i = 0; $i < strlen($braces); $i++) {
        $char = $braces[$i];

        // Si c'est un caractère ouvrant, on l'empile
        if (array_key_exists($char, $map)) {
            array_push($stack, $char);
        } else {
            // C'est un caractère fermant
            if (empty($stack)) {
                // Il n'y a rien à fermer, donc c'est invalide
                return false;
            }

            // On dépile le dernier ouvrant
            $lastOpen = array_pop($stack);

            // Vérifie si le fermant correspond à l'ouvrant
            if ($map[$lastOpen] !== $char) {
                return false;
            }
        }
    }

    // Si la pile est vide, tout a été correctement fermé
    return empty($stack);
}
