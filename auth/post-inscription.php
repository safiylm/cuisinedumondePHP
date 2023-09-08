<?php

require "../data/config.php";


if (
 !empty($_POST['mdp']) &&
  !empty($_POST['nom']) &&  !empty($_POST['email'])
) {

  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $password = $_POST['mdp'];
  $password = password_hash($password,  PASSWORD_DEFAULT);

  $sql = "INSERT INTO utilisateur (nom, email, password) " .
    "VALUES ( '" . $nom .  "' , '" . $email . "' , '" . $password . "' )";

  if ($mysqli->query($sql)) {

    $_SESSION['uilisateur']['password'] = $password;
    $_SESSION['uilisateur']['nom'] = $nom;
    $_SESSION['uilisateur']['email'] = $email;
    
    header('Location: ../index.php');
    exit();
  }
} else {
  header('Location: inscription.php');
  exit();
}
?>