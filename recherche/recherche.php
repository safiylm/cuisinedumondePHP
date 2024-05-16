<?php
include('../shared/recette-card.php');

$q = $_REQUEST["q"];

$hint = "";

$json_object = file_get_contents("../data/recette.json");
$tab = json_decode($json_object, true);


for ($i = 0; $i < count($tab["sitecuisine"]["liste_recette"]['recette']); $i++) {

    $a[$i][0] = $tab["sitecuisine"]["liste_recette"]['recette'][$i]['titre'];
    $a[$i][1] = $i;
}


// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);

    for ($i = 0; $i < count($a); $i++) {
        $name = $a[$i][0];
        $id = $a[$i][1];
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $recette = $tab["sitecuisine"]["liste_recette"]['recette'][$id];
                $hint =   '<div>' .
                    recette_(
                        $recette['image'],
                        $recette["temps_total"],
                        $recette["difficulte"],
                        $recette["nb_personne"],
                        $recette["id"],
                        $recette["titre"],
                        $xml
                    )
                    . " </div>";
            } else {
                $recette = $tab["sitecuisine"]["liste_recette"]['recette'][$id];
                $hint .= '<div>' .
                recette_(
                    $recette['image'],
                    $recette["temps_total"],
                    $recette["difficulte"],
                    $recette["nb_personne"],
                    $recette["id"],
                    $recette["titre"],
                    $xml
                )
                . " </div>";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "Non trouvé" : $hint;
