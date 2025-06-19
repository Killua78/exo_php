<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Connexion</title>
</head>
<body>
    <form action="" method="post">
        <input type="email" name="email" placeholder="votre email">
        <input type="password" name="password" placeholder="mot de passe">
        <button type="submit">Confirmer</button>
    </form>
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(!empty($_POST["email"]) && !empty($_POST["password"])){
        $trouve = false; // pour l'existence du mail
        foreach(($_SESSION["users"]) as $user){
            if($_POST["email"] === $user["email"]){
                $trouve = true;
                if(password_verify($_POST["password"], $user["password"])){
                    $_SESSION['logged_user'] = $user;
                    echo "Bienvenue " . $user["nom"] . " " . $user["prenom"];
                }else{
                    echo "mot de passe incorrect";
                }
            }
        }
        if(!$trouve){
            echo "Ce mail n'existe pas, veuillez vous inscrire";
        }
        
    }else{
        echo "Veuillez remplir tous les champs";
    }
}

?>