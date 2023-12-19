<?php
session_start();
include('../../sendmail.php');

if (file_exists('../../data/recette-utilisateur.xml')) {
  $xml = simplexml_load_file('../../data/recette-utilisateur.xml');
} else {
  exit('Failed to open test.xml.');
}


$ancienpassword = htmlspecialchars($_POST['ancien-password']);
$new1password = htmlspecialchars($_POST['new1-password']);
$new2password = htmlspecialchars($_POST['new2-password']);

if (!empty($ancienpassword) && !empty($new1password) && !empty($new2password) && $new1password == $new2password) {

  $path = "//utilisateur[ email ='" . $_SESSION['utilisateur']['email'] . "' ]";

  // on verifie si le mot de passe actuel est bon
  if (count($xml->xpath($path)) == 1) {
    foreach ($xml->xpath($path) as $item) {
      if (password_verify($ancienpassword, $item->password[0]->__toString())) {

        //on remplace l'ancien par le nouveau
        for ($i = 0; $i < count($xml->liste_utilisateur->utilisateur); $i++) {
          if ($_SESSION['utilisateur']['email'] == $xml->liste_utilisateur->utilisateur[$i]->email) {

            $password = password_hash($new1password,  PASSWORD_BCRYPT);
            $xml->liste_utilisateur->utilisateur[$i]->password  = $password;
            $_SESSION['utilisateur']['password'] = $password;

            //envoie un mail pour prévenir
            $subjet = "Votre mot de passe a été modifié avec succès";
            $contenuMail = "Votre mot de passe a été modifié avec succès! ";
            $altbody = "Votre mot de passe a été modifié avec succès";
            sendmail("safinazylm@gmail.com", $subjet, $contenuMail, $altbody);
            
            //save in file 
            $xml->asXML();
            $xml->asXML('../../data/recette-utilisateur.xml');
            header('Location: ../index.php');
            exit();

          }
        }
      } else {
        //le mot de passe actuel est incorrecte
        header('Location: ../index.php?erreur=oldpasswordwrong');
        exit();
      }
    }
  }
}
