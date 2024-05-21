<?php

//function allow to factorisation code for repice display in Container of many repice
function recette($recette, $xml)
{
    $id = $recette["id"];
    $titre = $recette["titre"];
    $url_image = $recette['image'];
    $temps_total = $recette["temps_total"];
    $difficulte = $recette["difficulte"];

    if (is_file($url_image)) {
        $url_image = "Photos/" . $url_image;
    }
    echo '<div class="flex-item">
                    <div class="element">
                        <div class="div-img">
                            <img src="' . $url_image . '" style="width : 100%; height : 300px;" />
                        </div>
                        <div class="info-recette">
                                <div>' . $temps_total . '</div>
                                <div>' . $difficulte . '</div>
                        </div>
                        <div class="div-titre">
                            <a class="a-titre" href="recette/index.php?idRecette=' . $id . '">
                                ' . $titre . '
                                </a>';
                               
                                if (empty($_SESSION['utilisateur']['email'])) {
                                    displayHeartSession($id);
                                } else {
                                    displayHeartXml($xml, $id, true);
                                }
                                echo '</div>
                    </div>
                </div>';
}


//function allow to factorisation code for repice display in Container of many repice
function recette_($recette, $xml)
{
    $id = $recette["id"];
    $titre = $recette["titre"];
    $url_image = $recette['image'];
    $temps_total = $recette["temps_total"];
    $difficulte = $recette["difficulte"];

    if (is_file($url_image)) {
        $url_image = "Photos/" . $url_image;
    }

    echo '<div class="flex-item">
                    <div class="element">
                        <div class="div-img">
                            <img src="' . $url_image . '" style="width : 100%; height : 300px;" />
                        </div>
                        <div class="info-recette">
                                <div>' . $temps_total . '</div>
                                <div>' . $difficulte . '</div>
                        </div>
                        <div class="div-titre">
                            <a class="a-titre" href="../recette/index.php?idRecette=' . $id . '">
                                ' . $titre . '
                            </a>';

    if (empty($_SESSION['utilisateur']['email'])) {
        displayHeartSession($id);
    } else {
        displayHeartXml($xml, $id, false);
    }
    echo '</div>
                    </div>
                </div>';
}



//function allow to factorisation code for repice display in Container of many repice
function mes_recettes_($recette, $xml, $iduser)
{
    $id = $recette["id"];
    $titre = $recette["titre"];
    $url_image = $recette['image'];
    $temps_total = $recette["temps_total"];
    $difficulte = $recette["difficulte"];

    if (is_file($url_image)) {
        $url_image = "Photos/" . $url_image;
    }

    $photo_heart = '../Photos/suit-heart.svg';
    $url = "../mon-carnet/mon-carnet-xml.php?idRecette=" . $id;

    if (!empty($_SESSION["utilisateur"]["email"])) {

        $url = "../mon-carnet/mon-carnet-xml.php?idRecette=" . $id;

        $path = "//enregistrement[email_utilisateur ='" . $_SESSION['utilisateur']['email'] . "' and id_recette=" . $id . "]";
        if (count($xml->xpath($path)) == 0) {
            $photo_heart = '../Photos/suit-heart.svg';
        } else {
            $photo_heart = '../Photos/suit-heart-fill.svg';
        }
    } else {
        $url = "../mon-carnet/mon-carnet-session.php?idRecette=" . $id;
        if (empty($_SESSION['favori'])) {
            $photo_heart = '../Photos/suit-heart.svg';
        } else {
            $photo_heart = '../Photos/suit-heart.svg';

            foreach ($_SESSION['favori'] as $item) {
                if ($item == htmlspecialchars($id))
                    $photo_heart = '../Photos/suit-heart-fill.svg';
            }
        }
    }
    echo '<div class="flex-item">
                    <div class="element">
                        <div class="div-img">
                            <img src="' . $url_image . '" style="width : 100%; height : 300px;"/>
                        </div>
                        <div class="info-recette">
                                <div>' . $temps_total . '</div>
                                <div>' . $difficulte . '</div>
                        </div>
                        <div class="div-titre">
                            <a class="a-titre" href="../recette/index.php?idRecette=' . $id . '">
                                ' . $titre . '
                            </a>';
    if (empty($_SESSION['utilisateur']['email'])) {
        displayHeartSession($id);
    } else {
        displayHeartXml($xml, $id);
    }


    echo '<a href="../recette-edit/index.php?idRecette=' . $id . '" id="btn-trash">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                            </svg>
                        </a>
                        </div>
                    </div>
                </div>';
}
