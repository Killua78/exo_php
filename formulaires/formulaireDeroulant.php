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
                <input type="checkbox" name="loisirs[]" id="foot" value="Foot">
                <label for="foot">Foot</label>
            </div>
            <div>
                <input type="checkbox" name="loisirs[]" id="lecture" value="Lecture">
                <label for="lecture">Lecture</label>
            </div>
            <div>
                <input type="checkbox" name="loisirs[]" id="musique" value="Musique">
                <label for="musique">Musique</label>
            </div>
        </fieldset>
        <button type="submit">Envoyer</button>
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_POST['colors']) && !empty($_POST['loisirs'])) {
            if (count($_POST['loisirs']) == 1) {
                echo "Votre couleur préférée est " . $_POST['colors'] . " et votre loisir est : " . $_POST['loisirs'][0];
            } else if (count($_POST['loisirs']) > 1) {
                echo "Votre couleur préférée est " . $_POST['colors'] . " et vos loisirs sont : " . strtolower(implode(", ", $_POST['loisirs']));
            }
        } else if (empty($_POST['colors']) && empty($_POST['loisirs'])) {
            echo "Veuillez remplir tous les champs";
        }
    }

    // Capitaliser juste la première lettre de chaque loisir : ucwords($loisirs)

    // Ou juste la première lettre de toute la phrase : ucfirst($loisirs)

    ?>

    <!-- CORRECTION CHAT GPT -->
    <!-- if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_POST['colors']) && !empty($_POST['loisirs'])) {
            $color = htmlspecialchars($_POST['colors']); 
            $loisirs = array_map('htmlspecialchars', $_POST['loisirs']); -> applique ça à tous les éléments du tableau

            if (count($loisirs) === 1) {
                echo "Votre couleur préférée est $color et votre loisir est : " . $loisirs[0];
            } else {
                echo "Votre couleur préférée est $color et vos loisirs sont : " . implode(", ", $loisirs);
            }
        } else if (empty($_POST['colors']) && empty($_POST['loisirs'])) {
            echo "Veuillez remplir tous les champs";
        }
    } -->



</body>

</html>