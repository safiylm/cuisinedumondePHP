<?php
session_start();

$path = '../data/recette.json';
$json_object = file_get_contents($path);
$tab = json_decode($json_object, true);

$id = htmlspecialchars($_POST['idRecette']);


if (!empty($id)) {
    $tab["sitecuisine"]['liste_recette']['recette'][$id]['titre'] =  $_POST['titre'];
    $tab["sitecuisine"]['liste_recette']['recette'][$id]['categorie'] =  $_POST['categorie'];
    $tab["sitecuisine"]['liste_recette']['recette'][$id]['cout'] = $_POST['cout'];

    $tab["sitecuisine"]['liste_recette']['recette'][$id]['image']= $_POST['url-image'];

    $tab["sitecuisine"]['liste_recette']['recette'][$id]['liste_ingredients'] =  array();
    $tab["sitecuisine"]['liste_recette']['recette'][$id]['liste_ingredients']["nb_personne"] = $_POST['nb-personne'];
    $tab["sitecuisine"]['liste_recette']['recette'][$id]['liste_ingredients']["ingredient"] = array();

    $tab["sitecuisine"]['liste_recette']['recette'][$id]['liste_ingredients']["ingredient"][0] = $_POST['un-ingredient-nb-0'];


    for ($i = 1; $i < $_POST['nb-ingredients-total']; $i++) {
        $tab["sitecuisine"]['liste_recette']['recette'][$id]['liste_ingredients']["ingredient"][$i] = $_POST['un-ingredient-nb-' . $i];
    }

    $tab["sitecuisine"]['liste_recette']['recette'][$id]['difficulte'] = $_POST['difficulte'];
    $tab["sitecuisine"]['liste_recette']['recette'][$id]['temps_total'] = $_POST['temps_total'];



    $tab["sitecuisine"]['liste_recette']['recette'][$id]['preparation']['etape'] = array();
    for ($i = 0; $i < $_POST['nb-etapes-total']; $i++) {
        $tab["sitecuisine"]['liste_recette']['recette'][$id]['preparation']['etape'][$i] = $_POST['une-etape-nb-' . $i];
    }

    print_r($tab["sitecuisine"]['liste_recette']['recette'][$id]);
}


$jsonString = json_encode($tab, JSON_PRETTY_PRINT);
 // Write in the file
$fp = fopen('../data/recette.json', 'w');
fwrite($fp, $jsonString);
fclose($fp);

echo "<script>document.location.href='../recette/index.php?idRecette=".$id."'</script>";
