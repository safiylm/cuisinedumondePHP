<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/ajouter_recette.scss" />
    <link rel="stylesheet" href="../css/publication.scss" />
    <link rel="stylesheet" href="../css/mon-compte.scss" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mon compte | Cuisine du monde </title>
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/body.css" />
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

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
                <button id="mon-carnet-btn"> Mon Carnet de recettes favorites </button>
                <button id="mes-recettes-btn"> Mes recettes</button>
                <button id="mes-donnees-personnelles-btn"> Mes données personnelles </button>
                <button onclick="goAddRespice()" id="deposer-recette-btn"> Déposer une recette </button>
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
                <img src='../Photos/personne.png'  />
            </div>
        </div>

    </div>

    </div>

    <script>
        $('#mes-donnees-personnelles-contenu').hide()
        $('#deposer-recette-contenu').hide()
        $('#mes-recettes-contenu').hide()
        $("#mon-carnet-btn").css({
            'color': "pink"
        });
       
        $("#mes-recettes-btn").css({
            'color': "white"
        });
        $("#mes-donnees-personnelles-btn").css({
            'color': "white"
        });
        $("#deposer-recette-btn").css({
            'color': "white"
        });

        $('#mes-recettes-btn').click(function() {
            $('#mes-recettes-contenu').show()
            $('#mes-donnees-personnelles-contenu').hide()
            $('#deposer-recette-contenu').hide()
            $('#mon-carnet-contenu').hide()
            $("#mes-recettes-btn").css({
                'color': "pink"
            });

            $("#mon-carnet-btn").css({
                'color': "white"
            });
           
            $("#mes-donnees-personnelles-btn").css({
                'color': "white"
            });
            $("#deposer-recette-btn").css({
                'color': "white"
            });


        })
        $('#mes-donnees-personnelles-btn').click(function() {
            $('#mes-recettes-contenu').hide()
            $('#mes-donnees-personnelles-contenu').show()
            $('#mon-carnet-contenu').hide()
            $('#deposer-recette-contenu').hide()
            $("#mes-donnees-personnelles-btn").css({
                'color': "pink"
            });
            $("#mon-carnet-btn").css({
                'color': "white"
            });
            $("#mes-recettes-btn").css({
                'color': "white"
            });
          
            $("#deposer-recette-btn").css({
                'color': "white"
            });


        })
        $('#deposer-recette-btn').click(function() {
            $('#mes-recettes-contenu').hide()
            $('#mes-donnees-personnelles-contenu').hide()
            $('#mon-carnet-contenu').hide()
            $('#deposer-recette-contenu').show()
            $("#mon-carnet-btn").css({
                'color': "pink"
            });
          
            $("#mes-recettes-btn").css({
                'color': "white"
            });
            $("#mes-donnees-personnelles-btn").css({
                'color': "white"
            });
            $("#deposer-recette-btn").css({
                'color': "white"
            });

        })
        $('#mon-carnet-btn').click(function() {
            $('#mes-recettes-contenu').hide()
            $('#mes-donnees-personnelles-contenu').hide()
            $('#mon-carnet-contenu').show()
            $('#deposer-recette-contenu').hide()
            $("#mon-carnet-btn").css({
                'color': "pink"
            });
          
            $("#mes-recettes-btn").css({
                'color': "white"
            });
            $("#mes-donnees-personnelles-btn").css({
                'color': "white"
            });
            $("#deposer-recette-btn").css({
                'color': "white"
            });
        })


        function sedeconnecter() {
            document.location.href = "../auth/deconnexion/index.php"
        }

        function goAddRespice(){
            document.location.href = "../ajouter-recette/index.php"
        }
    </script>

</body>

</html>