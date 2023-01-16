<!DOCTYPE html>
<html lang="fr">

<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
    <link rel="stylesheet" href="../CSS/body.css" />

    <script src="titre.js"></script>

    <style>
        body {
            background-color: #8BA1BB;
            font-family: Arial;
            margin: 0;
        }

        div.contenu {
            background-color: white;
            margin: 40px auto;
            padding: 0px 8px 20px 8px;
            box-shadow: 0px 0px 8px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            height: auto;
            width: 700px;
        }

        h1 {
            padding-top: 20px;
            text-align: center;
            margin-bottom: 12px;
            margin-top: 10px;
        }

        p.description {
            text-align: center;
            max-width: 400px;
            display: inline-block;
            font-size: 14px;
        }

        .centre {
            text-align: center;
            width: 100%;
        }

        p.categorie {
            background-color: black;
            color: white;
            display: inline-block;
            margin-top: -15px;
            padding: 8px 18px;
            margin-bottom: 0px;
            font-weight: bold;
            font-size: 16px;
        }


        div.categorie {
            margin-bottom: 0px;
            margin-top: 0px;
            overflow: visible;
        }

        div.separateur {
            width: 100px;
            height: 1px;
            background-color: black;
            margin-left: auto;
            margin-right: auto;
        }


        div.info {
            position: relative;
        }

        table.info {
            position: absolute;
            bottom: 0;
            width: 100%;
            color: white;
            background-color: #6C829DC0;
            height: 50px
        }

        table.info td {
            text-align: center;
            font-size: 12px;
            vertical-align: top;
        }

        table.info th {
            font-size: 14px;
            vertical-align: bottom;
            padding-bottom: 8px;
        }

        img.info {
            display: block;
            max-height: 400px;
            object-fit: cover;
            min-height: 200px;
            background-color: lightgray;
        }

        div.colonne {
            width: 45%;
            margin-top: 20px;
        }

        div.colonne h2 {
            text-align: center;
            text-transform: uppercase;
            font-size: 15px;
            border-bottom: 5px solid #6C829D;
            padding-bottom: 5px;
        }

        div.colonne1 {
            display: inline-block;
            margin-right: 10%;
        }

        div.colonne2 {
            float: right;
            max-height: 480px;
        }


        div.ingredients p {
            text-align: center;
            font-size: 14px;
            border: 1px solid lightgray;
            padding: 8px 0px;
            margin-top: 4px;
            margin-bottom: 0;
        }

        table.preparation p.numero {
            background-color: #6C829D;
            color: white;
            width: 25px;
            height: 25px;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            padding-top: 4px;
            box-sizing: border-box;
            border-radius: 50%;
            margin: 0;
        }

        table.preparation td {
            vertical-align: top;
        }

        table.preparation td.preparation_etape {
            font-size: 14px;
            padding-left: 10px;
            padding-bottom: 10px;
        }

        table.preparation tr {
            height: 40px;
        }

        #titreIPT,
        #ingredientsIPT,
        #pEtape1IPT,
        #pEtape2IPT,
        #pEtape3IPT,
        #EnregistrerBtn {
            display: none;
            padding: 25px;
            width: 240px;
            height: 60px;
            margin: 15px auto;
        }

        #ModifierBtn {
            width: 70px;
            height: 40px;
            margin: 20px auto;
            text-align: center;
        }

        .divEnvoyerEnregistement {
            margin: 20px auto;
        }

        .divIngEtape {
            max-height: 480px;
        }



        /* Styles pour tablette*/
        @media screen and (max-device-width: 940px) {
            div.contenu {
                margin: 60px auto;
                padding: 0px 30px 30px 30px;
                width: 800px;
            }

            .contenu h1 {
                font-size: 2.8em;
            }

            div.colonne1.colonne h2,
            div.colonne2.colonne h2 {
                font-size: 1.8em;
            }

            #ingredients p {
                font-size: 1.2em;
                padding: 1em;
            }

            table.preparation td.preparation_etape {
                font-size: 1.2em;
                padding: 1em;
            }

            div.ingredients p {

                font-size: 20px;
                padding: 8px 0px;
                margin-top: 4px;
                margin-bottom: 0;
            }

            table.preparation p.numero {
                width: 40px;
                height: 40px;
                font-size: 40px;
                padding: 20px;
                padding-top: 0px;
                padding-left: 10px;
                margin-top: 15px;
            }


            div.colonne {
                width: 100%;
            }

            #ModifierBtn,
            #EnregistrerBtn {
                width: 100px;
                height: 70px;
                font-size: 20px;
                text-align: center;
                margin: 30px auto;
            }

            #heart,
            #trash {
                width: 60px;
                height: 60px;
                font-size: 30px;
                text-align: center;
            }

            #titreIPT,
            #ingredientsIPT,
            #pEtape1IPT,
            #pEtape2IPT,
            #pEtape3IPT {

                padding: 25px;
                height: 150px;
                width: 80%;
                margin: 15px auto;
                font-size: 1.2em;
            }

            #titreIPT {
                height: 100px;
            }
        }




        /* Styles pour phone*/
        @media screen and (max-device-width: 740px) {
            div.contenu {
                margin: 60px auto;
                padding: 0px 30px 30px 30px;
                min-width: 80%;
            }

            .contenu h1 {
                font-size: 4.5em;
            }

            div.colonne1.colonne h2,
            div.colonne2.colonne h2 {
                font-size: 3em;
            }

            #ingredients p {
                font-size: 2em;
                padding: 1em;
            }

            table.preparation td.preparation_etape {
                font-size: 2em;
                padding: 1em;
            }

            div.ingredients p {

                font-size: 20px;
                padding: 8px 0px;
                margin-top: 4px;
                margin-bottom: 0;
            }

            table.preparation p.numero {
                width: 40px;
                height: 40px;
                font-size: 40px;
                padding: 20px;
                padding-top: 0px;
                padding-left: 10px;
                margin-top: 40px;
            }


            div.colonne {
                width: 100%;
            }

            #ModifierBtn,
            #EnregistrerBtn {
                width: 200px;
                height: 100px;
                font-size: 30px;
                text-align: center;
            }

            #heart,
            #trash {
                width: 100px;
                height: 100px;
                font-size: 30px;
                text-align: center;
            }

            #titreIPT,
            #ingredientsIPT,
            #pEtape1IPT,
            #pEtape2IPT,
            #pEtape3IPT,
            #EnregistrerBtn {

                padding: 25px;
                height: 150px;
                width: 80%;
                margin: 15px auto;
            }

            #titreIPT {
                height: 100px;
            }

        }
    </style>
    <?php

    session_start();
    // Connexion à la base de données
    include("../navigation/index.php");
    require "../config.php";
    ?>
</head>

<body>

    <?php

    if (isset($_GET['titreRecette'])) {

        //on affiche les donnee de la recette que l'on veut voir
        $check = $bdd->prepare('SELECT * FROM recette WHERE nomRecette = ?');
        $check->execute(array($_GET['titreRecette']));
        $data = $check->fetch();
        $row = $check->rowCount();

        if ($row > 0) // Si > à 0 alors l'utilisateur existe
        {
            $login = $data['login'];
            $nomR = $data['nomRecette'];
            $ingredient = $data['ingredients'];
            $etapes = $data['etapes'];
        }
    } else {
        header('Location: ../index.php');
        exit();
    }


    ?>

    <div class="contenu">
        <h1 id='titre'> <?php echo $nomR; ?> </h1>
        <div style="display: block; text-align:center; padding:40px;">
        <?php 
        if ($login == $_SESSION['user']['login']) { ?>
                <a style="display: inline; margin:20px;" 
                href="../modifier_recette/index.php?titreRecette=<?php echo  htmlspecialchars($nomR); ?>" 
                    class="btn btn-primary">Modifier la recette </a>
    <?php  } ?>

            <form method="post" action="postFavori.php" style="display: inline;" >
                <input type="hidden" name="titre" value=<?php echo '"' . $nomR . '"'; ?> />
                <button type="submit" class='far fa-heart' id="heart"></button>
            </form>

        </div>


        <p style="text-align:center;">Publié par <?php echo $login; ?> </p>
        <div class="separateur"></div>


        <!-- Mon commentaire HTML -->
        <div class="centre">
            <p class="description"></p>
        </div>

        <div class="info">
            <?php
            if (htmlspecialchars($data['photo']) == NULL) {
                $photoo = "../Photos/food.png";
            } else {
                $photoo = htmlspecialchars($data['photo']);
            }

            echo " <img class='centre info' src='../Photos/" . $photoo . "'>"
            ?>

        </div>

        <div class="divIngEtape">
            <div class="colonne1 colonne">
                <h2>Ingrédients</h2>
                <div class="ingredients" id='ingredients'>

                    <?php
                    $unit = preg_split("/[|]+/", $ingredient);
                    foreach ($unit as $f) {
                        echo "<p>"  . $f . "</p>";
                    }
                    ?>

                </div>

            </div>

            <div class="colonne2 colonne">
                <h2>Préparation</h2>
                <table class="preparation">
                    <tr>
                        <td class="preparation_etape" id='preparation_etape1'> <?php echo  $etapes; ?></td>
                    </tr>
                </table>
            </div>
        </div>



    </div>


</body>

</html>