<style>
    #info-panier-vide {
        margin: 100px 0;
        line-height: 65px;
        font-size: 40px;
        text-align: center;
        color: darkslategray;
        text-decoration: underline;
    }

    .h1-mon-carnet {
        text-align: center;
        color: darkslategray;
        font-size: 30px;
        font-weight: 800;
    }

    #mon-carnet-contenu{
        width: 100% !important;
    }
    
</style>
<h1>Mon carnet de recette favorites</h1>

<div class="flex-container">

    <?php if (!empty($_SESSION['utilisateur']['email'])) {   // utilisateur doit etre connecté car ce code est inclu dans la page de compte de l'utilisateur
        $path = "//enregistrement[email_utilisateur ='" . $_SESSION['utilisateur']['email'] . "' ]/id_recette";

        if (count($xml->xpath($path)) == 0)
            echo "<h5 id='info-panier-vide'>VOTRE CARNET DE RECETTE EST VIDE.</h5>";
        else {
            foreach ($xml->xpath($path) as $favori) {
                foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {
                    if ($recette['id'] == $favori) {
                        recette_($recette['image'], $recette["temps_total"], $recette["difficulte"], $recette["nb_personne"], $recette["id"], $recette["titre"], $xml);
                    }
                }
            }
        }
    }
    ?>


</div>