<?php
session_start();
include('../../sendmail.php');

if (file_exists('../../data/recette-utilisateur.xml')) {
    $xml = simplexml_load_file('../../data/recette-utilisateur.xml');
} else {
    exit('Failed to open test.xml.');
}


$email = htmlspecialchars($_POST['email']);
$emailhash = htmlspecialchars($_POST['emailhash']);
$new1password = htmlspecialchars($_POST['new1-password']);
$new2password = htmlspecialchars($_POST['new2-password']);

if (!empty($email) && !empty($new1password) && !empty($new2password) && $new1password == $new2password) {

    if (password_verify($email, $emailhash)) { 

        $path = "//utilisateur[ email ='" . $email . "' ]";

        if (count($xml->xpath($path)) == 1) { //

            for ($i = 0; $i < count($xml->liste_utilisateur->utilisateur); $i++) {
                if ($email == $xml->liste_utilisateur->utilisateur[$i]->email) {

                    $password = password_hash($new1password,  PASSWORD_BCRYPT);
                    $xml->liste_utilisateur->utilisateur[$i]->password  = $password;

                    //envoie un mail pour prévenir
                    $subjet = "Votre mot de passe a été modifié avec succès";
                    $contenuMail = "Votre mot de passe a été modifié avec succès! ";
                    $altbody = "Votre mot de passe a été modifié avec succès";
                    sendmail("safinazylm@gmail.com", $subjet, $contenuMail, $altbody);

                    //save in file 
                    $xml->asXML();
                    $xml->asXML('../../data/recette-utilisateur.xml');
                    header('Location: ../connexion.php');
                    exit();
                }
            }
        }
    }
}
