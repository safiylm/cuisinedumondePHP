
<div class="flex-container">
    <?php
    foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {
        if ($recette['auteur'] == $_SESSION['utilisateur']['id']) {
            mes_recettes_($recette['image'], $recette["temps_total"], $recette["difficulte"], $recette["nb_personne"], $recette["id"], $recette["titre"], $xml, $_SESSION['utilisateur']['id']);
        }
    } ?>
</div>
