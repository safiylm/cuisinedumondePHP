<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Modifier Recette</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/ajouter_recette.scss" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    session_start();
    include("../navigation/index.php");
    ?>

</head>

<body>
    <?php

    $path = '../data/recette.json';
    $json_object = file_get_contents($path);
    $tab = json_decode($json_object, true);
    $id = htmlspecialchars($_GET['idRecette']);
    if (isset($id)) {
        $recette = $tab["sitecuisine"]["liste_recette"]['recette'][$id];
    }

    ?>
    <div class="container-ajouter-recette">

        <form method='post' action="post-update-recette.php">
            <input type="hidden" name="idRecette" value="<?php echo $id; ?>" />

            <input type="text" id="nom-recette" name="titre" class="input" value="<?php echo $recette['titre']; ?>" />
            <img src="<?php echo $recette['image']; ?>">
            <input type="text" name="url-image" class="input" value="<?php echo $recette['image']; ?>" />

            <input type="text" id="nb-personne" name="nb-personne" class="input" value="<?php echo $recette['liste_ingredients']['nb_personne']; ?>" />

            <input type="text" id="temps_total" name="temps_total" class="input" value="<?php echo $recette['temps_total']; ?>" />

            <select name="categorie" id="categorie" class="input">
                <option value="<?php echo $recette['categorie']; ?>"><?php echo $recette['categorie']; ?></option>
                <?php foreach ($tab["sitecuisine"]["liste_categorie"]["categorie"] as $item) {
                    if ($item != $recette['categorie'])
                        echo "<option value='" . $item . "'>" . $item . "</option>";
                } ?>
            </select>

            <select name="difficulte" id="difficulte" class="input" required>
                <option value="<?php echo $recette['difficulte']; ?>" selected><?php echo $recette['difficulte']; ?></option>
                <option value="Facile">Facile</option>
                <option value="Intermédiaire">Intermédiaire</option>
                <option value="Difficile">Difficile</option>
            </select>

            <select name="cout" id="cout" class="input" required>
                <option value="<?php echo $recette['cout']; ?>" selected><?php echo $recette['cout']; ?></option>
                <option value="Pas cher">Pas cher</option>
                <option value="Abordable">Abordable</option>
                <option value="Assez cher">Assez cher</option>
            </select>


            </br>
            <p>Entrez les ingrédients </p>
            <div id="div-ingredient-parent" class="div-ingredient-parent">

                <?php for ($i = 0; $i < count($recette['liste_ingredients']['ingredient']); $i++) {
                    $ingred = $recette['liste_ingredients']['ingredient'][$i]; ?>
                    <div id="div-ingredient-enfant-nb-<?php echo $i; ?>" class="div-ingredient-enfant">

                        <input type="text" class="input-ing" name="un-ingredient-nb-<?php echo $i; ?>" value='<?php echo $ingred; ?>' />
                    </div>
                <?php }; ?>
            </div>

            <input type='hidden' name='nb-ingredients-total' id='nb-ingredients-total' value="<?php echo count($recette['liste_ingredients']['ingredient']); ?>" />
            <button type="button" class="btnn" onClick="ajouterIngredient()"> Ajouter un ingrédient </button>
            </br></br></br>


            <p>Entrez les étapes </p>
            <div id="div-etape-parent" class="div-ingredient-parent">

                <?php for ($i = 0; $i < count($recette['preparation']['etape']); $i++) {
                    $etape = $recette['preparation']['etape'][$i]; ?>
                    <div id="div-etape-enfant-nb-<?php echo $i; ?>" class="div-ingredient-enfant">
                        <textarea type="text" class="input_etape" id="etape0" name="une-etape-nb-<?php echo $i; ?>" required><?php echo $etape; ?></textarea>
                    </div>

                <?php }; ?>
            </div>
            <input type='hidden' name='nb-etapes-total' id='nb-etapes-total' value="<?php echo count($recette['preparation']['etape']); ?>" />

            <button type="button" class="btnn" onClick="ajouterEtape()"> Ajouter une étape </button>


            </br></br>

            <p class="fontbeautifull">Ajouter photo
                <input class="btnFile" type="file" style="padding:20px; font-size:18px;" name="photo" accept=".gif, .jpg , .png, .jpeg" />
            </p>


            <button type="sunmit" class="btn-submit"> Ajouter la recette </button>

        </form>


        <button onclick="deleteRecette()" class="btn btn-danger" style="margin: 15px 0;"> Supprimer le compte </button>

    </div> <!-- fin div containerR -->

    <script>
        function deleteRecette() {
            if (confirm("Etes-vous sûre de vouloir supprimer votre recette ?") == true) {
                document.location.href = "./post-delete-recette.php?idRecette=<?php echo $id; ?>";
            }
        }
    </script>
    <script src="../ajouter-recette/ajouter-recette.js">
    </script>
</body>

</html>