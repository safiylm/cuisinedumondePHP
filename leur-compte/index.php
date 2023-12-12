<!DOCTYPE html>
<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="../CSS/ajouter_recette.css" />
<link rel="stylesheet" href='../css/publication.scss'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<?php
include("../navigation/index.php");

$json_object = file_get_contents("../data/recette.json");
$tab = json_decode($json_object, true);



if (file_exists('../data/recette-utilisateur.xml')) {
    $xml = simplexml_load_file('../data/recette-utilisateur.xml');
} else {
    exit('Failed to open test.xml.');
}

$path = "//utilisateur[@id= " . $_GET["idUtilisateur"] . "]";

foreach ($xml->xpath($path) as $item) {
    $nom = $item->nom;
    $prenom = $item->prenom;
    $email = $item->email;
}
?>
<title><?php echo $renom. " ". $nom ;?> | Cuisine du monde </title>



<style>
    body {
        background-color: white !important;
        height: 100%;
    }

    .div-img-nom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 550px;
    }

    .div-img-nom h1 {
        text-transform: capitalize;
    }

    #image_utilisateur {
        margin: 50px auto;
        border-radius: 50%;
    }

    .centrer {
        display: block;
        flex-direction: column;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .menu-bar {
        margin-left: auto;
        margin-right: auto;

        display: flex;
        flex-direction: row;
        justify-content: space-around;
        width: 80%;
        border-bottom: 1px solid lightgray;
        padding: 10px;
    }

    .menu-bar button {
        border: none;
        background-color: transparent;
    }

    #mon-carnet-contenu {
        width: 85%;
    }
</style>
</head>

<body>
    <div class="centrer">
        <div class='div-img-nom'>
            <img id="image_utilisateur" src="../Photos/personne.png" width="150px" height="auto;" />&nbsp &nbsp &nbsp &nbsp
            <h1> <?php echo  $prenom . " " . $nom; ?></h1>
        </div>
        <div class="menu-bar">
            <button id="mes-recettes-btn"> Les recettes de <?php echo $prenom . " " . $nom; ?></button>
        </div>


    </div>



    <div class="main">
        <div class="flex-container">
            <?php


            $num = 0;
            foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {

                array_filter($recette, function ($v, $k) {
                    return $k == "auteur";
                }, ARRAY_FILTER_USE_BOTH);

                if ($recette['auteur'] == $email) {
                    $photoo = $recette["image"];
                    $url = '../Photos/' . $photoo;
            ?>

                    <div class="flex-item">
                        <div class="element">
                            <div class="div-img">

                                <?php if (is_file($url)) { ?>
                                    <img src='../Photos/<?php echo $photoo; ?>' class="img-thumbnail" />
                                <?php  } else { ?>
                                    <img src='<?php echo  $photoo; ?>' class="img-thumbnail" />
                                <?php } ?>
                            </div>
                            <div class="div-titre">
                                <a class="a-titre" href='../Recette/index.php?idRecette=<?php echo $num; ?>'>
                                    <?php echo $recette['titre']; ?>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php

                }
                $num++;
            }
            ?>
        </div>
    </div>
</body>

</html>