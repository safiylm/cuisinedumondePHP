<?php

if (file_exists('../data/recette-utilisateur.xml')) {
    $xml = simplexml_load_file('../data/recette-utilisateur.xml');
} else {
    exit('Failed to open test.xml.');
}

$path = "//utilisateur[ email ='" . $_SESSION['utilisateur']['email'] . "' ]";
if (count($xml->xpath($path)) == 1) {
    foreach ($xml->xpath($path) as $item) { ?>
        <div class="container-donnees-personnelles">

            <h2 id="titreDataUpdate">Modifier ses données personelles</h2>

            <form action="donnees-personnelles/post-edit-name.php" method="post" id="form-edit-name">

                <input type="text" class="form-control" name="nom" value="<?php echo $item->nom[0]->__toString(); ?>" /><br />
                <input type="text" class="form-control" name="prenom" value="<?php echo $item->prenom[0]->__toString(); ?>" /><br />

                <input type="submit" id="EnregistrerUpdate" value="Enregistrer les modifications" class="btn btn-primary" />
                <button type="button" id="annuler" class="btn btn-light"> Annuler </button>

            </form>
            <button id="modifier" class="btn btn-primary"> Modifier </button>


        </div>

        <div class="container-donnees-personnelles">
            <h2 id="titreDataUpdate">Modifier son email</h2>
            <form action="donnees-personnelles/post-edit-email.php" method="post">
                <label>Entrez votre nouvelle adresse email. Un mail de confirmation vous sera envoyer.
                    Lorsque vous l'aurez confirmé, votre adresse email sera modifié.
                </label>
                <input type="email" name="email" class="form-control" />
                <button type="submit" class="btn btn-primary">Modifier votre email</button>
            </form>
        </div>

        <?php include("edit-password.php"); ?>

        <div class="container-donnees-personnelles">
            <button onclick="deleteAccount()" class="btn btn-danger" style="margin: 15px 0; background-color: crismon;"> Supprimer le compte </button>

        </div>

<?php  }
}
?>

<script>
    function deleteAccount() {
        if (confirm("Etes-vous sûre de vouloir supprimer votre compte ?") == true) {
            document.location.href = "donnees-personnelles/post-delete.php";
        }
    }
</script>


<script>
    $("#form-edit-name input").prop('disabled', true);
    $("#recherche").prop('disabled', false);
    $("#annuler").hide();
    $("#EnregistrerUpdate").hide();
    $("#titreDataUpdate").hide();


    $("#modifier").click(() => {
        $("#form-edit-name input").prop('disabled', false);
        $("#EnregistrerUpdate").show();
        $("#titreDataUpdate").show();
        $("#modifier").hide();
        $("#annuler").css('display', "inline");
        $("#EnregistrerUpdate").css('display', "inline");
        $("#annuler").show();
    })

    $("#annuler").click(() => {
        $("#form-edit-name input").prop('disabled', true);
        $("#recherche").prop('disabled', false);
        $("#annuler").hide();
        $("#EnregistrerUpdate").hide();
        $("#titreDataUpdate").hide();
        $("#modifier").show();

    })

    </script>



 
<style>
    .container-donnees-personnelles {
              padding: 30px;
        box-sizing: border-box;
        border-radius: 5%;
        margin-top: 15px;
        margin-left: auto;
        margin-right: auto;
        max-width: 600px;
        margin-bottom: 70px;
    }
        .container-donnees-personnelles   h2 {
            margin-bottom: 20px;
            color: darkslategrey;
        }

        .container-donnees-personnelles button,
            .container-donnees-personnelles input {
            width: 100%;
            outline: none !important;
        }

    



    @media screen and (max-device-width: 900px) {
        .container-donnees-personnelles {
            width: 90vw;
            padding: 10px;
           
        }

        .container-donnees-personnelles button,
        .container-donnees-personnelles input {
                width: 100%;
            }
    }

</style>