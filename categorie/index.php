<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Catégorie</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
  <link rel="stylesheet" href="../CSS/body.css" />
  <link rel="stylesheet" href="../CSS/categorie.scss" />
</head>

<?php

include("../Navigation/index.php");

$json_object = file_get_contents("../data/recette.json");
$tab = json_decode($json_object, true);


?>
<h1 class="h1-categorie">Les catégories </h1>

<div class="div-toutes-categories">

  <?php
  for ($i = 0; $i < count($tab['sitecuisine']['liste_categorie']['categorie']); $i++) {
    $categ = $tab['sitecuisine']['liste_categorie']['categorie'][$i];

  ?>

    <div class="div-categorie">
      <a href="categorie.php?nom=<?php echo $categ['nom']; ?>">
        <img src="<?php echo $categ['image']; ?>" width="200px" height="200px" />
        <h3> <?php echo $categ["nom"]; ?> </h3>
      </a>
    </div>
  <?php } ?>


</div>


<h1 class="h1-categorie">Les cuisines du monde </h1>
<div class="div-toutes-categories">

<?php
  for ($i = 0; $i < count($tab['sitecuisine']['liste_cuisine_pays']['pays']); $i++) {
    $pays = $tab['sitecuisine']['liste_cuisine_pays']['pays'][$i];

  ?>
<div class="div-categorie">
      <a href="pays.php?nom=<?php echo $pays['nom']; ?>">
        <img src="<?php echo $pays['image']; ?>" width="200px" height="200px" />
        <h3> <?php echo $pays["nom"]; ?> </h3>
      </a>
    </div>
<?php } ?>
</div>

<body>


</body>

</html>
