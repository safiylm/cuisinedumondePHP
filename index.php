<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cuisine du monde </title>
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

        .col {
            margin-bottom: 25px;
        }



        .img-thumbnail {
            height: 250px;
        }

        .form-control {
            max-width: 50%;
            height: 60px;
            display: block;
            text-align: center;
        }
    </style>
</head>
<?php
session_start();
require "config.php"; ?>


<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">

        <a href="#" class="navbar-brand"> RECETTE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a href="favoris/index.php" class="nav-link active" aria-current="page">Mes recettes préférées </a>
                </li>

                <?php if (!empty($_SESSION['user']['login'])) { ?>
                    <li class="nav-item">
                        <a href="Publications/index.php" class="nav-link active" aria-current="page"> Mes publications </a>
                    </li>
                    <li class="nav-item">
                        <a href="ajouter_recette/index.php" class="nav-link active" aria-current="page"> Ajouter une recette </a>
                    </li>
                    <li class="nav-item">
                        <a href="compte/index.php" class="nav-link active" aria-current="page">Mes données personnelles </a>
                    </li>
                <?php }   ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Compte
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (empty($_SESSION['user']['login'])) { ?>
                            <li><a class="dropdown-item" href="connexion/index.php">Connexion</a></li>
                            <li><a class="dropdown-item" href="inscription/index.php">Inscription</a></li>
                        <?php } else {  ?>
                            <li><a class="dropdown-item" href="deconnexion/index.php"> Deconnexion</a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>


        </div>

    </div>
</nav>


<body>

    <h1>Les Recettes</h1><br>

    <span id="proposals"></span>

    <div class="container px-4 text-center">
        <div class="row gx-5">
            <?php
            $reponse = $bdd->query('SELECT *  FROM recette ');

            while ($donnees = $reponse->fetch()) {
                $photoo = htmlspecialchars($donnees['photo']); ?>
                <?php $url = 'Photos/' . $photoo;

                if (is_file($url)) { ?>
                    <div class="col">
                        <div class="card" style="width: 20rem;">
                            <img src='Photos/<?php echo $photoo; ?>' class="img-thumbnail">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($donnees['nomRecette']); ?></h5>
                                <p class="card-text"></p>
                                <a href='Recette/index.php?titreRecette=<?php echo  htmlspecialchars($donnees['nomRecette']); ?>' class="btn btn-primary">Go </a>
                            </div>
                        </div>
                    </div>
                <?php  } else { ?>
                    <div class="col">
                        <div class="card" style="width: 250px;">
                            <img src='Photos/foood.png' class="img-thumbnail">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($donnees['nomRecette']); ?></h5>
                                <p class="card-text"></p>
                                <a href='Recette/index.php?titreRecette=<?php echo  htmlspecialchars($donnees['nomRecette']); ?>' class="btn btn-primary">Go </a>
                            </div>
                        </div>
                    </div>

            <?php }
            }
            $reponse->closeCursor();
            ?>

        </div>
    </div>

    <script src="Main/call.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>