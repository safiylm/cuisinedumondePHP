<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../CSS/ajouter_recette.scss" />
    <link rel="stylesheet" href="../CSS/publication.scss" />
    <link rel="stylesheet" href="../CSS/mon-compte.scss" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mon compte | Cuisine du monde </title>

    <?php

    $json_object = file_get_contents("../data/recette.json");
    $tab = json_decode($json_object, true);
    include('../accueil/recette.php');

    include("../navigation/index.php");

    if (empty($_SESSION['utilisateur']['email'])) {
        header("../auth/connexion.php");
        exit();
    }

    if (file_exists('../data/recette-utilisateur.xml')) {
        $xml = simplexml_load_file('../data/recette-utilisateur.xml');
    } else {
        exit('Failed to open test.xml.');
    }

    ?>

</head>

<body>
    <div class="div-mon-compte">
        <div class="div0">
            <h3>Hello <?php echo $_SESSION['utilisateur']['prenom']; ?></h3>

            <div class="div-menu-horizontale">
                <button id="mon-carnet-btn"> Mon Carnet</button>
                <button id="mes-recettes-btn"> Mes recettes</button>
                <button id="mes-donnees-personnelles-btn"> Mes données personnelles </button>
                <button id="deposer-recette-btn"> Déposer une recette </button>
                <button onclick="sedeconnecter()"> Se déconnecter </button>
            </div>
        </div>
        <div class="div1">

            <div class="div1-left">

                <div id="mes-recettes-contenu">
                    <?php include('publications/partial.php'); 
                    ?>
                </div>

                <div id="mon-carnet-contenu">
                    <?php include('../mon-carnet/partial.php'); ?>
                </div>

                <div id="mes-donnees-personnelles-contenu">
                    <?php include('donnees-personnelles/partial.php'); ?>
                </div>

                <div id="deposer-recette-contenu">
                    ajouter une nouvelle recette
                    <?php // include('../ajouter-recette/index.php'); 
                    ?>

                </div>


            </div>

            <div class="div1-right">
                ME
            </div>
        </div>

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
            document.location.href = "../auth/deconnexion/index.php"
        }
    </script>

</body>

</html>