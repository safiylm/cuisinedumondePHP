<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script><?php
                                                                                        session_start();
                                                                                        include("../navigation/index.php");
                                                                                        // Connexion à la base de données
                                                                                        require "../config.php";
                                                                                        ?>

<?php
$req2 = $bdd->prepare('Select * from utilisateur  WHERE login = ?');
$req2->execute(array($_SESSION['user']['login']));
$data = $req2->fetch();
$row = $req2->rowCount();

if ($row > 0) {
    $_SESSION['user']['login'] = $data['login'];
    $_SESSION['user']['password'] = $data['password'];
    $_SESSION['user']['nom'] = $data['nom'];
    $_SESSION['user']['email'] = $data['email'];
}

if (!empty($_POST['login']) && !empty($_POST['email'])) {
    $req = $bdd->prepare('UPDATE utilisateur SET nom = ?, email=? WHERE login = ?');
    $req->execute(array(
        $_POST['nom'],
        $_POST['email'],
        $_SESSION['user']['login']
    ));


    //go to user data page 
    header('Location: index.php');
    exit();
}



?>

<div class="container">
    <h2 id="titreData"> Données personelles</h2>
    <h2 id="titreDataUpdate">Modifier ses données personelles</h2>
    <form action="#" method="post">

        <input type="text" class="form-control" name="nom" value="<?php echo $_SESSION['user']['nom']; ?>" /><br />

        <input type="text" class="form-control" name="login" value="<?php echo $_SESSION['user']['login']; ?>" required /><br />

        <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['user']['email']; ?>" /><br />

        <input type="password" class="form-control" name="password" value="<?php echo $_SESSION['user']['mdp']; ?>" required /><br />

        <input type="submit" id="EnregistrerUpdate" value="Enregistrer les modifications" class="btn btn-primary" />
    </form>
    <button id="modifier" value="Modifier" class="btn btn-primary"> Modifier </button>

</div>

<script>
    $("input").prop('disabled', true);
    $("#recherche").prop('disabled', false);

    $("#EnregistrerUpdate").hide();
    $("#titreDataUpdate").hide();

    $("#modifier").click(() => {
        $("input").prop('disabled', false);
        $("#EnregistrerUpdate").show();
        $("#titreDataUpdate").show();
        $("#modifier").hide();
        $("#titreData").hide();
    })
</script>


<style>
    h2 {
        margin-bottom: 30px;
    }

    body {
        background-image: url("../Photos/violet.png");
        max-width: 100%;
        background-repeat: no-repeat, repeat;
        background-size: 100%;
    }


    .container {
        padding: 60px;
        border-radius: 5%;
        margin-top: 150px;
        margin-left: auto;
        margin-right: auto;
        max-width: 500px;
        background-color: #fff;
    }
</style>