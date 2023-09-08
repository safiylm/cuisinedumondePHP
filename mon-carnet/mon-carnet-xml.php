
<?php
session_start();

if (file_exists('../data/recette-utilisateur.xml')) {
    $xml = simplexml_load_file('../data/recette-utilisateur.xml');
} else {
    exit('Failed to open test.xml.');
}

$id = $_GET['idRecette'];
$path = "//enregistrement[email_utilisateur ='" . $_SESSION['utilisateur']['email'] . "' and id_recette=" . $id . "]";

// on ajoute la recette dans le carnet de recette
if (count($xml->xpath($path)) == 0) {
    echo $xml->liste_enregistrements->enregistrement->email_utilisateur;
    $var = $xml->liste_enregistrements->addChild('enregistrement');
    $cpt = count($xml->liste_enregistrements->children());
    $var->addAttribute('id', $cpt);
    $var->addChild('email_utilisateur', $_SESSION['utilisateur']['email']);
    $var->addChild('id_recette', $id);
} else { // on enleve la recette du carnet de recette

    foreach ($xml->xpath($path) as $var) {
        unset($var[0]);
    }
}


$xml->asXML();
$xml->saveXML("../data/recette-utilisateur.xml");


header('Location: ../mon-compte/index.php');


?>