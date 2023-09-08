
<?php
session_start();

if (!isset($_SESSION['favori']))
    $_SESSION['favori'] = array();

$doublon = false;


foreach ($_SESSION['favori'] as $item) {
    if ($item == htmlspecialchars($_GET['idRecette']))
        $doublon = true;
}

//on ajoute les recettes enregistrés dans les variables de sessions 
if ($doublon == false && !empty($_GET['idRecette']))
    array_push($_SESSION['favori'], htmlspecialchars($_GET['idRecette']));


if ($doublon == true && !empty($_GET['idRecette'])) {
    for ($i = 0; $i < sizeof($_SESSION['favori']); $i++) {
        if ($_SESSION['favori'][$i] === $_GET['idRecette']) {
            array_splice($_SESSION['favori'], $i, 1);
        }
    }
}


header('Location: ../mon-carnet/index.php');


?>