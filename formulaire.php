<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
    <main>
        <form method="get">
            <input type="text" id="name" name="prenom">
            <button type="submit" >Envoyer</button>
        </form>
    </main>
</body>
</html>

<?php
    if(isset($_GET['prenom']) && !empty($_GET['prenom'])){
        echo "Bonjour " . htmlspecialchars($_GET['prenom']);
    }
?>