<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mon carnet de recette</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.tutorialspoint.com/jquery/jquery-3.6.0.js"></script>

    <link rel="stylesheet" href="../CSS/publication.scss" />


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
    include('../accueil/recette.php');

    if (file_exists('../data/recette-utilisateur.xml')) {
        $xml = simplexml_load_file('../data/recette-utilisateur.xml');
    } else {
        exit('Failed to open test.xml.');
    }

    $json_object = file_get_contents("../data/recette.json");
    $tab = json_decode($json_object, true);

    if (empty($_SESSION['utilisateur']['email'])) {
        include("../navigation/index.php");
    }
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
            }

            ?>

        </div>
    </div>
    <?php include("../footer/index.php");?>

</body>

</html>