<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="../CSS/ajouter_recette.css" />

<?php


include("../navigation/index.php");
// Connexion à la base de données
require "../data/config.php";
$sql = "Select * from utilisateur where email= '" . $_SESSION['utilisateur']['email'] . "'";
if ($result = $mysqli->query($sql)->fetch_row()) {

    $nom = $result[1];
    $email = $result[2];
    $password = $result[3];
}
?>



<style>
    body {
        background-color: white !important;
        height: 100%;
    }

    .div-img-nom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 550px;
    }

    .div-img-nom h1 {
        text-transform: capitalize;
    }

    #image_utilisateur {
        margin: 50px auto;
        border-radius: 50%;
    }

    .centrer {
        display: block;
        flex-direction: column;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .menu-bar {
        margin-left: auto;
        margin-right: auto;
        
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        width: 80%;
        border-bottom: 1px solid lightgray;
        padding: 10px;
    }

    .menu-bar button {
        border: none;
        background-color: transparent;
    }

    #mon-carnet-contenu{
        width: 85%;
    }
    
</style>


<body>
    <div class="centrer">
        <div class='div-img-nom'>
            <img id="image_utilisateur" src="../Photos/personne.png" width="150px" height="auto;" />&nbsp &nbsp &nbsp &nbsp
            <h1> <?php echo $nom; ?></h1>
        </div>
        <div class="menu-bar">
            <button id="mon-carnet-btn"> Mon Carnet</button>
            <button id="mes-recettes-btn"> Mes recettes</button>
            <button id="mes-donnees-personnelles-btn"> Mes données personnelles </button>
            <button id="deposer-recette-btn"> Déposer une recette </button>
            <button onclick="sedeconnecter()"> Se déconnecter </button>


        </div>
        <div id="mes-recettes-contenu">
            <?php include('publications/index.php'); ?> </div>

        <div id="mon-carnet-contenu">
            <?php include('../mon-carnet/index.php'); ?> </div>

    </div>

    <div id="mes-donnees-personnelles-contenu">
        <?php include('donnees-personnelles/index.php'); ?>
    </div>

    <div id="deposer-recette-contenu">
        <?php include('../ajouter-recette/index.php'); ?>

    </div>
    </div>

    <script>
        $('#mes-donnees-personnelles-contenu').hide()
        $('#deposer-recette-contenu').hide()
        $('#mes-recettes-contenu').hide()

        $('#mes-recettes-btn').click(function() {
            $('#mes-recettes-contenu').show()
            $('#mes-donnees-personnelles-contenu').hide()
            $('#deposer-recette-contenu').hide()
            $('#mon-carnet-contenu').hide()
        })
        $('#mes-donnees-personnelles-btn').click(function() {
            $('#mes-recettes-contenu').hide()
            $('#mes-donnees-personnelles-contenu').show()
            $('#mon-carnet-contenu').hide()
            $('#deposer-recette-contenu').hide()
        })
        $('#deposer-recette-btn').click(function() {
            $('#mes-recettes-contenu').hide()
            $('#mes-donnees-personnelles-contenu').hide()
            $('#mon-carnet-contenu').hide()
            $('#deposer-recette-contenu').show()
        })
        $('#mon-carnet-btn').click(function() {
            $('#mes-recettes-contenu').hide()
            $('#mes-donnees-personnelles-contenu').hide()
            $('#mon-carnet-contenu').show()
            $('#deposer-recette-contenu').hide()
        })


        function sedeconnecter() {
            document.location.href = "../deconnexion/index.php"

        }
    </script>
</body>