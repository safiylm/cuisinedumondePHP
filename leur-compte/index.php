<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href='../css/publication.css'>
    <link rel="stylesheet" href='../css/mon-compte.css'>

    <?php
    include("../shared/getallrecettes.php");
    include('../shared/recette-card.php');
    include('../shared/header.php');



    $path = "//utilisateur[@id= " . $_GET["idUtilisateur"] . "]";

    foreach ($xml->xpath($path) as $item) {
        $id = $item->attributes();
        $nom = $item->nom;
        $prenom = $item->prenom;
        $email = $item->email;
    }
    ?>
    <title><?php echo $renom . " " . $nom; ?> | Cuisine du monde </title>


</head>

<body>
<?php     include("../shared/navigation.php");
?>
    <div class="div-mon-compte">
        <div class="div0">
            <h3> <?php echo $prenom . " " . $nom; ?></h3>
            <div class="div-menu-horizontale">
                <button id="mes-recettes-btn"> Les recettes de <?php echo $prenom . " " . $nom; ?></button>
            </div>
        </div>
        <div class="div1">

            <div class="div1-left">
                <div class="flex-container">

                    <?php foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {
                        if ($recette['auteur'] == $id) {
                            recette_($recette['image'], $recette["temps_total"], $recette["difficulte"], $recette["nb_personne"], $recette["id"], $recette["titre"], $xml);
                        }
                    } ?>

                </div>
            </div>

            <div class="div1-right">
                <img src='../Photos/personne.png' />
            </div>
        </div>
    </div>

</body>

</html>