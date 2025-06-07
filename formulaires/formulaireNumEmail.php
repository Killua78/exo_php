<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Email - Numéro</title>
</head>
<body>
    <form action="" method="post">
        <input type="email" name="email" id="email" placeholder="Votre email">
        <input type="tel" name="numero" id="numero" placeholder="Votre numéro de téléphone">
        <button type="submit">Envoyer</button>
    </form>

    <?php

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $mail = $_POST["email"];
        $numero = $_POST["numero"];
        if(!empty($_POST["email"]) && !empty($_POST["numero"])){
            // regex pour numéro français avec 06 et +33
            if(!preg_match("#^(\+33|0)[67][0-9]{8}$#", $numero)){
                echo "numéro incorrect";
            }else{
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                    echo "Merci ! <br>" . "Votre email : " . htmlspecialchars($mail) . "<br>" . "Votre numéro : " . htmlspecialchars($numero); 
                }else{
                    echo "Champs invalides";
                }
            }
        }else{
            echo "Remplissez tous les champs";
        }
    }
    ?>
</body>
</html>