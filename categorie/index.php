<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  
    
<head>

  <title>Catégorie</title>
  <link rel="stylesheet" href="../css/publication.css" />
  <link rel="stylesheet" href="../css/categorie.css" />


  <?php

  $json_object = file_get_contents("../data/recette.json");
  $tab = json_decode($json_object, true);


  if (file_exists('../data/recette-utilisateur.xml')) {
    $xml = simplexml_load_file('../data/recette-utilisateur.xml');
  } else {
    exit('Failed to open test.xml.');
  }

  include("../shared/header.php");
  include('../shared/favorisfunction.php');
  include("../shared/getallrecettes.php");

  ?>
</head>

<body>
  <?php

  include("../shared/navigation.php");
  ?>

  <div class="div-toutes-categories">

    <?php 
    
    if (!empty($_GET['categorie'])) { ?>
      <div class="div-categorie">
        <h3> <?php echo $_GET['categorie']; ?> </h3>
        <?php getAllRespicesByCategorie($tab, $_GET['categorie'], $xml); ?>
      </div>

        <?php } else{
        if (!empty($_GET['pays'])) { ?>
          <div class="div-categorie">
            <h3> <?php echo $_GET['pays']; ?> </h3>
            <?php getAllRespicesByPays($tab, $_GET['pays'], $xml); ?>
          </div>
    
        <?php 
            
        } else {
          
            foreach ($tab['sitecuisine']['liste_categorie']['categorie'] as $categ) { ?>
              <div class="div-categorie">
                <a href="index.php?categorie=<?php echo $categ; ?>">
                  <h3> <?php echo $categ; ?> </h3>
                </a>
                <?php getAllRespicesByCategorie($tab, $categ, $xml); ?>
               
              </div>
             
            <?php } 
             foreach ($tab['sitecuisine']['liste_cuisine_pays']['pays'] as $pays) { ?>
            <div class="div-categorie">
              <a href="index.php?pays=<?php echo $pays['nom']; ?>">
                <h3> <?php echo $pays["nom"]; ?> </h3> 
              </a>
              
              <?php getAllRespicesByPays($tab,$pays["nom"], $xml); ?>

            </div>
        <?php }
        }
    
    }

    ?>
  </div>

  <?php include("../shared/footer.php");
  footer_($tab);
  ?>

</body>

</html>