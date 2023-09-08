
<?php

require "../data/config.php";



$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['mdp']);


if (!empty($email) && !empty($password)) {


  $sql = "SELECT * FROM utilisateur WHERE email = '" . $email . "'";
  if ($result = $mysqli->query($sql)->fetch_row()) {
    print_r($result[3]);

    $hash = $result[3];

    if (password_verify($password, $hash)) {
      echo 'Password is valid!\n ';
      $_SESSION['utilisateur']['email'] = $result[2];
      $_SESSION['utilisateur']['password'] = $hash;


      header('Location: ../index.php');
      exit();
    } else {

      header('Location: connexion.php?pwdinvalid=true');
      exit();
    }
  } else {
    header('Location: connexion.php?emailinvalid=true');
    exit();
  }
}



?>
