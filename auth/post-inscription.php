<?php
session_start();
include('../sendmail.php');

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
  $path = "//utilisateur[email ='" . $_POST['email'] . "']";


  $password = $_POST['mdp'];
  $password = password_hash($password,  PASSWORD_BCRYPT);
  // on ajoute la recette dans le carnet de recette
  if (count($xml->xpath($path)) == 0) {

    $var = $xml->liste_utilisateur->addChild('utilisateur');
    $cpt = count($xml->liste_utilisateur->children());
    $var->addAttribute('id', $cpt);

    $var->addChild('prenom', $_POST['prenom']);
    $var->addChild('nom', $_POST['nom']);
    $var->addChild('email', $_POST['email']);
    $var->addChild('password', $password);
    $var->addChild('isEmailChecked', "false");
    $var->addChild('dateCreation', date("Y/m/d") );


    $xml->asXML();
    $xml->saveXML("../data/recette-utilisateur.xml");
    $emailhash=password_hash($_POST['email'],  PASSWORD_BCRYPT);

    $subjet = "Demande de confirmation de votre mail";
    $contenuMail = "Veuillez confirmer votre mail<br/> http://localhost/auth/check-email/lien.php?e=". $emailhash;
    $altbody = "Demande de confirmation de votre mail";
    sendmail("safinazylm@gmail.com", $subjet, $contenuMail, $altbody);
  } else { // on enleve la recette du carnet de recette 
    header('Location: inscription.php?erreur=emailexistedeja');
  }

  header('Location: check-email/info.php');
  exit();
} else {
  header('Location: inscription.php');
  exit();
}
