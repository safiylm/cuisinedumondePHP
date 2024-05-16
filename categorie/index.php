<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Catégorie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
    <link rel="stylesheet" href="../css/body.css" />
    <link rel="stylesheet" href="../css/publication.css" />
    <link rel="stylesheet" href="../css/categorie.css" />
    <link rel="stylesheet" href='../css/home.css'>
    <link rel="stylesheet" href='../css/nav.css'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   
 <style>
 a{text-decoration :none !important; }
    .div-categorie h3 {
        font-size: 2em;
        color: darkslategray !important;
        font-weight: 800;
        padding: 15px ;
    }
</style>

</head>

<?php
include("../navigation/index.php");
include('../recherche/recherche_par_pays_categorie.php');

$json_object = file_get_contents("../data/recette.json");
$tab = json_decode($json_object, true);

if (file_exists('../data/recette-utilisateur.xml')) {
  $xml = simplexml_load_file('../data/recette-utilisateur.xml');
} else {
  exit('Failed to open test.xml.');
}

?>




<body>

  <div class="div-toutes-categories">
    <?php foreach ($tab['sitecuisine']['liste_categorie']['categorie'] as $categ) { ?>
      <div class="div-categorie">
      <a href="categorie.php?nom=<?php echo $categ; ?>">
       
      <h3> <?php echo $categ; ?> </h3>
        <?php liste_recette_by_categorie($tab, $categ, $xml); ?>
      </div>
    </a>
    <?php } ?>
  </div>

  <div class="div-toutes-categories">
    <?php foreach ($tab['sitecuisine']['liste_cuisine_pays']['pays'] as $pays) { ?>
      <div class="div-categorie">
        <a href="pays.php?nom=<?php echo $pays['nom']; ?>">
        <h3> <?php echo $pays["nom"]; ?> </h3>
        <?php liste_recette_by_pays($tab, $pays['nom'], $xml); ?>

        </a> 
      </div>
    <?php } ?>
  </div>

  <?php include("../footer/index.php");
          footer_($tab);
          ?>

</body>

</html>