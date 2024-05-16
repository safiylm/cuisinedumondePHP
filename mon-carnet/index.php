<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Mon carnet de recette</title>
    <link rel="stylesheet" href="../css/publication.css" />

   <?php include("../shared/header.php");?>

    <style>
        .div-mon-carnet {
            padding: 50px;
            margin: 50px auto;
            width: 80vw;
            background-color: whitesmoke;
            height: 80vh;
        }

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
    </style>

</head>

<body>
    <?php
    include('../shared/recette-card.php');
    include("../shared/navigation.php");
    include("../shared/getallrecettes.php");
    ?>

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
                                <a class="a-titre" href='../recette/index.php?idRecette=<?php echo $e; ?>'>
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
            }

            ?>

        </div>
    </div>
    <?php include("../shared/footer.php");
     footer_($tab);
     ?>

</body>

</html>