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

            <form action="donnees-personnelles/post-modification.php" method="post">

                <input type="text" class="form-control" name="nom" value="<?php echo $item->nom[0]->__toString(); ?>" /><br />
                <input type="text" class="form-control" name="prenom" value="<?php echo $item->prenom[0]->__toString(); ?>" /><br />

                <input type="submit" id="EnregistrerUpdate" value="Enregistrer les modifications" class="btn btn-primary" />
                <button type="button" id="annuler" class="btn btn-light"> Annuler </button>

            </form>
            <button id="modifier" class="btn btn-primary" style="background-color:#2c395d;"> Modifier </button>

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
    $("input").prop('disabled', true);
    $("#recherche").prop('disabled', false);
    $("#annuler").hide();
    $("#EnregistrerUpdate").hide();
    $("#titreDataUpdate").hide();


    $("#modifier").click(() => {
        $("input").prop('disabled', false);
        $("#EnregistrerUpdate").show();
        $("#titreDataUpdate").show();
        $("#modifier").hide();
        $("#annuler").css('display', "inline");
        $("#EnregistrerUpdate").css('display', "inline");
        $("#annuler").show();
    })

    $("#annuler").click(() => {
        $("input").prop('disabled', true);
        $("#recherche").prop('disabled', false);
        $("#annuler").hide();
        $("#EnregistrerUpdate").hide();
        $("#titreDataUpdate").hide();
        $("#modifier").show();

    })
</script>


<style>
    h2 {
        margin-bottom: 20px;
    }


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

    .container-donnees-personnelles button,
    .container-donnees-personnelles input {
        width: 100%;
    }

    @media screen and (max-device-width: 900px) {
        .container-donnees-personnelles {
            width: 100vw;
        }

        .container-donnees-personnelles button,
        .container-donnees-personnelles input {
            width: 100%;
        }
    }
</style>