<?php
session_start();

// Traitement du formulaire de connexion AVANT le HTML
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        $trouve = false;
        foreach ($_SESSION["users"] as $user) {
            if ($_POST["email"] === $user["email"]) {
                $trouve = true;
                if (password_verify($_POST["password"], $user["password"])) {
                    $_SESSION['logged_user'] = $user;
                    header("Location: " . $_SERVER['PHP_SELF']); // recharge la page pour afficher le bon contenu
                    exit;
                } else {
                    $error = "Mot de passe incorrect";
                }
            }
        }
        if (!$trouve) {
            $error = "Ce mail n'existe pas, veuillez vous inscrire";
        }
    } else {
        $error = "Veuillez remplir tous les champs";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Connexion</title>
</head>
<body>

<?php if (isset($_SESSION["logged_user"])): ?>
    <p>Bienvenue <?= htmlspecialchars($_SESSION["logged_user"]["nom"]) . " " . htmlspecialchars($_SESSION["logged_user"]["prenom"]) ?></p>
    <a href="logout.php">Se déconnecter</a>
<?php else: ?>
    <?php if (!empty($error)): ?>
        <p style="color:red"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <input type="email" name="email" placeholder="votre email">
        <input type="password" name="password" placeholder="mot de passe">
        <button type="submit">Confirmer</button>
    </form>
<?php endif; ?>

</body>
</html>
