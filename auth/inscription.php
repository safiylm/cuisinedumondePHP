<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/auth.css" />
    <link rel="stylesheet" href="../css/body.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>

<body>
  <?php

  include("../navigation/index.php");

  ?>

  <div class="container">
        <img id="image-left" src="../Photos/auth.jpg" style="max-width:50vw; max-height:100vh" />
    <div id="div-right">

      <h2>Inscription</h2>
      <form action="post-inscription.php" method="post">

        <input type="text" class="form-control" name="nom" placeholder="nom" required />

        <input type="text" class="form-control" name="prenom" placeholder="prenom" required />

        <input type="email" class="form-control" name="email" placeholder="email" required />

        <input type="password" class="form-control" name="mdp" placeholder="password" required />

        <div style='display: block; text-align:center;'>
          <input type="submit" class="btnSubmit" value="S'inscrire" />
        </div>
      </form>

    </div>
  </div>

  <script>
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4 && xhttp.status == 200) {

        var xmlDoc = xhttp.responseXML; //important to use responseXML here
        console.log(xmlDoc)
      }
      xhttp.open("GET", "../recette.xml", true);
      xhttp.send();
    }

    var xmlString = "<root></root>";
    var parser = new DOMParser();
    var xmlDoc = parser.parseFromString(xmlString, "text/xml");
  </script>

</body>

</html>