<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Catégorie</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/body.css" />
    <link rel="stylesheet" href="../css/publication.scss" />
    <link rel="stylesheet" href="../css/categorie.scss" />
    <link rel="stylesheet" href='../css/home.scss'>
    <link rel="stylesheet" href='../css/nav.css'>
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