
<div class="flex-container">
    <?php
print_r(  $_SESSION);
    foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {
        if ($recette['auteur'] == $_SESSION['utilisateur']['id']) {
            recette_($recette['image'], $recette["temps_total"], $recette["difficulte"], $recette["nb_personne"], $recette["id"], $recette["titre"], $xml);
        }
    } ?>
</div>
