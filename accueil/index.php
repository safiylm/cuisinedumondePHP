<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Cuisine du monde </title>

    <link rel="stylesheet" href='./css/publication.css' />
    <link rel="stylesheet" href='./css/home.css' />
    <link rel="stylesheet" href='./css/nav.css' />


    <?php
    session_start(); 
    include("./shared/header.php");
    include('./shared/favorisfunction.php');
    ?>
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
                            <a class="nav-link" href="./favoris/index.php">Favoris</a>
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

 <?php include('./shared/recette-card.php');
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
            <h1>
                Toutes les recettes
            </h1>

            <div id="div-recherche">
                <span id="txtHint" class="flex-container"></span>
            </div>
           
            <div class="flex-container">
                <?php foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {
                    recette($recette, $xml);
                } ?>
            </div>

            <div style="display:flex;justify-content: space-between; width: 100vw; background-color:#eadccf;">
                <img src='Photos/background.jpg' width="300px" height="auto;" />
                <div> </div>
            </div>

            <?php include("./shared/footer.php");
            footer($tab);
            ?>

        </div>


    </body>

</html>