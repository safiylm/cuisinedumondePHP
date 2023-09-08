<?php

require "../config.php";


if (!empty($_POST['titre0'])) {
    $Titre0 = $_POST['titre0'];
    $url = 'Location: index.php?titreRecette=' . $Titre0;



    if (!empty($_POST['titre']) && trim($_POST['titre']) != '') {
        $nvTitre = $_POST['titre'];
        echo $nvTitre;
        $req2 = $bdd->prepare('UPDATE recette SET nomRecette = ? WHERE nomRecette = ?');
        $req2->execute(array($nvTitre, $Titre0));
        $row2 = $req2->rowCount();
        $url = 'Location: index.php?titreRecette=' . $nvTitre;
        $Titre  = $nvTitre;
    }

    if (!empty($_POST['ingredients'])) {
        $nvIngr = $_POST['ingredients'];
        echo $nvIngr . '</br>';
        $req2 = $bdd->prepare('UPDATE recette SET ingredients = ? WHERE nomRecette = ?');
        $req2->execute(array($nvIngr, $Titre));
        $row2 = $req2->rowCount();
    }

    if (!empty($_POST['etapes'])) {
        $nvEtape1 = $_POST['etapes'];
        echo  $nvEtape1 . '</br>';
        $req2 = $bdd->prepare('UPDATE recette SET etapes = ? WHERE nomRecette = ?');
        $req2->execute(array($nvEtape1, $Titre));
        $row2 = $req2->rowCount();
    }

    
} else {
    header('Location: ../index.php');
}
header($url);

