<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Cuisine du monde </title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href='./css/publication.css' />
    <link rel="stylesheet" href='./css/home.css' />
    <link rel="stylesheet" href='./css/nav.css' />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Work+Sans&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <?php
    session_start(); ?>
</head>



<body>
  
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php" id="nav__title">RECETTE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./categorie/index.php">Categorie</a>
                    </li>
                    <?php if (empty($_SESSION['utilisateur']['email'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./mon-carnet/index.php">Mon carnet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./auth/connexion.php">Connexion</a>
                        </li>
                    <?php } else {  ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./mon-compte/index.php">Mon compte </a>
                        </li>
                    <?php } ?>
                </ul>

            </div>
        </div>
    </nav>

 <?php
    include('recette.php');
    $json_object = file_get_contents("./data/recette.json");
    $tab = json_decode($json_object, true);

    if (file_exists('./data/recette-utilisateur.xml')) {
        $xml = simplexml_load_file('./data/recette-utilisateur.xml');
    } else {
        exit('Failed to open recette.json.');
    }

    if (!isset($_SESSION['favori']))
        $_SESSION['favori'] = array();

    ?>
        <div class="container__photo__search">
            <div class="search__container">
                <input class="search__input" type="text" placeholder="Search" onkeyup="recherche(this.value)">
            </div>
            <div></div>
        </div>


        <div class="main">
            <h1 style=" font-size: 2em;color: darkslategray !important; font-weight: 800; padding: 15px ;">
                Toutes les recettes
            </h1>

            <div id="div-recherche">
                <span id="txtHint" class="flex-container"></span>
            </div>
            <div class="flex-container">
                <?php foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {
                    recette($recette['image'], $recette["temps_total"], $recette["difficulte"], $recette["nb_personne"], $recette["id"], $recette["titre"], $xml);
                } ?>
            </div>

            <div style="display:flex;justify-content: space-between; width: 100vw; background-color:#eadccf;">
                <img src='Photos/background.jpg' width="300px" height="auto;" />
                <div> </div>
            </div>

            <?php include("footer/index.php");
            footer($tab);
            ?>

        </div>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </body>

</html>