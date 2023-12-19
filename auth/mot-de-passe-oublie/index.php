<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublié</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
    <link rel="stylesheet" href="../../CSS/body.css" />
    <link rel="stylesheet" href="../../CSS/auth.scss" />
    <link rel="stylesheet" href="../../CSS/nav.css" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head> 

<?php
include('../../sendmail.php');

if(!empty($_POST['email'])){

    $emailhash=password_hash($_POST['email'],  PASSWORD_BCRYPT);

    $subjet = "Réinitialiser votre mot de passe";
    $contenuMail = "Réinitialiser son mot de passe, sur ce lien <br/> http://localhost/auth/mot-de-passe-oublie/edit.php?e=".$emailhash;
    $altbody = "Réinitialiser votre mot de passe";
    sendmail("safinazylm@gmail.com", $subjet, $contenuMail, $altbody);
}
?>

<body>

<nav>

    <a href="../../index.php" class="nav__title"> RECETTE</a>

    <div> 
    <a href="../../categorie/index.php" class="nav__link" aria-current="page">Categorie </a>
        
    <?php if (empty($_SESSION['utilisateur']['email'])) { ?>

            <a href="../../mon-carnet/index.php" class="nav__link" aria-current="page">Mon carnet</a>

            <a class="nav__link" href="../../auth/connexion.php">Connexion</a>

        <?php } else {  ?>

            <a href="../../mon-compte/index.php" class="nav__link">Mon compte </a>

        <?php } ?>
    </div>
</nav>
    <div class="container">
        <img id="image-left" src="../../Photos/auth.jpg" />
        <div id="div-right">
            <h2>Login</h2>
            <form action="#" method="post" style="padding:30px;">
                <label >Entrez votre email, un email vous sera envoyer pour que vous puissiez réinitialiser votre mot de passe.</label>
                <input name="email" class="form-control" placeholder="Saisissez votre email*" style="display:block; width:100%; max-width:none; font-size:16.5px;"/>
                <button class="btnSubmit" type="submit">Envoyer </button>
            </form>

        </div>
    </div>

</body>

</html>