<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="../../css/auth.css" />
    <?php
    session_start(); 
    include("../../shared/header.php");
    ?>
 
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
  <?php
    include("../../shared/navigation.php");
  ?>

    <div class="container">
        <img id="image-left" src="../../Photos/auth.jpg" style="max-width:50vw; max-height:100vh" />

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