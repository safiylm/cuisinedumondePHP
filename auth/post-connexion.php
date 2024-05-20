<?php
session_start();

if (file_exists('../data/recette-utilisateur.xml')) {
  $xml = simplexml_load_file('../data/recette-utilisateur.xml');
} else {
  exit('Failed to open test.xml.');
}

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['mdp']);

if (!empty($email) && !empty($password)) {

  $path = "//utilisateur[ email ='" . $email . "' ]";

//  echo $path;
  // on ajoute la recette dans le carnet de recette
  if (count($xml->xpath($path)) == 1) {
    foreach ($xml->xpath($path) as $item) {
     // echo  $item->password[0]->__toString();
     // if(password_verify( $password, $item->password[0]->__toString() ) ){
      echo $item->attributes();
        $_SESSION['utilisateur']['email'] = $email;
        $_SESSION['utilisateur']['id'] = $item->attributes()->__toString();
        $_SESSION['utilisateur']['password'] = $item->password[0]->__toString();
        $_SESSION['utilisateur']['prenom'] = $item->prenom[0]->__toString();
        $_SESSION['utilisateur']['nom'] =  $item->nom[0]->__toString();
        print_r($_SESSION);
          header('Location: ../mon-compte/index.php');
          exit();
      }

   
    //   else{ //password incorrecte
        echo "erreur password";
          header('Location: connexion.php?erreur=password');
          exit();
       // }
    }
  }
  else{ //email incorrecte 
    echo "erreur email";

     header('Location: connexion.php?erreur=email');
     exit();
  }

header('Location: connexion.php?erreur=emailpassword');
exit();

?>