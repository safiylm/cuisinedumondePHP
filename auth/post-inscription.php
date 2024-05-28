<?php
session_start();
?>

<?php 
//include('../shared/sendmail.php');

if (file_exists('../data/recette-utilisateur.xml')) {
  $xml = simplexml_load_file('../data/recette-utilisateur.xml');
} else {
  exit('Failed to open test.xml.');
}


$password = $_POST['password'];
// $password = password_hash($password,  PASSWORD_BCRYPT);


function checkValue(){
  return !empty(htmlspecialchars($_POST['password'])) && !empty(htmlspecialchars($_POST['prenom'])) &&
  !empty(htmlspecialchars($_POST['nom'])) &&  !empty(htmlspecialchars($_POST['email']));
}


if (checkValue() ) {

  $path = "//utilisateur[email ='" . $_POST['email'] . "']";
    echo $path;

  if (count($xml->xpath($path)) == 0) {


    $var = $xml->liste_utilisateur->addChild('utilisateur');
    $cpt = count($xml->liste_utilisateur->children());
    $var->addAttribute('id', $cpt);

    $var->addChild('prenom', $_POST['prenom']);
    $var->addChild('nom', $_POST['nom']);
    $var->addChild('email', $_POST['email']);
    $var->addChild('password', $password);
    $var->addChild('isEmailChecked', "false");
    $var->addChild('dateCreation', date("Y/m/d"));


    $xml->asXML();
    $xml->saveXML("../data/recette-utilisateur.xml");
  echo "<script>document.location.href='../mon-compte/index.php'</script>";


    $emailhash = password_hash($_POST['email'],  PASSWORD_BCRYPT);
    $subjet = "Demande de confirmation de votre mail";
    $contenuMail = "Veuillez confirmer votre mail<br/> http://localhost/auth/check-email/lien.php?e=" . $emailhash;
    $altbody = "Demande de confirmation de votre mail";
 //   sendmail("safinazylm@gmail.com", $subjet, $contenuMail, $altbody);
  } else { 
       echo "existe ";

       echo "<script>document.location.href='inscription.php?erreur=email'</script>";
  }

} else {
  echo "<script>document.location.href='inscription.php'</script>";

}
