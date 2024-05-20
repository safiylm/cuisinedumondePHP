<link rel="stylesheet" href="../css/favoris.css" />

<h1>Mon carnet de recette favorites</h1>

<div class="flex-container">

<?php if (!empty($_SESSION['utilisateur']['email'])) {   // utilisateur doit etre connecté car ce code est inclu dans la page de compte de l'utilisateur
        $path = "//enregistrement[email_utilisateur ='" . $_SESSION['utilisateur']['email'] . "' ]/id_recette";

        if (count($xml->xpath($path)) == 0)
            echo "<p id='info-panier-vide'>VOTRE CARNET DE RECETTE EST VIDE.</p>";
        else {
            foreach ($xml->xpath($path) as $favori) {
                foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {
                    if ($recette['id'] == $favori) {
                        recette_($recette , $xml);
                    }
                }
            }
        }
    }
    ?>


</div>