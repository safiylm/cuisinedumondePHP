<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Mes favoris </title>
    <script src="https://www.tutorialspoint.com/jquery/jquery-3.6.0.js"></script>

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

        body {
            background-image: url("../Photos/violet.png");
            max-width: 100%;
            background-repeat: no-repeat, repeat;
            background-size: 100%;
        }
        td {
           max-width: 200px;
        }

        .ensembleRecette {
            padding: 60px;
            border-radius: 3%;
            margin-top: 150px;
            background-color:  #fff;
            width: 850px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>

    <!-- Barre de navigation -->
    <?php
    session_start();
    require "../config.php";
    include("../Navigation/index.php");

    if (!isset($_SESSION['favori']))
        $_SESSION['favori'] = array();

    //  SUPPRIMER UNE RECETTE DANS LES FAVOVIS 
    if (!empty($_POST['titreRecette'])) {

        $req = $bdd->prepare('DELETE FROM favori WHERE login =? and nomRecette = ?');
        $req->execute(array($_SESSION['user']['login'], $_POST['titreRecette']));

        for ($i = 0; $i < sizeof($_SESSION['favori']); $i++) {
            if ($_SESSION['favori'][$i] === $_POST['titreRecette']) {
                array_splice($_SESSION['favori'], $i, 1);
            }
        }

        header('Location: index.php');
        exit();
    }
    ?>

    <div class="ensembleRecette">
        <h1> Mes recettes préferés </h1><br>

        <?php
        $reponse = $bdd->prepare('SELECT *  FROM favori WHERE login =? ');
        $reponse->execute(array($_SESSION['user']['login']));
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"> </th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($_SESSION['user']['login'])) {
                    while ($donnees = $reponse->fetch()) {
                ?>

                        <tr>
                            <th scope="row">
                                <a href="../Recette/index.php?titreRecette=<?php echo $donnees['nomRecette']; ?>"><?php echo $donnees['nomRecette']; ?> </a>
                            </th>
                            <td style="text-align:right;">
                                <form method="post" action='#'>
                                    <input type='hidden' name="titreRecette" value="<?php echo $donnees['nomRecette']; ?>">
                                    <input type="submit" value="Supprimer des favoris">
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    for ($i = 0; $i < sizeof($_SESSION['favori']); $i++) {
                    ?>
                        <tr>
                            <th scope="row">
                                <a href="../recette/index.php?titreRecette=<?php echo $_SESSION['favori'][$i]; ?>"><?php echo $_SESSION['favori'][$i]; ?> </a>
                            </th>
                            <td style="text-align:right;">
                                <form method="post" action='#'>
                                    <input type='hidden' name="titreRecette" value="<?php echo $_SESSION['favori'][$i]; ?>">
                                    <input type="submit" value="Supprimer des favoris">
                                </form>
                            </td>
                        </tr>

                <?php }
                }

                $reponse->closeCursor();
                ?>
            </tbody>
        </table>

    </div>

</body>

</html>