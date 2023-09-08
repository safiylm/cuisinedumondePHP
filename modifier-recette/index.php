<!DOCTYPE html>
<html lang="fr">

<head>
    <title></title>
    <meta charset="UTF-8">
    <style>
        #titre {
            text-align: center;
        }

        input {
            height: 60px;
            ;
        }

        textarea {
            height: 160px;
            ;
        }

        body {
            background-image: url("../Photos/violet.png");
            max-width: 100%;
            background-repeat: no-repeat, repeat;
            background-size: 100%;
        }

        form {
            width: 600px;
            margin: 20px;
        }

        .container {
            position: fix;
            display: block;
            margin: 60px auto;
            width: 800px;
            background: #fff;
            border-radius: 5px;
            padding: 60px;
            overflow: hidden;
            border-radius: 5%;
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

        if ($data > 0) // Si > à 0 alors l'utilisateur existe
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
    

    if(isset($_POST['recetteSupprimer'])){
        $check = $bdd->prepare('DELETE FROM recette WHERE login = ? and nomRecette = ?');
        $check->execute(array($_SESSION['user']['login'], $_POST['recetteSupprimer']));
        header('Location: ../index.php');
    }
    ?>

    <div class="container" style="width:700px;">
        <h1 id='titre'> Modification de <?php echo $nomR; ?> </h1>

        <form method="post" action="jsmodif.php">

            <input type="hidden" name="titre0" value="<?php echo $nomR; ?>" />

            <h5>Titre</h5>
            <input type="text" name="titre" class="form-control" value="<?php echo $nomR; ?>" /><br />

            <h5>Ingrédients</h5>
            <textarea type="text" name="ingredients" class="form-control" ><?php echo $ingredient; ?></textarea> <br />

            <h5>Les étapes</h5>
            <textarea type="text" name="etapes" class="form-control" ><?php echo  $etapes; ?></textarea> <br />
            <div style=' display:block; text-align:center;'>
            <button type="submit" class="btn btn-primary"> Modifier la recette </button></div>

        </form>
        
        <form method="post" action="#">
            <input type="hidden" name="recetteSupprimer" value="<?php echo $nomR; ?>" />
            <div style=' display:block; text-align:center;'>
            <button type="submit" class="btn btn-danger" > Supprimer la recette  </button></div>
        </form>
    </div>


</body>

</html>