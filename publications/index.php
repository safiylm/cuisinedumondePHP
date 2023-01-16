<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Mes publications</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        h1 {
            margin: 60px;
            text-align: center;
            font-size: 40px;
            text-transform: uppercase;
            font-weight: lighter;
            font-family: 'Work Sans', sans-serif;
            text-decoration: none;
            color: #858585;
        }

        #divAddRdecont {
            display: flex;
            flex-flow: wrap;
            align-items: center;
            justify-content: center;
        }

        #addRdecont {
            font-size: 20px;
            margin: 40px;
            text-transform: uppercase;
            font-weight: lighter;
            font-family: 'Work Sans', sans-serif;
            text-decoration: none;
            color: #858585;
        }

        .btn2first {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btnPublication,
        .btnEnregistrement {
            margin: 15px;
            padding: 20px 50px;
            font-size: 1em;
            width: 35%;
            border: none;
        }

        .ensemblePublication {
            max-width: 900px;
            ;
            display: flex;
            flex-flow: row wrap;
            justify-content: space-around;
            margin: 20px;
            padding: 10px;
            list-style: none;
            height: auto;
        }



        .ensemblePublication .UneRecette,
        .ensembleFavoris .UneRecette {
            text-align: center;
            align-self: center;
            justify-self: center;
            margin: 20px;
            padding: auto;
            cursor: pointer;
            border-radius: 14px;
            width: 400px;
            height: 400px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        img,
        img {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }

        .titreAndBtnTrash {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .ensemblePublication .UneRecette .titreRecette,
        .ensembleFavoris .UneRecette .titreRecette {
            font-size: 20px;
            font-family: 'Work Sans', sans-serif;
            text-decoration: none;
            padding: 18px;
            margin: 25px;
            text-transform: uppercase;
            color: #858585;
            font-weight: lighter;
        }

        .btnTrash {
            width: 70px;
            height: 50px;
        }






        @media screen and (max-device-width: 940px) {

            .btnPublication,
            .btnEnregistrement {
                margin: 15px;
                padding: 20px 50px;
                font-size: 1.5em;
                min-width: auto;
                width: 40%;
            }


            .ensemblePublication .UneRecette .titreRecette,
            .ensembleFavoris .UneRecette .titreRecette {
                font-size: 25px;
            }

            .btnPublication,
            .btnEnregistrement {
                border-radius: 4px;
                width: 30%;
                background: #dee2df;
            }

        }


        @media screen and (max-device-width: 740px) {

            h2 {
                margin: 70px;
                font-size: 4em;
            }

            .btnPublication,
            .btnEnregistrement {
                margin: 15px;
                padding: 20px 50px;
                font-size: 2.5em;
                min-width: 300px;
                height: 90px;
                font-size: 2em;
                /* width:50%; */
            }

            .btnPublication,
            .btnEnregistrement {
                border-radius: 4px;
                width: 20%;
                background: #dee2df;
            }

            .ensemblePublication .UneRecette,
            .ensembleFavoris .UneRecette {
                width: 750px;
                height: 700px;
            }

            .ensemblePublication .UneRecette .titreRecette,
            .ensembleFavoris .UneRecette .titreRecette {
                font-size: 35px;
            }

        }
    </style>
    <?php
    session_start();
    require "../config.php";
    include("../Navigation/index.php");
    ?>
</head>

<body>

    <!-- Barre de navigation -->


    <h1 style=" margin: 60px;"> Mes Publications </h1>

    <div class="container px-4 text-center">
        <div class="row gx-5">

            <?php
            $reponse = $bdd->prepare('SELECT *  FROM recette WHERE login = ?');
            $reponse->execute(array($_SESSION['user']['login']));

            while ($donnees = $reponse->fetch()) {
                $photoo = htmlspecialchars($donnees['photo']);
                $url = '../Photos/' . $photoo;

                if (is_file($url)) { ?>
                    <div class="col">
                        <div class="card" style="width: 20rem;">
                            <img src='../Photos/<?php echo $photoo; ?>' class="img-thumbnail">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($donnees['nomRecette']); ?></h5>
                                <p class="card-text"></p>
                                <a href='../Recette/index.php?titreRecette=<?php echo  htmlspecialchars($donnees['nomRecette']); ?>' class="btn btn-primary">Go </a>

                            </div>
                        </div>
                    </div><br>
                <?php  } else { ?>
                    <div class="col">
                        <div class="card" style="width: 20rem;">
                            <img src='../Photos/food.jpg' class="img-thumbnail" style="height: 270px;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($donnees['nomRecette']); ?></h5>
                                <p class="card-text"></p>
                                <a href='../Recette/index.php?titreRecette=<?php echo  htmlspecialchars($donnees['nomRecette']); ?>' class="btn btn-primary">Go </a>
                            </div>

                        </div>
                    </div><br>

            <?php }
            }

            $reponse->closeCursor();
            ?>
       <br> </div>
    </div>


</body>

</html>

<style>
    .img-thumbnail {
        height: 200px;
    }
</style>
</style>