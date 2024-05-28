<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Mon carnet de recette</title>
    <link rel="stylesheet" href="../css/publication.css" />
    <link rel="stylesheet" href="../css/favoris.css" />

    <?php

    include("../shared/header.php");

    $json_object = file_get_contents("../data/recette.json");
    $tab = json_decode($json_object, true);

    if (file_exists('../data/recette-utilisateur.xml')) {
        $xml = simplexml_load_file('../data/recette-utilisateur.xml');
    } else {
        exit('Failed to open test.xml.');
    }
    ?>



</head>

<body>
    <?php
    include("../shared/navigation.php");
    include("../shared/getallrecettes.php");
    include("../shared/favorisfunction.php");
    ?>

    <div class="div-mon-carnet">
        <h1> Mon Carnet </h1>
        <div class="flex-container">

            <?php 
            if (empty($_SESSION['utilisateur']['email'])) {   // utilisateur n'est pas connecté  
                if (empty($_SESSION['favori'])) {
                    echo "<p id='info-panier-vide'>VOTRE CARNET DE RECETTE EST VIDE.</p>";
                } else {
                    displayFavoritesRespiceSession_($tab, $xml);
                }
            }

            ?>

        </div>
    </div>

    <?php include("../shared/footer.php");
    footer_($tab);
    ?>


</body>

</html>