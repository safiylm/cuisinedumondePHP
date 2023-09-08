<link rel="stylesheet" href='./publications/publication.css'>

<?php
$json_object = file_get_contents("../data/recette.json");
$tab = json_decode($json_object, true);
?>


<div class="main">
    <div class="flex-container">

        <?php

        //determiné les recettes de l'utilisateur
        $tab_mes_recettes = [];
        $j=0;
        for ($i = 0; $i < count($tab["sitecuisine"]["liste_recette"]['recette']); $i++) {
            if ($tab["sitecuisine"]["liste_recette"]['recette'][$i]['auteur'] == $_SESSION["utilisateur"]['email']) {
                $tab_mes_recettes[$j] = $i;
                $j++; 
            }
        }
        if ($j == 0) {
            echo "</br></br> <p> Vous n'avez ajouté aucune recette! </p>";
        }
        for ($i = 0; $i < $j; $i++) {

            $recette = $tab["sitecuisine"]["liste_recette"]['recette'][$i];

            $photoo = $recette["image"];
            $url = '../Photos/' . $photoo;

        ?>

            <div class="flex-item">
                <div class="element">
                    <div class="div-img">

                        <?php if (is_file($url)) { ?>
                            <img src='../Photos/<?php echo $photoo; ?>' class="img-thumbnail" />
                        <?php  } else { ?>
                            <img src='<?php echo  $photoo; ?>' class="img-thumbnail" />
                        <?php } ?>
                    </div>
                    <div class="div-titre">
                        <a class="a-titre" href='../Recette/index.php?idRecette=<?php echo $i; ?>' >
                            <?php echo $recette['titre']; ?>
                        </a>
                    </div>
                </div>
            </div>


        <?php  // fin is_file($url) == non 
        } // fin foreach recette 

        ?>

    </div><!-- fin div flex container -->
</div><!-- fin div main -->