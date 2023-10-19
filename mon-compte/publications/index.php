
<?php
$json_object = file_get_contents("../data/recette.json");
$tab = json_decode($json_object, true);
?>

<div class="main">
    <div class="flex-container">
        <?php

        $num = 0;
        foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {

            if ($recette['auteur'] == $_SESSION['utilisateur']['email']) {
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
                        <a class="a-titre" href='../Recette/index.php?idRecette=<?php echo $num; ?>'>
                                <?php echo $recette['titre']; ?>
                            </a> 
                            
                            <a class="a-titre" href='../modifier-recette/index.php?idRecette=<?php echo $num; ?>'>
                               Modifier
                            </a>
                        </div>
                    </div>
                </div>
        <?php

            }
            $num++;
        }
        ?>
    </div><!-- fin div flex container -->
</div><!-- fin div main -->