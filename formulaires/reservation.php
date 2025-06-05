<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="nom" required placeholder="nom">
        <input type="email" name="email" id="email" required placeholder="email">
        <textarea name="commentaire" id="commentaire" required placeholder="commentaire"></textarea>
        <button type="submit">Envoyer</button>
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['commentaire'])){
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                echo "Nom: " . htmlspecialchars($_POST['nom']) . "<br>" . 
                     "Email: " . htmlspecialchars($_POST['email']) . "<br>" . 
                     "Commentaire: " . nl2br(htmlspecialchars($_POST['commentaire']));
                    //  nl2br = pour les saut de ligne 
            }else{
                echo "Email invalide";
            }
        }else{
            echo "Veuillez remplir tous les champs";
        }
    }


    ?>
</body>
</html>