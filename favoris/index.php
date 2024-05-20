<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Mon carnet de recette</title>
    <link rel="stylesheet" href="../css/publication.css" />

    <?php
    session_start();
    include("../shared/header.php");

    $json_object = file_get_contents("../data/recette.json");
    $tab = json_decode($json_object, true);

    if (file_exists('../data/recette-utilisateur.xml')) {
        $xml = simplexml_load_file('../data/recette-utilisateur.xml');
    } else {
        exit('Failed to open test.xml.');
    }
    ?>

    <style>
        .div-mon-carnet {
            padding: 50px;
            margin: 50px auto;
            width: 80vw;
            background-color: whitesmoke;
            min-height: 80vh;
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