<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Mon carnet de recette</title>
    <link rel="stylesheet" href="../css/publication.css" />

   <?php session_start();
   include("../shared/header.php");?>

    <style>
        .div-mon-carnet {
            padding: 50px;
            margin: 50px auto;
            width: 80vw;
            background-color: whitesmoke;
            height: 80vh;
        }

        #info-panier-vide {
            margin: 100px 0;
            line-height: 65px;
            font-size: 40px;
            text-align: center;
            color: darkslategray;
            text-decoration: underline;
        }

        .h1-mon-carnet {
            text-align: center;
            color: darkslategray;
            font-size: 30px;
            font-weight: 800;
        }
    </style>

</head>

<body>
    <?php
    include("../shared/navigation.php");
    include("../shared/getallrecettes.php");
    ?>

<div class="div-mon-carnet">
        <h1 class='h1-mon-carnet'> Mon Carnet </h1>
        <div class="flex-container">

            <?php if (empty($_SESSION['utilisateur']['email'])) {   // utilisateur n'est pas connecté  

                if (empty($_SESSION['favori'])) {
                    echo "<p id='info-panier-vide'>VOTRE CARNET DE RECETTE EST VIDE.</p>";
                }
                foreach ($_SESSION['favori'] as $e) {


                    $recette = $tab["sitecuisine"]["liste_recette"]['recette'][intval($e)];
                   
                    displayrespicesession_($recette['image'], $recette["temps_total"], $recette["difficulte"], $recette["nb_personne"], $recette["id"], $recette["titre"], $xml);
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