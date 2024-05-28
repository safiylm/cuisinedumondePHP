<?php 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/ajouter_recette.css" />
    <link rel="stylesheet" href="../css/publication.css" />
    <link rel="stylesheet" href="../css/mon-compte.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title> Mon compte | Cuisine du monde </title>

    <?php 
    include("../shared/header.php"); 
    
    $json_object = file_get_contents("../data/recette.json");
    $tab = json_decode($json_object, true);

    if (file_exists('../data/recette-utilisateur.xml')) {
        $xml = simplexml_load_file('../data/recette-utilisateur.xml');
    } else {
        exit('Failed to open test.xml.');
    }
    ?>

</head>

<body>
    <?php
    include("../shared/navigation.php");
    include("../shared/getallrecettes.php");
    include("../shared/favorisfunction.php");

    ?>
    <div class="div-mon-compte">

        <div class="div-mon-compte-main">

            <div id="mes-recettes-contenu">
                <h1>Mes recettes</h1>
                    <?php getMyAllRespices($tab, $_SESSION['utilisateur']['id'], $xml); ?>
            </div>

            <div id="mon-carnet-contenu">
                <?php include('../favoris/partial.php'); ?>
            </div>

            <div id="mes-donnees-personnelles-contenu">
                <?php include('user-edit/partial.php'); ?>
            </div>

            <div id="deposer-recette-contenu">
                <?php include('recette-add/index.php');
                ?>
            </div>

        </div>

        <div class="div-mon-compte-sommaire d-flex flex-column align-items-center flex-wrap justify-content-center">
            <img src='../Photos/personne.png' />
            <h3>Hello <?php echo $_SESSION['utilisateur']['prenom']; ?></h3>

            <div class="btn-group-vertical">
                <a class="btn btn-primary" id="favoris-btn" href='#favoris'> Mes favoris </a>
                <a class="btn btn-primary" id="mes-recettes-btn" href='#mesrecettes'> Mes recettes</a>
                <a class="btn btn-primary" id="mes-donnees-personnelles-btn" href='#donneespersonnelles'> Mes données personnelles </a>
                <a class="btn btn-primary" id="deposer-recette-btn"  href='#addrecette'> Déposer une recette </a>
                <button class="btn btn-primary" onclick="sedeconnecter()"> Se déconnecter </button>
            </div>
        </div>


    </div>

    </div>

    <script>
    
    const queryString = document.location.href ;
    console.log(document.location.href )

        function displayFavoris(){
            $('#mes-donnees-personnelles-contenu').hide()
            $('#deposer-recette-contenu').hide()
            $('#mes-recettes-contenu').hide()
            $('#mon-carnet-contenu').show()
        }

        function displayRecettes(){
            $('#mes-recettes-contenu').show()
            $('#mes-donnees-personnelles-contenu').hide()
            $('#deposer-recette-contenu').hide()
            $('#mon-carnet-contenu').hide()
        }
        
        function displayDonneesPersonnelles(){
            $('#mes-recettes-contenu').hide()
            $('#mes-donnees-personnelles-contenu').show()
            $('#mon-carnet-contenu').hide()
            $('#deposer-recette-contenu').hide()
        }

        function displayAddRecette(){
             $('#mes-recettes-contenu').hide()
            $('#mes-donnees-personnelles-contenu').hide()
            $('#mon-carnet-contenu').hide()
            $('#deposer-recette-contenu').show()
        }
        
        displayRecettes();
        
        $('#mes-recettes-btn').click(function() {
           displayRecettes();
        })
  
        $('#mes-donnees-personnelles-btn').click(function() {
           displayDonneesPersonnelles()
        })
  
        $('#deposer-recette-btn').click(function() {
           displayAddRecette()
        })

        $('#favoris-btn').click(function() {
            displayFavoris()
        })
        
        
        
        if( queryString.indexOf("#favoris") !== -1)
        {
            displayFavoris()
        }
     
        if( queryString.indexOf("#mesrecettes")!== -1)
        { 
            displayRecettes();
        }
        
        if( queryString.indexOf("#addrecette")!== -1)
        { 
           displayAddRecette()
        }
        
        if( queryString.indexOf("#donneespersonnelles")!== -1)
        {
            console.log('dta')
           displayDonneesPersonnelles()
        }

        function sedeconnecter() {
            document.location.href = "../auth/deconnexion/index.php"
        }
    </script>

</body>

</html>