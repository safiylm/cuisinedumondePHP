
<div class="container-donnees-personnelles">
 
    <h2 id="titreDataUpdate">Modifier ses données personelles</h2>
    
    <form action="donnees-personnelles/post-modification.php" method="post">

        <input type="text" class="form-control" name="nom" value="<?php echo $nom; ?>" /><br />

        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" /><br />

        <!-- <input type="password" class="form-control" name="password" placeholder="*" required /><br /> -->

        <input type="submit" id="EnregistrerUpdate" value="Enregistrer les modifications" class="btn btn-primary" />
    <button type="button" id="annuler" class="btn btn-light"> Annuler </button>

    </form>
    <button id="modifier" class="btn btn-primary"> Modifier </button> 


</div>

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

    /* body {
        background-color: #f7cac9 !important;
    } */


    .container-donnees-personnelles {
        padding: 30px;
        border-radius: 5%;
        margin-top: 15px;
        margin-left: auto;
        margin-right: auto;
        max-width: 600px;
        margin-bottom: 70px;
    }

    .container-donnees-personnelles button, .container-donnees-personnelles input{
        width: 600px;
    } 
</style>