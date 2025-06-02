<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertisseur</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="number" placeholder="entrez un nombre">
        <button type="submit">Envoyer</button>
    </form>

    <?php

    if(isset($_POST['number']) && !empty($_POST['number'])){
        if(is_numeric($_POST['number'])){
            $km = $_POST['number'];
            $metres = $km * 1000;
            echo htmlspecialchars($km) . " km = " . $metres . " mètres";
        }else{
            echo "Veuillez entrer un nombre valide";
        }
    }else if(isset($_POST['number'])){
        echo "Veuillez remplir tous les champs";
    }

    ?>
</body>
</html>