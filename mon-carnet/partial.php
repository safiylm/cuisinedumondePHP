<style>
    #info-panier-vide{
    margin: 100px 0;
    line-height: 65px;
    font-size: 40px;
    text-align: center;
    color:darkslategray;
    text-decoration: underline;
}
.h1-mon-carnet{
    text-align: center;
    color:darkslategray;
    font-size: 30px;
    font-weight: 800;
}
</style>
<div class="div-mon-carnet">
<h1 class='h1-mon-carnet'> Mon Carnet </h1>
    <div class="flex-container">

        <?php if (empty($_SESSION['utilisateur']['email'])) {   // utilisateur n'est pas connecté  

            if (empty($_SESSION['favori'])) {
                echo "<h5 id='info-panier-vide'>VOTRE CARNET DE RECETTE EST VIDE.</h5>";
            }
            foreach ($_SESSION['favori'] as $e) {


                $recette = $tab["sitecuisine"]["liste_recette"]['recette'][intval($e)];

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
                            <a class="a-titre" href='../Recette/index.php?idRecette=<?php echo $e; ?>'>
                                <?php echo $recette['titre']; ?>
                            </a>
                            <a href="../mon-carnet/mon-carnet-session.php?idRecette=<?php echo intval($res); ?>" id="btn-trash">
                                <img src="../Photos/trash3.svg">
                            </a>
                        </div>
                    </div>
                </div>


                <?php
            }
        } else { // connexion 
            $path = "//enregistrement[email_utilisateur ='" . $_SESSION['utilisateur']['email'] . "' ]/id_recette";


            if (count($xml->xpath($path)) == 0)
                echo "<p> </p> <p class='p-vide'> Votre panier est vide. </p>";
            else {
                foreach ($xml->xpath($path) as $res) {

                    $recette = $tab["sitecuisine"]["liste_recette"]['recette'][intval($res)];
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
                                <a class="a-titre" href='../Recette/index.php?idRecette=<?php echo intval($res); ?>'>
                                    <?php echo $recette['titre']; ?>
                                </a>
                                <a href="../mon-carnet/mon-carnet-xml.php?idRecette=<?php echo intval($res); ?>" id="btn-trash">
                                    <img src="../Photos/trash3.svg">
                                </a>

                            </div>
                        </div>
                    </div>



        <?php }
            }
        }
        ?>

    </div>
</div>