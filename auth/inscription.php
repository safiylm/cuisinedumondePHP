<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Inscription</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../connexion/co.css" />
</head>

<body>
  <?php

  include("../Navigation/index.php");

?>

  <div class="container">
    <h2>Inscription</h2><br>
    <form action="post-inscription.php" method="post">

      <input type="text" class="form-control" name="nom" placeholder="nom" required /><br />

      <input type="email" class="form-control" name="email" placeholder="email" required /><br />

      <input type="password" class="form-control" name="mdp" placeholder="password" required /><br />
      <br>
      <div style='display: block; text-align:center;'>
        <input type="submit" class="btn btn-light" value="S'inscrire" />
      </div>
    </form>

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