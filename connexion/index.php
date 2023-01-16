<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
  <link rel="stylesheet" href="../CSS/body.css" />

</head>

<?php
session_start();
include("../Navigation/index.php");
require "../config.php";
?>

<?php
session_start();



if (!empty($_POST['login']) && !empty($_POST['mdp'])) {

  $password = htmlspecialchars($_POST['mdp']);
  $login = htmlspecialchars($_POST['login']);

  // On regarde si l'utilisateur est inscrit dans la table utilisateurs
  $check = $bdd->prepare('SELECT nom,login, email, password  FROM user WHERE login = ?');
  $check->execute(array($login));
  $data = $check->fetch();
  $row = $check->rowCount();


  if ($row > 0) // Si > à 0 alors l'utilisateur existe
  {
    // Si le mot de passe est le bon
    if ($password == $data['password']) {
      $_SESSION['user']['login'] = $data['login'];
      $_SESSION['user']['mdp'] = $data['password'];
      $_SESSION['user']['nom'] = $data['nom'];
      $_SESSION['user']['email'] = $data['email'];
      //go to user data page 
      header('Location: ../index.php');
      exit();
    }
  } else {
    //go to user data page 
    header('Location: index.php');
    exit();
  }
}

?>
<div class="container">
  <h2>Login</h2><br>
  <form action="#" method="post">

    <input type="text" class="form-control" name="login" placeholder="login" required /><br />

    <input type="password" class="form-control" name="mdp" placeholder="mot de passe" required /><br />
    <br>
    <input class="btn btn-primary" type="submit" value="Se connecter " />
    

  </form>

</div> <!-- fin div containerC -->

<style>
   body {
      background-image: url("../Photos/violet.png");
      max-width: 100%;
      background-repeat: no-repeat, repeat;
      background-size: 100%;
    }

    .form-control {
      max-width: 400px;
    }

    .container 
    {
      background: #fff;
      padding: 60px;
      margin-top: 200px;
      margin-left: auto;
      margin-right: auto;
      max-width: 500px;
      border-radius: 10%;
    }
</style>