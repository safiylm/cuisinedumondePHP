<?php
session_start();
include('../../sendmail.php');

if (file_exists('../../data/recette-utilisateur.xml')) {
  $xml = simplexml_load_file('../../data/recette-utilisateur.xml');
} else {
  exit('Failed to open test.xml.');
}

$email = htmlspecialchars($_POST['email']);

if ( !empty($email) ) {
  for ($i = 0; $i < count($xml->liste_utilisateur->utilisateur); $i++) {
    if ($_SESSION['utilisateur']['email'] == $xml->liste_utilisateur->utilisateur[$i]->email) {

      $subjet = "Confimer votre nouvelle email";
      $contenuMail = "Confimer votre nouvelle email, ";
      $altbody = "Confimer votre nouvelle email";
      sendmail("safinazylm@gmail.com", $subjet, $contenuMail, $altbody);

    }
  }

  $xml->asXML();
  $xml->asXML('../../data/recette-utilisateur.xml');
  header('Location: ../index.php');
  exit();

}
header('Location: ../index.php?commingupsoon=true');
exit();
