
<?php
include('recette-card.php');



function getRecetteById($arrays, $id)
{
  foreach ($arrays as $item) {
    if ($item['id'] == $id)
      return $item;
  }
  return null;
}

function getAllRespices($tab, $q_categorie, $xml)
{
  echo '<div class="flex-container">';
  foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {
    recette_($recette, $xml);
  }
  echo " </div>";
}

function getAllRespicesByUserId($tab, $id, $xml)
{
  echo '<div class="flex-container">';
  foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {
    if ($recette['auteur'] == $id) {
      recette_($recette, $xml);
    }
  }
  echo '</div>';
}

function getMyAllRespices($tab, $iduser, $xml)
{
  echo '<div class="flex-container">';
  foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {
    if ($recette['auteur'] == $iduser) {
      mes_recettes_($recette, $xml, $iduser);
    }
  }
  echo '</div>';
}

function getAllRespicesByCategorie($tab, $q_categorie, $xml)
{
  echo '<div class="flex-container">';
  foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {
        if (!empty($q_categorie) && !empty($recette["categorie"]) ){
            if ($recette['categorie'] == $q_categorie) {
                recette_($recette, $xml);
            }
        }
  }
  echo " </div>";
}


function getAllRespicesByPays($tab, $q_pays, $xml)
{
  echo '<div class="flex-container">';
  foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {
      
    if (!empty($q_pays) && !empty($recette["pays"]) ){
        if($recette["pays"] == $q_pays) {
            recette_( $recette, $xml);
        }
    }
  }
  echo " </div>";
}


function displayFavoritesRespiceSession_($tab,  $xml)
{
  echo '<div class="flex-container">';
  foreach ($_SESSION['favori'] as $fav) {
    $recette = $tab["sitecuisine"]["liste_recette"]['recette'][intval($fav)];
    recette_($recette, $xml);
  }
  echo " </div>";
}



?>
