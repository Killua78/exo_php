<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire déroulant</title>
</head>
<body>
    <form action="" method="post">
        <select name="colors" id="color-select">
            <option value=""></option>
            <option value="vert">vert</option>
            <option value="bleu">bleu</option>
            <option value="rouge">rouge</option>
        </select>

        <fieldset>
            <!-- avec [] on place tout dans un tableau et on peut vérifier facilement s'il n'est pas vide -->
            <legend>Choisissez un loisir</legend>
            <div>
                <input type="checkbox" name="loisirs[]" id="foot">
                <label for="foot">Foot</label>
            </div>
            <div>
                <input type="checkbox" name="loisirs[]" id="lecture">
                <label for="lecture">Lecture</label>
            </div>
            <div>
                <input type="checkbox" name="loisirs[]" id="musique">
                <label for="musique">Musique</label>
            </div>
        </fieldset>
        <button type="submit">Envoyer</button>
    </form>

    <?php

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(!empty($_POST['colors']) && !empty($_POST['loisirs'])){
            if(count($_POST['loisirs']) == 1){
                echo "Votre couleur préférée est " . $_POST['colors'] . " et votre loisir est : " . $_POST['loisirs'][0];
            }else if(strlen($_POST['loisirs']) > 1){ 
                echo "Votre couleur préférée est " . $_POST['colors'] . " et vos loisirs sont : ";
            }
        }else if(empty($_POST['colors']) && empty($_POST['loisirs'])){
            echo "Veuillez remplir tous les champs";
        }
    }

    ?>
    
</body>
</html>