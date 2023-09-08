<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
  <link rel="stylesheet" href="../CSS/body.css" />
  <link rel="stylesheet" href="../CSS/auth.css" />
</head>

<?php

include("../Navigation/index.php");
require "../data/config.php";
?>



<body>
  <div class="container">
    <h2>Login</h2><br>
    <form action="post-connexion.php" method="post">

      <input type="text" class="form-control" name="email" placeholder="email" required /><br />

      <input type="password" class="form-control" name="mdp" placeholder="mot de passe" required /><br />
      <br>
      <div style='display: block; text-align:center;'>
        <input class="btn" type="submit" value="Se connecter " /> 
        <a href='inscription.php' style='text-decoration:none; color:white; font-size:20px; margin-left:15px;'> S'inscrire </a>
      </div>

    </form>

  </div> <!-- fin div containerC -->
</body>

</html>
