<?php
session_start();

if (file_exists('../../data/recette-utilisateur.xml')) {
  $xml = simplexml_load_file('../../data/recette-utilisateur.xml');
} else {
  exit('Failed to open test.xml.');
}

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);

if ( !empty($nom) && !empty($prenom)) {
  for ($i = 0; $i < count($xml->liste_utilisateur->utilisateur); $i++) {
    if ($_SESSION['utilisateur']['email'] == $xml->liste_utilisateur->utilisateur[$i]->email) {
      $xml->liste_utilisateur->utilisateur[$i]->nom  = $nom;
      $xml->liste_utilisateur->utilisateur[$i]->prenom  = $prenom;

      $_SESSION['utilisateur']['nom'] = $nom;
      $_SESSION['utilisateur']['prenom'] = $prenom;
    }
  }

  $xml->asXML();
  $xml->asXML('../../data/recette-utilisateur.xml');
  header('Location: ../index.php');
  exit();

}
header('Location: ../index.php?commingupsoon=true');
exit();
