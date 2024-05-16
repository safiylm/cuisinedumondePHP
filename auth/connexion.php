<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Connexion</title>
     <link rel="stylesheet" href="../css/auth.css" />
    
    <?php
    session_start(); 
    include("../shared/header.php");
    ?>
  
</head>

<body> <?php include("../shared/navigation.php"); ?>

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
                
                 <?php if(!empty($_GET['erreur'] )){?>

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
  <?php }  ?>
            </form>

        </div>


    </div> 


</body>

</html>