
<?php
include('../shared/recette-card.php');


function liste_recette_by_categorie($tab, $q_categorie, $xml)
{
  echo '<div class="flex-container">';
  foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {

    if ($recette['categorie'] == $q_categorie) {

      recette_($recette['image'], $recette["temps_total"], $recette["difficulte"], $recette["nb_personne"], $recette["id"], $recette["titre"], $xml);
    }
  }
  echo " </div>";

}

function liste_recette_by_pays($tab, $q_pays, $xml)
{
    echo '<div class="flex-container">';
    foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {

        if ($recette['pays'] == $q_pays) {

            recette_($recette['image'], $recette["temps_total"], 
            $recette["difficulte"], $recette["nb_personne"], $recette["id"], $recette["titre"], $xml);
        }
    }
    echo " </div>";

}

?>