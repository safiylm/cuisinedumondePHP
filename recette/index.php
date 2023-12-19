<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Recette </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
    <link rel="stylesheet" href="../css/body.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/recette.scss" />
    <link rel="stylesheet" href="../css/publication.scss" />
    <link rel="stylesheet" href="../css/commentaire.scss" />
    <link rel="stylesheet" href="../css/nav.css" />

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <?php

    include("../accueil/recette.php");
    // Connexion à la base de données
    include("../navigation/index.php");

    $json_object = file_get_contents("../data/recette.json");
    $tab = json_decode($json_object, true);
    $id = $_GET['idRecette'];


    if (file_exists('../data/recette-utilisateur.xml')) {
        $xml = simplexml_load_file('../data/recette-utilisateur.xml');
    } else {
        exit('Failed to open test.xml.');
    }

    function getRecetteById($arrays, $id){
        foreach($arrays as $item){
            if ($item['id'] == $id)
                return $item;
        }
        return null;
    }

    ?>
</head>

<body>

    <?php




    if (isset($id)) {
        $recette = getRecetteById($tab["sitecuisine"]["liste_recette"]['recette'], $id); ?>

        <div class="contenu">
            <div class="div-image-infos">

                <div class="div-image">

                    <?php if (is_file('../Photos/' . $recette["image"])) { ?>
                        <img src='../Photos/<?php echo $recette["image"]; ?>' class='image-recette' />
                    <?php  } else { ?>
                        <img src='<?php echo $recette["image"]; ?>' class='image-recette' />
                    <?php } ?>
                </div>

                <div class="div-right">

                    <h1 id='titre'> <?php echo $recette["titre"]; ?> </h1>

                    <?php
                    foreach ($xml->xpath("//utilisateur[@id='" . $recette["auteur"] . "']") as $item) {
                        echo "<p style='text-align:center;'>Auteur : <a href='../leur-compte/index.php?idUtilisateur=" . $item->attributes() . "' >" . $item->nom . " " . $item->prenom . "</a></p>";
                    }
                    ?>

                    <div class="div-temps">
                        <?php
                        echo "<div class='element-div-temps'><strong> Difficulté </strong> <br>" . $recette["difficulte"] . "</div>";
                        echo  "<div class='element-div-temps'><strong> Temps Totale </strong><br>" . $recette["temps_total"] . "</div>";
                      ?>

                    </div>

                    <div id="div-btn-save-recette">
                        <?php
                        $categorie = $recette['categorie'];
                        echo "<a href='../categorie/categorie.php?nom=" . $categorie . "'>" . $categorie . "</a>  &nbsp  &nbsp ";
                        if (!empty($recette["pays"]))
                            echo "<a href='../categorie/pays.php?nom=" . $recette['pays'] . "'>" . $recette['pays'] . "</a> &nbsp  &nbsp ";

                        if (!empty($_SESSION['utilisateur']['email'])) {

                            $path = "//enregistrement[email_utilisateur ='safinazyilmaz54@gmail.com' and id_recette=" . $id . "]";

                            if (count($xml->xpath($path)) == 0) { ?>

                                <a href="../mon-carnet/mon-carnet-xml.php?idRecette=<?php echo  $id; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                                        <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z" />
                                    </svg> Mon carnet
                                </a>

                            <?php } else { ?>
                                <a href="../mon-carnet/mon-carnet-xml.php?idRecette=<?php echo  $id; ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                        <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                                    </svg> Enlever du carnet
                                </a>


                            <?php   }
                        } else {
                            $doublon = false;
                            foreach ($_SESSION['favori'] as $item) {
                                if ($item == htmlspecialchars($_GET['idRecette']))
                                    $doublon = true;
                            }
                            if ($doublon) {
                            ?>
                                <a href="../mon-carnet/mon-carnet-session.php?idRecette=<?php echo $id; ?>">
                                    <img src='../Photos/suit-heart-fill.svg'> Enlever du Carnet
                                </a>
                            <?php } else { ?>
                                <a href="../mon-carnet/mon-carnet-session.php?idRecette=<?php echo $id; ?>">
                                    <img src='../Photos/suit-heart.svg'> Mon carnet
                                </a>
                        <?php }
                        }
                        ?>
                        <!-- <button > Partager </button> -->

                    </div>
                </div>

            </div>

            <div class="div-ingredients-etapes">
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
    <?php

    } else { // si id de la recette n'existe pas 
        header('Location: ../index.php');
        exit();
    }
    ?>

<div class="flex-container" >
            <?php

            foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {
                       if ($categorie == $recette['categorie']) {
                    
                recette_($recette['image'], $recette["temps_total"], $recette["difficulte"], $recette["nb_personne"], $recette["id"], $recette["titre"], $xml);
           
           }
           } ?>
        </div>



        <div class="div-commentaire-etoile">
            <h4>Commentaires</h4>
            <?php
            $path = "//liste_commentaires/commentaire[id_recette=" .  $_GET['idRecette'] . "]";




            if (count($xml->xpath($path)) == 0) {
                echo " <p class='p-commentaire'> Soyez le premier à faire un commentaire.</p> ";
            }
            foreach ($xml->xpath($path) as $item) {

                foreach ($xml->xpath("//utilisateur[email='" . $item->email_utilisateur . "']") as $itemm) {
                    echo " <a href='../leur-compte/index.php?idUtilisateur=" . $itemm->attributes() . "' >" . $itemm->nom . " " . $itemm->prenom . "</a>";
                }

                echo "<p class='p-commentaire'>" . $item->contenu . "</p>";
                if ($item->email_utilisateur == $_SESSION['utilisateur']['email']) {
                    echo "<a href='modifier-commentaire-xml.php?idRecette=" . $_GET['idRecette'] . "&idCommentaire=" . $item->attributes() . "'> Modifier son commentaire  </a>";
                    echo "<a href='supprimer-commentaire-xml.php?idRecette=" . $_GET['idRecette'] . "&idCommentaire=" . $item->attributes() . "'> Supprimer son commentaire  </a>";
                }
            }

            // echo does the casting for you

            ?>


            <div class="div-note-etoile">

                <p style='display:inline;'> Noter le cours : &nbsp;
                <div class="stars" style='display:inline;'>
                    <i class="star stargrey fas fa-star" data-index="0"></i>
                    <i class="star stargrey fas fa-star" data-index="1"></i>
                    <i class="star stargrey fas fa-star" data-index="2"></i>
                    <i class="star stargrey fas fa-star" data-index="3"></i>
                    <i class="star stargrey fas fa-star" data-index="4"></i>
                </div> &nbsp; &nbsp;

                <span id="note-en-etoile" style='display:inline;'>
                </span> </p>

            </div>

            <?php
            $path = "//liste_note_etoile/note_etoile[id_recette=" .  $_GET['idRecette'] . "]";

            if (count($xml->xpath($path)) != 0)
                foreach ($xml->xpath($path) as $item) { ?>

                <script>
                    for (var i = 0; i < <?php echo $item->nbetoile; ?>; i++)
                        $(".stars").find('.star[data-index=' + i + ']').addClass("yellow")
                </script>

            <?php  }
            ?>

            <p>Faire un commentaire :</p>
            <form method="post" action="ajouter-commentaire-xml.php">
                <input type="hidden" name="idRecette" value="<?php echo $_GET['idRecette']; ?>">
                <textarea id="contenu-commentaire" name="contenu" class="form-control"></textarea>
                <button type="submit">Commenter</button>
            </form>
        </div>




    <script>
        // On récupère toutes les étoiles
        var toutesLesEtoiles = $('.stars .star');
        // console.log(toutesLesEtoiles);

        // On rajoute l'écouteur au clic;
        // toutesLesEtoiles.click(onStarClick)
        toutesLesEtoiles.click(onStarClick);


        // On gère ce qui se passe lors du clic d'une étoile
        function onStarClick(event) {

            // On récupère l'objet cliqué, AU FORMAT JQUERY
            var etoileClique = $(this);
            console.log(etoileClique);

            // On récupère son index ("Quelle étoile a été cliquée ?") depuis sont attribut data-index
            var indexClique = etoileClique.data("index");
            // console.log(indexCliqué);

            // On récupère son parent (afin de rendre ça réutilisable pour d'autres groupes)
            var parent = $(this).parent();

            // Style : "Vider" toutes les étoiles.. de ce groupe
            parent.find('.star').addClass('stargrey');
            parent.find('.star').removeClass('yellow');

            //// Style : "Remplir" le bon nombre d'étoiles
            // Pour ce groupe, pour chaque étoile de 0 jusqu'à celle cliquée..
            for (var i = 0; i <= indexClique; i++) {

                var etoile = parent.find('.star[data-index=' + i + ']');
                // console.log( etoile );

                // Je remplie
                etoile.addClass('yellow');
                etoile.removeClass('stargrey');
                let val = i + 1;
                $('#note-en-etoile').text(val + '/5')
            }
            indexClique++
            document.location.href = "ajouter-note-etoile-xml.php?nbetoile=" + indexClique + "&idRecette=<?php echo $_GET['idRecette']; ?>"
        }


        function coloriestar(indexClique) {
            for (var i = 0; i <= indexClique; i++) {
                console.log("oui")


                // var etoile = parent.find('.star[data-index=' + i + ']');
                // // console.log( etoile );

                // // Je remplie
                // etoile.addClass('yellow');
                // etoile.removeClass('stargrey');
                // let val = i + 1;
                // $('#note-en-etoile').text(val + '/5')
            }
        }
    </script>
  <?php include("../footer/index.php");
   footer_($tab);
   ?>

</body>

</html>