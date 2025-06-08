<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire complet associatif</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="user[nom]" id="nom" placeholder="votre nom">
        <input type="text" name="user[prenom]" id="prenom" placeholder="votre prénom">
        <input type="email" name="user[email]" id="email" placeholder="votre email">
        <input type="password" name="user[password]" id="password" placeholder="mot de passe">
        <input type="password" name="user[password-confirm]" id="password-confirm" placeholder="confirmez le mot de passe">
        <button type="submit">Envoyer</button>
    </form>

    <?php

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(!empty($_POST["user"]["nom"]) &&
            !empty($_POST["user"]["prenom"]) &&
            !empty($_POST["user"]["email"]) &&
            !empty($_POST["user"]["password"]) &&
            !empty($_POST["user"]["password-confirm"])){
                $mail = $_POST["user"]["email"];
                $pass = $_POST["user"]["password"];
                $passConfirm = $_POST["user"]["password-confirm"];
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                    if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $pass)){
                        if($pass === $passConfirm){
                            $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
                            $_POST["user"]["password"] = $hashedPass;
                            unset($_POST["user"]['password-confirm']); // on enlève le confirm, plus besoin
                            print_r($_POST['user']);
                        }
                }
            }else{
                echo "Email invalide";
            }
        }else{
            echo "Veuillez remplir TOUS les champs";
        }
    }
    ?>
</body>
</html>