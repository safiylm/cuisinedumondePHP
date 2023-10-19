<?php
session_start();

if (file_exists('../data/recette-utilisateur.xml')) {
    $xml = simplexml_load_file('../data/recette-utilisateur.xml');
} else {
    exit('Failed to open test.xml.');
}

if (
  !empty($_POST['mdp']) && !empty($_POST['prenom']) &&
   !empty($_POST['nom']) &&  !empty($_POST['email'])
 ) {

$id = $_GET['idRecette'];
$path = "//utilisateur[email ='" . $_POST['email']. "']";


$password = $_POST['mdp'];  // password_hash($_POST['mdp'], PASSWORD_DEFAULT);
// on ajoute la recette dans le carnet de recette
if (count($xml->xpath($path)) == 0) {

    $var = $xml->liste_utilisateur->addChild('utilisateur');
    $cpt = count($xml->liste_utilisateur->children());
    $var->addAttribute('id', $cpt);

    $var->addChild('prenom', $_POST['prenom']);
    $var->addChild('nom', $_POST['nom']);
    $var->addChild('email', $_POST['email']);
    $var->addChild('password',$password );
 
    $_SESSION['utilisateur']['email'] =  $_POST['email'];
    $_SESSION['utilisateur']['password'] =  $_POST['mdp'];
    $_SESSION['utilisateur']['prenom'] = $_POST['prenom'];
    $_SESSION['utilisateur']['nom'] =  $_POST['nom'];

    $xml->asXML();
    $xml->saveXML("../data/recette-utilisateur.xml");

} else { // on enleve la recette du carnet de recette
  header('Location: inscription.php?erreur=emailexistedeja');
}

header('Location: ../mon-compte/index.php');
exit();

} else {
  header('Location: inscription.php');
  exit();
}

