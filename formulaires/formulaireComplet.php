<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="nom" id="nom" placeholder="Nom">
        <input type="text" name="prenom" id="prenom" placeholder="Prenom">
        <input type="email" name="email" id="email" placeholder="email">
        <input type="password" name="password" id="password" placeholder="mot de passe">
        <input type="password" name="password-confirm" id="password-confirm" placeholder="confirmez le mot de passe">
        <button type="submit">Envoyer</button>
    </form>

    <?php

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(!empty($_POST["nom"]) &&
            !empty($_POST["prenom"]) &&
            !empty($_POST["email"]) &&
            !empty($_POST["password"]) &&
            !empty($_POST["password-confirm"])){
                $mail = $_POST["email"];
                $pass = $_POST["password"];
                $passConfirm = $_POST["password-confirm"];
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                    if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $pass)){
                        if($pass === $passConfirm){
                            // hasher le mdp pour la sécurité
                            $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
                            unset($pass, $passConfirm); // optionnel pour simuler "nettoyage"
                            echo "Bonjour " . htmlspecialchars($_POST["nom"]) . " " . htmlspecialchars($_POST["prenom"]) .  ", votre mail est : " . htmlspecialchars($mail) . " et votre mdp hashé est : " . $hashedPassword;
                        }else{
                            echo "Les mots de passe sont différents";
                        }
                    }else{
                        echo "mot de passe invalide";
                    }
                }else{
                    echo "Mail invalide";
                }
        }else{
            echo "Veuillez remplir TOUS les champs";
        }
        
    }

    ?>
</body>
</html>