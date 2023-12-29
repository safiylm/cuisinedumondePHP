<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/body.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css/auth.css" />

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
            <h2>Login</h2>
            <form action="post-connexion.php" method="post">

                <input type="text" class="form-control" name="email" placeholder="email" required />

                <input type="password" class="form-control" name="mdp" placeholder="mot de passe" required />
            
                <div id="div-btn-submit-go-for-inscription">
                    <input class="btnSubmit" type="submit" value="Se connecter " />
                    <a href='inscription.php'> S'inscrire </a>
                    <a href='mot-de-passe-oublie/index.php'> Mot de passe oublié ?  </a>
                </div>

                <div class="info">
                    <?php if($_GET['erreur']=="password"){
                        echo "<p>Votre mot de passe est incorrecte.</p>";
                    }
                    else if ($_GET['erreur']=="email"){
                        echo "<p>Votre adresse e-mail est incorrecte.</p>";
                    }
                    else if ($_GET['erreur']=="emailpassword"){
                        echo "<p>Votre adresse e-mail et votre mot de passe sont incorrectes.</p>";
                    }
                    
                    ?>
                </div>

            </form>

        </div>


    </div> 


</body>

</html>