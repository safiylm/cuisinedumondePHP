<!doctype html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <title>Cuisine du monde </title>
    <link rel="stylesheet" href='css/publication.scss'>
    <link rel="stylesheet" href='css/home.scss'>
    <link rel="stylesheet" href='css/nav.css'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Work+Sans&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</head>
<?php


session_start();

$json_object = file_get_contents("data/recette.json");
$tab = json_decode($json_object, true);

if (file_exists('data/recette-utilisateur.xml')) {
    $xml = simplexml_load_file('data/recette-utilisateur.xml');
} else {
    exit('Failed to open test.xml.');
}

if (!isset($_SESSION['favori']))
    $_SESSION['favori'] = array();


?>




<body>

    <nav>
        <a href="index.php" class="nav__title"> RECETTE</a>
        <div>
            <a href="categorie/index.php" class="nav__link" aria-current="page">Categorie </a>
            <?php if (empty($_SESSION['utilisateur']['email'])) { ?>
                <a href="mon-carnet/index.php" class="nav__link" aria-current="page">Mon carnet </a>
                <a href="../auth/connexion.php" class="nav__link">Connexion</a>
            <?php } else {  ?>
                <a href="mon-compte/index.php" class="nav__link">Mon compte </a>
            <?php } ?>
        </div>
    </nav>


    <div class="container__photo__search">
        <img src='Photos/background.jpg' />
        <div class="search__container">
            <input class="search__input" type="text" placeholder="Search" onkeyup="recherche(this.value)">
        </div>
        <div></div>
    </div>


    <div class="main">
        <div class="flex-container" id="div-recherche">
        <div class="flex-item">
            <span id="txtHint" style='display:flex;'></span>
        </div>
        </div>
        <div class="flex-container">
            <?php

            for ($i = 0; $i < count($tab["sitecuisine"]["liste_recette"]['recette']); $i++) {

                $recette = $tab["sitecuisine"]["liste_recette"]['recette'][$i];

                $photoo = $recette["image"];
                $url = './Photos/' . $photoo;

            ?>

                <div class="flex-item">
                    <div class="element">
                        <div class="div-img">

                            <?php if (is_file($url)) { ?>
                                <img src='Photos/<?php echo $photoo; ?>' class="img-thumbnail" />
                            <?php  } else { ?>
                                <img src='<?php echo  $photoo; ?>' class="img-thumbnail" />
                            <?php } ?>
                        </div>

                        <div class="div-titre">
                            <a class="a-titre" href='Recette/index.php?idRecette=<?php echo $i; ?>'>
                                <?php echo $recette['titre']; ?>
                            </a>
                            <?php if (!empty($_SESSION['utilisateur']['email'])) {

                                $url = "mon-carnet/mon-carnet-xml.php?idRecette=" . $i;

                                $path = "//enregistrement[email_utilisateur ='" . $_SESSION['utilisateur']['email'] . "' and id_recette=" . $i . "]";
                                if (count($xml->xpath($path)) == 0) {
                                    $photo = 'Photos/suit-heart.svg';
                                } else {
                                    $photo = 'Photos/suit-heart-fill.svg';
                                } ?>



                            <?php } else {
                                $url = "mon-carnet/mon-carnet-session.php?idRecette=" . $i;
                                if (empty($_SESSION['favori'])) {
                                    $photo = 'Photos/suit-heart.svg';
                                } else {
                                    $photo = 'Photos/suit-heart.svg';

                                    foreach ($_SESSION['favori'] as $item) {
                                        if ($item == htmlspecialchars($i))
                                            $photo = 'Photos/suit-heart-fill.svg';
                                    }
                                }
                            } ?>

                            <a href="<?php echo $url; ?>" id="btn-trash">
                                <img src="<?php echo $photo; ?>"></a>
                        </div>
                    </div>
                </div>


            <?php  // fin is_file($url) == non 
            } // fin foreach recette 

            ?>
        </div>


        <div class="div-liste-utilisateur">

            <?php
            $path = "//utilisateur";
            foreach ($xml->xpath($path) as $item) { ?>
                <div class='div-1-utilisateur'>
                    <svg xmlns="http://www.w3.org/2000/svg" color="gray" width="86" height="86" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
             <a href='leur-compte/index.php?idUtilisateur=<?php echo $item->attributes();?>' class='a-login-utilisateur'>  <?php echo $item->nom ." " . $item->prenom . "</a> </div>";
            } ?>

        </div>

        </div>
        <div class="div-rose-incline">
            <div class="sur-div-rose-incline">

                <img src='Photos/cheesecakee.jpg' >
                <div>
                    <h1> Cheesecake </h1></br>
                    <p> C'est une variété nord-américaine de gâteau au fromage. C'est un dessert sucré composé d'un mélange de fromage à la crème, d'œufs, de sucre et de parfums de vanille et/ou de citron, sur une croûte de miettes de biscuits ou une génoise.
                    </p>
                </div>
            </div>

        </div>
</body>

