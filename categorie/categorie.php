<!doctype html>
<html lang="fr">

<head>
    <title>Catégorie </title>
    <link rel="stylesheet" href="../css/publication.css" />
    <link rel="stylesheet" href="../css/categorie.css" />

    <?php
    session_start(); 
    include("../shared/header.php");
    include("../shared/getallrecettes.php");
    include('../recherche/recherche_par_pays_categorie.php');
    echo "<script>var tabjson = $json_object </script>";
    ?>
</head>



<body> <?php include("../shared/navigation.php"); ?>

    <div class="div-toutes-categories">

        <div class="div-categorie">
            <h3> <?php echo $_GET['nom']; ?> </h3>
            <?php liste_recette_by_categorie($tab, $_GET['nom'], $xml); ?>

        </div>
    </div>
  <?php include("../shared/footer.php");
          footer_($tab);
          ?>

</body>