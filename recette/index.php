<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Recette </title>
    <link rel="stylesheet" href="../css/publication.css" />
    <link rel="stylesheet" href="../css/recette.css" />
    <link rel="stylesheet" href="../css/commentaire.css" />

    <?php
    session_start();
    include("../shared/header.php");
    include('../shared/favorisfunction.php');
    include("../shared/getallrecettes.php");

    $id = $_GET['idRecette'];

    $json_object = file_get_contents("../data/recette.json");
    $tab = json_decode($json_object, true);

    if (file_exists('../data/recette-utilisateur.xml')) {
        $xml = simplexml_load_file('../data/recette-utilisateur.xml');
    } else {
        exit('Failed to open test.xml.');
    }
    ?>


</head>

<body>
    <?php
    include("../shared/navigation.php");
    ?>


    <?php
    // si id de la recette n'existe pas 
    if (!isset($id)) {
        header('Location: ../index.php');
        exit();
    } else {
        $recette = getRecetteById($tab["sitecuisine"]["liste_recette"]['recette'], $id); ?>

        <div class="contenu d-flex flex-column align-items-center justify-content-center">
            <div class="div-image-infos d-flex flex-row align-items-center justify-content-start">

                <div class="div-image">

                    <?php if (is_file('../Photos/' . $recette["image"])) { ?>
                        <img src='../Photos/<?php echo $recette["image"]; ?>' width="400px" height="400px" class='image-recette' />
                    <?php  } else { ?>
                        <img src='<?php echo $recette["image"]; ?>' width="400px" height="400px" class='image-recette' />
                    <?php } ?>
                </div>

                <div class="div-right">

                    <h1 id='titre'> <?php echo $recette["titre"]; ?> </h1>
                    <div class="d-flex flex-row align-items-center justify-content-evenly">
                        <?php
                        foreach ($xml->xpath("//utilisateur[@id='" . $recette["auteur"] . "']") as $item) {
                            echo "<p id='p-auteur'>Auteur : <a href='../leur-compte/index.php?idUtilisateur=" . $item->attributes() . "' >" . $item->nom . " " . $item->prenom . "</a></p>";
                        }
                        ?>

                        <div id="div-btn-save-recette">
                            <?php
                             if (empty($_SESSION['utilisateur']['email'])) {
                                 displayHeartSession($id);
                             } else {
                                 displayHeartXml($xml, $id);
                             } ?>
                        </div>
                    </div>

                    <div class="div-temps d-flex flex-wrap flex-row align-items-center justify-content-center">
                        <div class='div-temps-element d-flex flex-column align-items-center justify-content-center'>
                            <div> Difficulté </div>
                            <div> <?php echo $recette["difficulte"]; ?></div>
                        </div>
                        <div class='div-temps-element d-flex flex-column align-items-center justify-content-center'>
                            <div> Temps Totale</div>
                            <div> <?php echo $recette["temps_total"]; ?></div>
                        </div>

                        <div class='div-temps-element d-flex flex-column align-items-center justify-content-center'>
                            <div>Categorie</div>
                            <div> <a href='../categorie/index.php?categorie=<?php echo $recette['categorie']; ?>'>
                                    <?php echo $recette['categorie']; ?>
                                </a>
                            </div>
                        </div>

                        <?php if (!empty($recette["pays"])) { ?>
                            <div class='div-temps-element d-flex flex-column align-items-center justify-content-center'>
                                <div>Pays</div>
                                <div> <a href='../categorie/index.php?pays=<?php echo $recette['pays'] ?>'>
                                        <?php echo $recette['pays']; ?>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>

                    </div>


                </div>

            </div>

            <div class="div-ingredients-etapes d-flex flex-row flex-wrap align-items-start  justify-content-center">
                <div class="div-ingredients">
                    <h2>Ingrédients</h2>
                    <div class="ingredients" id='ingredients'>

                        <?php
                        foreach ($recette["liste_ingredients"]["ingredient"] as $ingred) {
                            echo "<p>" . $ingred . "</p>";
                        }
                        ?>

                    </div>

                </div>

                <div class="div-etapes">
                    <h2>Préparation</h2>
                    <table class="preparation">
                        <tr>
                            <td class="preparation_etape" id='preparation_etape1'>
                                <?php
                                foreach ($recette['preparation']['etape'] as $etape) {
                                    echo "<p>" . $etape . "</p>";
                                } ?>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>

        </div>

        <div class="div-form-create-comment">
            <p>Faire un commentaire :</p>
            <form method="post" action="ajouter-commentaire-xml.php">
                <input type="hidden" name="idRecette" value="<?php echo $_GET['idRecette']; ?>">
                <textarea id="contenu-commentaire" name="contenu" class="form-control"></textarea>
                <button class="btn btn-primary" type="submit">Commenter</button>
            </form>
        </div>

    <?php
    }

    include("../shared/footer.php");
    footer_($tab);
    ?>

</body>

</html>