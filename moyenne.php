 <?php

$notes = array(
    8, 10, 12, 13, 17
);

$sommeNotes = array_sum($notes);
$moyenne = $sommeNotes / count($notes);

echo "La moyenne de l'élève est de " . $moyenne . ".";
?>