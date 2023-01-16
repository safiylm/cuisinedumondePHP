<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Inscription</title>

</head>

<body>
  <?php
  session_start();
  include("../Navigation/index.php");
  // Connexion à la base de données
  require "../config.php";

  ?>

  <?php


  if (
    !empty($_POST['login']) && !empty($_POST['mdp']) &&
    !empty($_POST['nom']) &&  !empty($_POST['email'])
  ) {
    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO user (nom, login, email, password ) VALUES(?,?,?, ?)');
   $req->execute(array($_POST['nom'],  $_POST['login'], $_POST['email'], $_POST['mdp']));

    if ($check->fetch()) {
      $_SESSION['user']['nom'] = $_POST['nom'];
      $_SESSION['user']['login'] = $_POST['login'];
      $_SESSION['user']['email'] = $_POST['email'];
      $_SESSION['user']['mdp'] = $_POST['mdp'];


      header('Location: ../index.php');
      exit();
    } else {
      header('Location: index.php');
      exit();
    }
  }

  ?>
  <div class="container">
    <h2>Inscription</h2><br>
    <form action="#" method="post">

      <input type="text" class="form-control" name="nom" placeholder="nom" required /><br />

      <input type="text" class="form-control" name="login" placeholder="login" required /><br />

      <input type="email" class="form-control" name="email" placeholder="email" required /><br />

      <input type="password" class="form-control" name="mdp" placeholder="password" required /><br />
      <br>
      <input type="submit"  class="btn btn-primary" value="S'inscrire" />
      
    </form>

  </div>

</body>

</html>



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

    .container {
      background: #fff;
      padding: 60px;
        margin-top: 200px;
        margin-left: auto;
        margin-right: auto;
        max-width: 500px;
        border-radius: 10%;
    }
</style>