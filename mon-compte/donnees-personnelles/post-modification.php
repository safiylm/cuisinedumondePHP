<?php
session_start();
require "../../data/config.php";


$email = htmlspecialchars($_POST['email']);
$nom = htmlspecialchars($_POST['nom']);


if (!empty($email) || !empty($nom)) {


  $sql = "UPDATE utilisateur SET  email = '".$email."' , nom='".$nom."' WHERE email = '" . $_SESSION['utilisateur']['email'] . "'";
 

    if ($result = $mysqli->query($sql)) {
       
      echo 'Changment is successful!  ' ;

      $_SESSION['utilisateur']['email'] = $email;


      header('Location: ../index.php');
      exit();

    } else {
        echo 'Changment is error!\n ';

    //  header('Location: ../index.php?pwdinvalid=true');
     // exit();
    }

  } 
  echo "55";