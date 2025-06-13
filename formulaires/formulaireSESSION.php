<?= session_start(); // indispensable pour activer les sessions ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Session</title>
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

    <table>
        <thead>
            <tr>
                <?php foreach($_SESSION["users"][0] as $key => $user){
                    echo "<th> " . $key . " </th>";
                } ?>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>oui</td>
                <td>oui</td>
                <td>oui</td>
            </tr>
            <tr>
                <td>oui</td>
                <td>oui</td>
                <td>oui</td>
            </tr>
        </tbody>
    </table>
</body>

</html>

<?php

// Avant d’ajouter un utilisateur, vérifier si la clé users existe, sinon on initialise

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = []; // crée un tableau vide
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        !empty($_POST["user"]["nom"]) &&
        !empty($_POST["user"]["prenom"]) &&
        !empty($_POST["user"]["email"]) &&
        !empty($_POST["user"]["password"]) &&
        !empty($_POST["user"]["password-confirm"])
    ) {
        $mail = $_POST["user"]["email"];
        $pass = $_POST["user"]["password"];
        $passConfirm = $_POST["user"]["password-confirm"];
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $pass)) {
                if ($pass === $passConfirm) {
                    $emailExiste = false;
                    foreach ($_SESSION['users'] as $user) {
                        if ($user["email"] === $mail) {
                            $emailExiste = true;
                            break;
                        }
                    }

                    if ($emailExiste) {
                        echo "Le mail existe déjà";
                    } else {
                        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
                        $_POST["user"]["password"] = $hashedPass;
                        unset($_POST["user"]['password-confirm']);
                        $_SESSION['users'][] = $_POST["user"];
                        print_r($_SESSION['users']);
                        print_r($_POST["user"]);
                    }
                } else {
                    echo "Les mots de passe sont différents";
                }
            } else {
                echo "Le mot de pase doit contenir au moins 8 caractères, dont un chiffre et un caractère spécial";
            }
        } else {
            echo "Email invalide";
        }
    } else {
        echo "Veuillez remplir TOUS les champs";
    }
}

$compteur = count($_SESSION["users"]);
echo "<br> Nombre d'utilisateurs : " . $compteur;

?>