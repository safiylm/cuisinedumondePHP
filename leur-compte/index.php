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


    $path = "//utilisateur[@id= " . $_GET["id"] . "]";

    foreach ($xml->xpath($path) as $item) {
        $id = $item->attributes();
        $nom = $item->nom;
        $prenom = $item->prenom;
        $email = $item->email;
        $photo = $item->photo_de_profil;
    }

    ?>
    <title><?php echo $prenom . " " . $nom; ?> | Cuisine du monde </title>

</head>

<body>

    <?php
    include("../shared/navigation.php");
    ?>
    <div class="div-mon-compte">

        <div class="div-mon-compte-sommaire d-flex flex-column align-items-center flex-wrap justify-content-center">
            <img src='<?php echo $photo; ?>' alt='photo de profil de <?php echo $prenom . " " . $nom; ?>' />
            <h1> <?php echo $prenom . " " . $nom; ?></h1>
            <table>
                <tr>
                    <th>Nombre de recettes</th>
                    <th>Followers</th>
                </tr>
                <tr>
                    <td>3</td>
                    <td>450</td>
                </tr>

            </table>
        </div>

        <div class="div-mon-compte-main">
            <?php getAllRespicesByUserId($tab, $_GET["id"], $xml); ?>
        </div>

    </div>

</body>

</html>