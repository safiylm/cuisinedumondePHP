<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Catégorie </title>
    <link rel="stylesheet" href='../css/publication.scss'>
    <link rel="stylesheet" href='../css/home.scss'>
    <link rel="stylesheet" href='../css/nav.css'>
    <link rel="stylesheet" href="../CSS/categorie.scss" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Work+Sans&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</head>

<?php
session_start();
$json_object = file_get_contents("../data/recette.json");
$tab = json_decode($json_object, true);
echo "<script>var tabjson = $json_object </script>";
include('../recherche/recherche_par_pays_categorie.php');



if (file_exists('../data/recette-utilisateur.xml')) {
    $xml = simplexml_load_file('../data/recette-utilisateur.xml');
} else {
    exit('Failed to open test.xml.');
}
?>

<body>

    <?php include("../Navigation/index.php"); ?>

    <div class="div-toutes-categories">

        <div class="div-categorie">
            <h3> <?php echo $_GET['nom']; ?> </h3>
            <?php liste_recette_by_categorie($tab, $_GET['nom'], $xml); ?>

        </div>
    </div>

</body>