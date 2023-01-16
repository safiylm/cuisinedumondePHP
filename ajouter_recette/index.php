<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Ajouter une Recette </title>
  <link rel="stylesheet" href="../CSS/body.css" />

  <style>
    body {
      background-image: url("../Photos/violet.png");
      max-width: 100%;
      background-repeat: no-repeat, repeat;
      background-size: 100%;
    }

    .containerR {
      position: fix;
      display: block;
      margin: 60px auto;
      width: 800px;
      background: #fff;
      border-radius: 5px;
      padding: 60px;
      overflow: hidden;
      border-radius: 5%;
    }

    form input {
      height: 60px;
      overflow: hidden;
    }

    form textarea {
      height: 150px;
      overflow: hidden;
    }
  </style>


</head>

<body>


  <?php
  session_start();

  // Connexion à la base de données 
  include("../navigation/index.php");
  require "../config.php";

  ?>

  <?php

  if (
    isset($_POST['nomR'])  && isset($_POST['ingredient']) &&
    isset($_POST['etapes']) && isset($_SESSION['user']['login'])
  ) {
    // Insertion du message à l'aide d'une requête préparée

    $req = $bdd->prepare('INSERT INTO recette (login, nomRecette, ingredients, etapes, photo) 
           VALUES(?,?,?,?, ?)');
    $req->execute(array(
      $_SESSION['user']['login'], $_POST['nomR'], $_POST['ingredient'],
      $_POST['etapes'], $_POST['photo']
    ));
 

   
    
    // ajouterArticle($_POST['nomR']);

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
      if ($_FILES['photo']['size'] < 1000000) {

        // Testons si l'extension est autorisée
        $fileInfo = pathinfo($_FILES['photo']['name']);
        $extension = $fileInfo['extension'];
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
        if (in_array($extension, $allowedExtensions)) {
          // On peut valider le fichier et le stocker définitivement
          move_uploaded_file($_FILES['photo']['tmp_name'], "C:\MAMP\htdocs\YEMEK\Photos\ " . basename($_FILES['photo']['name']));
          header("location: ../index.php");
          exit;
        }
      } else {
        echo "photo trop volumineuse";
      }
    }
    
    header("location: ../publications/index.php");
    exit;
   
  }


  ?>

  <div class="containerR">
    <h2 style="margin-bottom: 40px;">Ajouter une Recette</h2>
    <form action="#" method="post" enctype="multipart/form-data">

      <input type="text" name="nomR" class="form-control" placeholder="nom" required /><br />

      <textarea type="text" name="ingredient" class="form-control" placeholder="ingredient1 | ingredient2 " required></textarea><br />

      <textarea type="text" name="etapes" class="form-control" placeholder="Ajouter toutes les étapes " required></textarea> <br />

      <p class="fontbeautifull">Ajouter photo
        <input class="btnFile" type="file" style="padding:20px; font-size:18px;" name="photo"  />
      </p><br />
      <input type="submit" class="btn btn-primary" value="Ajouter la recette" />
    </form>
  </div> <!-- fin div containerR -->

</body>

</html>