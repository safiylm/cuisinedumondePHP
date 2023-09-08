<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Catégorie</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
  <link rel="stylesheet" href="../CSS/body.css" />
</head>

<?php

include("../Navigation/index.php");
require "../data/config.php";

$json_object = file_get_contents("../data/recette.json");
$tab = json_decode($json_object, true);


?>

<div class="div-toutes-categories">

  <?php foreach ($tab['sitecuisine']['liste_categorie']['categorie'] as $categorie) {
  ?>
    <div class="div-categorie">
      <img src="../Photos/categorie/<?php echo $categorie;?>.jpg" width="200px" height="200px" />
      <h3> <?php echo $categorie ; ?> </h3>
    </div>
  <?php } ?>


</div>

<body>


</body>

</html>

<style>
  .div-toutes-categories {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    margin: 50px;
  }

  .div-categorie{
    margin: 20px;
  }

  .div-categorie img{
    border: none;;
    border-radius: 50%;
  }

  .div-categorie h3{
   text-align: center;
  }

</style>