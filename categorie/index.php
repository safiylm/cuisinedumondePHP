<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Catégorie</title>
  
    <link rel="stylesheet" href="../css/publication.css" />
    <link rel="stylesheet" href="../css/categorie.css" />

    <?php
    session_start(); 
    include("../shared/header.php");
    include("../shared/getallrecettes.php");
    
    ?>

</head>

<body> 

<?php 
include("../shared/navigation.php"); 
include('../recherche/recherche_par_pays_categorie.php'); 
?>


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

  <?php include("../shared/footer.php");
          footer_($tab);
          ?>

</body>

</html>