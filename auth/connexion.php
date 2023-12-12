<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
    <link rel="stylesheet" href="../CSS/body.css" />
    <link rel="stylesheet" href="../CSS/auth.scss" />
</head>

<?php

include("../Navigation/index.php");
?>



<body>
    <div class="container">
        <img id="image-left" src="../Photos/auth.jpg" />
        <div id="div-right">
            <h2>Login</h2>
            <form action="post-connexion.php" method="post">

                <input type="text" class="form-control" name="email" placeholder="email" required />

                <input type="password" class="form-control" name="mdp" placeholder="mot de passe" required />
            
                <div id="div-btn-submit-go-for-inscription">
                    <input class="btnSubmit" type="submit" value="Se connecter " />
                    <a href='inscription.php'> S'inscrire </a>
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


    </div> <!-- fin div containerC -->
</body>

</html>