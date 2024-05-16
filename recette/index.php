<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Recette </title>
    <link rel="stylesheet" href="../css/publication.css" />
    <link rel="stylesheet" href="../css/recette.css" />

    
    <?php

    include("../shared/recette-card.php");
    include("../shared/header.php");
    include("../shared/getallrecettes.php");
    $id = $_GET['idRecette'];
    
    function getRecetteById($arrays, $id)
    {
        foreach ($arrays as $item) {
            if ($item['id'] == $id)
                return $item;
        }
        return null;
    }

    ?>
    
        
</head>

<body>
    <?php     
    include("../shared/navigation.php"); 
    ?>
    

    <?php

    if (isset($id)) {
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

                            if (!empty($_SESSION['utilisateur']['email'])) {

                                $path = "//enregistrement[email_utilisateur ='safinazyilmaz54@gmail.com' and id_recette=" . $id . "]";

                                if (count($xml->xpath($path)) == 0) { ?>

                                    <a href="../mon-carnet/mon-carnet-xml.php?idRecette=<?php echo  $id; ?>">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                                            <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.6 7.6 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z" />
                                        </svg>
                                    </a>

                                <?php } else { ?>
                                    <a href="../mon-carnet/mon-carnet-xml.php?idRecette=<?php echo  $id; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                            <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1" />
                                        </svg>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                            <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1" />
                                        </svg>
                                    </a>
                                <?php } else { ?>
                                    <a href="../mon-carnet/mon-carnet-session.php?idRecette=<?php echo $id; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                                            <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.6 7.6 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z" />
                                        </svg>
                                    </a>
                            <?php }
                            }
                            ?>
                            <!-- <button > Partager </button> -->

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
                            <div> <a href='../categorie/categorie.php?nom=<?php echo $recette['categorie']; ?>'>
                                    <?php echo $recette['categorie']; ?>
                                </a>
                            </div>
                        </div>

                        <?php if (!empty($recette["pays"])) { ?>
                            <div class='div-temps-element d-flex flex-column align-items-center justify-content-center'>
                                <div>Pays</div>
                                <div> <a href='../categorie/pays.php?nom=<?php echo $recette['pays'] ?>'>
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
    <?php

    } else { // si id de la recette n'existe pas 
        header('Location: ../index.php');
        exit();
    }
    ?>

    <div class="flex-container">
        <?php

        foreach ($tab["sitecuisine"]["liste_recette"]['recette'] as $recette) {
            if ($categorie == $recette['categorie']) {

                recette_($recette['image'], $recette["temps_total"], $recette["difficulte"], $recette["nb_personne"], $recette["id"], $recette["titre"], $xml);
            }
        } ?>
    </div>

    <?php
    include("../shared/footer.php"); footer_($tab);
    ?>

</body>

</html>