<?php 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href='../css/publication.css'>
    <link rel="stylesheet" href='../css/mon-compte.css'>

    <?php
    $json_object = file_get_contents("../data/recette.json");
    $tab = json_decode($json_object, true);

    if (file_exists('../data/recette-utilisateur.xml')) {
        $xml = simplexml_load_file('../data/recette-utilisateur.xml');
    } else {
        exit('Failed to open test.xml.');
    }

    include("../shared/getallrecettes.php");
    include('../shared/header.php');
    include("../shared/favorisfunction.php");

    
    $path = "//utilisateur[@id= " . $_GET["idUtilisateur"] . "]";

    foreach ($xml->xpath($path) as $item) {
        $id = $item->attributes();
        $nom = $item->nom;
        $prenom = $item->prenom;
        $email = $item->email;
    }
   
    ?>
    <title><?php echo $prenom . " " . $nom; ?> | Cuisine du monde </title>
   
</head>

<body>

    <?php
    include("../shared/navigation.php");
    ?>
    <div class="div-mon-compte">

        <div class="div-mon-compte-main">
            <?php getAllRespicesByUserId($tab, $_GET["idUtilisateur"], $xml); ?>
        </div>

        <div class="div-mon-compte-sommaire d-flex flex-column align-items-center flex-wrap justify-content-center">
            <img src='../Photos/personne.png' />
            <h1> <?php echo $prenom . " " . $nom; ?></h1>
        </div>

    </div>

</body>

</html>