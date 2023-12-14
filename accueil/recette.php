<?php
//function allow to factorisation code for repice display in Container of many repice
function recette($url_image, $temps_total, $difficulte, $nb_personne, $id, $titre, $xml)
{
    if (is_file($url_image)) {
        $url_image = "Photos/" . $url_image;
    }

    $photo_heart = 'Photos/suit-heart.svg';
    $url = "mon-carnet/mon-carnet-xml.php?idRecette=" . $id;

    if (!empty($_SESSION["utilisateur"]["email"])) {

        $url = "mon-carnet/mon-carnet-xml.php?idRecette=" . $id;

        $path = "//enregistrement[email_utilisateur ='" . $_SESSION['utilisateur']['email'] . "' and id_recette=" . $id . "]";
        if (count($xml->xpath($path)) == 0) {
            $photo_heart = 'Photos/suit-heart.svg';
        } else {
            $photo_heart = 'Photos/suit-heart-fill.svg';
        }
    } else {
        $url = "mon-carnet/mon-carnet-session.php?idRecette=" . $id;
        if (empty($_SESSION['favori'])) {
            $photo_heart = 'Photos/suit-heart.svg';
        } else {
            $photo_heart = 'Photos/suit-heart.svg';

            foreach ($_SESSION['favori'] as $item) {
                if ($item == htmlspecialchars($id))
                    $photo_heart = 'Photos/suit-heart-fill.svg';
            }
        }
    }
    echo '<div class="flex-item">
                    <div class="element">
                        <div class="div-img">
                            <img src="' . $url_image . '" />
                        </div>
                        <div class="info-recette">
                                <div>' . $temps_total . '</div>
                                <div>' . $difficulte . '</div>
                                <div>' . $nb_personne . '</div>
                        </div>
                        <div class="div-titre">
                            <a class="a-titre" href="Recette/index.php?idRecette=' . $id . '">
                                ' . $titre . '
                            </a>

                            <a href="' . $url . '" id="btn-trash">
                                <img id="heart" src="' . $photo_heart . '"></a>
                        </div>
                    </div>
                </div>';
}


//function allow to factorisation code for repice display in Container of many repice
function recette_($url_image, $temps_total, $difficulte, $nb_personne, $id, $titre, $xml)
{
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
                            <img src="' . $url_image . '" />
                        </div>
                        <div class="info-recette">
                                <div>' . $temps_total . '</div>
                                <div>' . $difficulte . '</div>
                                <div>' . $nb_personne . '</div>
                        </div>
                        <div class="div-titre">
                            <a class="a-titre" href="../Recette/index.php?idRecette=' . $id . '">
                                ' . $titre . '
                            </a>

                            <a href="' . $url . '" id="btn-trash">
                                <img id="heart" src="' . $photo_heart . '"></a>
                        </div>
                    </div>
                </div>';
}