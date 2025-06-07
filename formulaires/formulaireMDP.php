<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire avec mdp</title>
</head>

<body>
    <form action="" method="post">
        <input type="password" name="password" id="password" placeholder="Mot de passe">
        <input type="password" name="password-confirm" id="password-confirm" placeholder="Confirmez le mot de passe">
        <button type="submit">Envoyer</button>
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (!empty($_POST['password']) && !empty($_POST['password-confirm'])) {
            $pass = str_split($_POST['password']);
            $passConfirm = str_split($_POST['password-confirm']);
            print_r($pass);
            print_r($passConfirm);
            if ($pass === $passConfirm) {
                echo "Mot de passe confirmé";
            } else {
                echo "Les mots de passe sont différents";
            }
        } else {
            echo "Veuillez remplir tous les champs";
        }
    }

    // CONSEIL : ajouter un REGEX pour vérification de mdp
    //$pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';

    // if (preg_match($pattern, $_POST['password'])) {
    //     echo "Mot de passe valide";
    // } else {
    //     echo "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre.";
    // }

    ?>
</body>

</html>