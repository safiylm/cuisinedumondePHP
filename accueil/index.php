<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Cuisine du monde </title>
    <link rel="stylesheet" href='/css/publication.scss' />
    <link rel="stylesheet" href='./css/home.scss' />
    <link rel="stylesheet" href='./css/nav.css' />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Work+Sans&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<?php
session_start();
include('recette.php');
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


<!-- Top Navigation Menu -->
<div class="topnav">
      <a href="index.php" id="nav__title" class="active" > RECETTE</a>

  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
     <?php if (empty($_SESSION['utilisateur']['email'])) { ?>
          <a class="nav-link" href="mon-carnet/index.php" >Mon carnet</a>
          <a class="nav-link" href="auth/connexion.php" >Connexion</a>
       <?php } else {  ?>
          <a class="nav-link" href="mon-compte/index.php"  >Mon compte </a>
      <?php } ?>

  </div>
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>






    <div class="container__photo__search">
        <div class="search__container">
            <input class="search__input" type="text" placeholder="Search" onkeyup="recherche(this.value)">
        </div>
        <div></div>
    </div>


    <div class="main">
        <h1 style=" font-size: 2em;color: darkslategray !important; font-weight: 800; padding: 15px ;"> Toutes les recettes </h1>

        <div class="flex-container" id="div-recherche">
            <div class="flex-item">
                <span id="txtHint" style='display:flex;'></span>
            </div>
        </div>
        <div class="flex-container">
            <?php

            foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {
                recette($recette['image'], $recette["temps_total"], $recette["difficulte"], $recette["nb_personne"], $recette["id"], $recette["titre"], $xml);
            } ?>
        </div>


        <div style="display:flex;justify-content: space-between; width: 100vw; background-color:#eadccf;">
            <img src='Photos/background.jpg' width="400px" height="auto;"/>
            <div>  </div>
        </div>


        <?php include("footer/index.php");
        footer($tab);
        ?>

        <!-- <div class="div-liste-utilisateur">

            <?php
            //$path = "//utilisateur";
            //foreach ($xml->xpath($path) as $item) { 
            ?>
                <div class='div-1-utilisateur'>
                    <svg xmlns="http://www.w3.org/2000/svg" color="gray" width="86" height="86" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                    <a href='leur-compte/index.php?idUtilisateur=<?php //echo $item->attributes(); 
                                                                    ?>' class='a-login-utilisateur'> <?php //echo $item->nom . " " . $item->prenom . "</a> </div>"; } 
                                                                                                                                    ?>

                </div>

        </div> -->

</body>



<style>
body {
    margin: 0 ;
    padding: 0;
}

#nav__title {
    font-size: 22px;
    color: darkslategray;
    font-weight: 800;
    text-decoration: none;
    padding-left: 15px;
    text-decoration: none;
}

.nav__link {
    font-size: 19px;
    text-align: center;
    color: darkslategray;
    font-weight: 500;
    text-decoration: none;
    padding-right:20px;
}

.nav__title:hover,
.nav__link:hover {
    color: rgb(101, 163, 139);
}


 /* Style the navigation menu */
.topnav {
  overflow: hidden;
  background-color: #333;
  position: relative;
}

/* Hide the links inside the navigation menu (except for logo/home) */
.topnav #myLinks {
  display: none;
}

/* Style navigation menu links */
.topnav a {
  color: white;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  display: block;
}

/* Style the hamburger menu */
.topnav a.icon {
  background: black;
  display: block;
  position: absolute;
  right: 0;
  top: 0;
  height : 100%;
}

/* Add a grey background color on mouse-over */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the active link (or home/logo) */
.active {
  background-color: whitesmoke;
  color: darkslategray;
} 

</style>

<script>

function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
} 
</script>