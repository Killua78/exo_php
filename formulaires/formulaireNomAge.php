<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Nom Âge</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="nom" placeholder="nom">
        <input type="text" name="âge" placeholder="age">
        <button type="submit">Envoyer</button>
    </form>

    <?php

    if(!empty($_POST['nom']) && !empty($_POST['age'])){
        if(is_numeric($_POST['age'])){
            $nom = htmlspecialchars($_POST['nom']);
            $age = htmlspecialchars($_POST['age']);
            echo "Bonjour " . $nom . ", tu as " . $age . " ans.";
        }else{
            echo "L'âge doit être un nombre";
        }
    }else if(isset($_POST['nom']) && isset($_POST['age'])){
        echo "Veuillez remplir tous les champs";
    }

    ?>
</body>
</html>