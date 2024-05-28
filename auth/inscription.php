<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="../css/auth.css" />

    <?php
    include("../shared/header.php");
    ?>
  
</head>

<body>
  <?php
    include("../shared/navigation.php");
  ?>

  <div class="container">
        <img id="image-left" src="../Photos/auth.jpg" style="max-width:50vw; max-height:100vh" />
    <div id="div-right">

      <h2>Inscription</h2>
      <form action="post-inscription.php" method="post">

        <input type="text" class="form-control" name="nom" placeholder="nom" required />

        <input type="text" class="form-control" name="prenom" placeholder="prenom" required />

        <input type="email" class="form-control" name="email" placeholder="email" required />
  <?php if (!empty($_GET['erreur'])) { ?>

          <div class="info">
          <?php if ($_GET['erreur'] == "email") {
            echo "<p style='color:red;'>Vous avez déjà un compte avec cette email.</p>";
          }
        } ?>
        <input type="password" class="form-control" name="password" placeholder="password" required />

        <div style='display: block; text-align:center;'>
          <input type="submit" class="btnSubmit" value="S'inscrire" />
        </div>
      </form>

    </div>
  </div>


</body>

</html>