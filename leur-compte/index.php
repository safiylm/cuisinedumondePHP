<!DOCTYPE html>
<html>

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href='../css/publication.scss'>
    <link rel="stylesheet" href='../css/mon-compte.scss'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    include("../navigation/index.php");
    include('../accueil/recette.php');

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
    <title><?php echo $renom . " " . $nom; ?> | Cuisine du monde </title>


</head>

<body>

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
                        if ($recette['auteur'] == $email) {
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