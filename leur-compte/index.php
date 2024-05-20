<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href='../css/publication.css'>
    <link rel="stylesheet" href='../css/mon-compte.css'>

    <?php
    session_start();
    include("../shared/getallrecettes.php");
    include('../shared/header.php');

    $path = "//utilisateur[@id= " . $_GET["idUtilisateur"] . "]";

    foreach ($xml->xpath($path) as $item) {
        $id = $item->attributes();
        $nom = $item->nom;
        $prenom = $item->prenom;
        $email = $item->email;
    }
    ?>
    <title><?php echo $renom . " " . $nom; ?> | Cuisine du monde </title>

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