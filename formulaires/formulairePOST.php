<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire POST</title>
</head>
<body>
    <form method="post">
        <input type="text" name="prenom">
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>

<?php

if(isset($_POST['prenom']) && !empty($_POST['prenom'])){
    echo "Bienvenue " . htmlspecialchars($_POST['prenom']);
}else if(isset($_POST['prenom']) && empty($_POST['prenom'])){
    echo "Veuillez remplir le champ";
}

?>