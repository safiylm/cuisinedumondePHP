<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Catégorie </title>
    <link rel="stylesheet" href='../css/publication.css'>
    <link rel="stylesheet" href='../css/home.css'>
    <link rel="stylesheet" href='../css/nav.css'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Work+Sans&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</head>

<?php
session_start();
$json_object = file_get_contents("../data/recette.json");
$tab = json_decode($json_object, true);
echo "<script>var tabjson = $json_object </script>";

if (file_exists('../data/recette-utilisateur.xml')) {
    $xml = simplexml_load_file('../data/recette-utilisateur.xml');
} else {
    exit('Failed to open test.xml.');
}
?>



<body>

    <?php include("../Navigation/index.php"); ?>


    <div class="main">

        <h1 style='text-align:center;'><?php echo $_GET['nom']; ?></h1>

        <div class="flex-container">
            <script>
              
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const nom = urlParams.get('nom')
                var result_pays = tabjson.sitecuisine.liste_recette.recette.filter(value => value.pays === pays).length;

                if (result_pays == 0 ) {
                    document.write(' Aucun résultat  ')
                }
            </script>

            <?php


            for ($i = 0; $i < count($tab["sitecuisine"]["liste_recette"]['recette']); $i++) {

                $recette = $tab["sitecuisine"]["liste_recette"]['recette'][$i];
               
                if ($recette["pays"] == $_GET['nom']) {
                    $photoo = $recette["image"];
                    $url = '../Photos/' . $photoo; ?>

                    <div class="flex-item">
                        <div class="element">
                            <div class="div-img">

                                <?php if (is_file($url)) { ?>
                                    <img src='../Photos/<?php echo $photoo; ?>' class="img-thumbnail" />
                                <?php  } else { ?>
                                    <img src='<?php echo  $photoo; ?>' class="img-thumbnail" />
                                <?php } ?>
                            </div>

                            <div class="div-titre">
                                <a class="a-titre" href='../Recette/index.php?idRecette=<?php echo $i; ?>'>
                                    <?php echo $recette['titre']; ?>
                                </a>
                                <?php if (!empty($_SESSION['utilisateur']['email'])) {

                                    $url = "../mon-carnet/mon-carnet-xml.php?idRecette=" . $i;

                                    $path = "//enregistrement[email_utilisateur ='" . $_SESSION['utilisateur']['email'] . "' and id_recette=" . $i . "]";
                                    if (count($xml->xpath($path)) == 0) {
                                        $photo = '../Photos/suit-heart.svg';
                                    } else {
                                        $photo = '../Photos/suit-heart-fill.svg';
                                    } ?>



                                <?php } else {
                                    $url = "../mon-carnet/mon-carnet-session.php?idRecette=" . $i;
                                    if (empty($_SESSION['favori'])) {
                                        $photo = '../Photos/suit-heart.svg';
                                    } else {
                                        $photo = '../Photos/suit-heart.svg';

                                        foreach ($_SESSION['favori'] as $item) {
                                            if ($item == htmlspecialchars($i))
                                                $photo = '../Photos/suit-heart-fill.svg';
                                        }
                                    }
                                } ?>

                                <a href="<?php echo $url; ?>" id="btn-trash">
                                    <img src="<?php echo $photo; ?>"></a>
                            </div>
                        </div>
                    </div>
               <?php 
                }
            } // fin foreach recette 

            ?>
        </div>

    </div>



</body>