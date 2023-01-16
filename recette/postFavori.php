
<?php
 session_start();
 require "../config.php";  
if(!isset($_SESSION['favori']))
 $_SESSION['favori']= array();


if (isset($_POST['titre'])) {
    $checkf = $bdd->prepare('SELECT * FROM favori WHERE login = ? and nomRecette = ?');
    $checkf->execute(array($_SESSION['user']['login'], $_POST['titre']));
    $dataf = $checkf->fetch();
    $rowf = $checkf->rowCount();

    if ($rowf <= 0) {

        $req = $bdd->prepare('INSERT INTO favori (login, nomRecette) VALUES( ?,?)');
        $req->execute(array($_SESSION['user']['login'], $_POST['titre']));
    }
}



$doublon = false;
foreach($_SESSION['favori'] as $item){
    if($item== htmlspecialchars($_POST['titre']) )
    $doublon=true;
}
if($doublon == false)
array_push($_SESSION['favori'] , htmlspecialchars($_POST['titre']) );


header('Location: ../favoris/index.php');


?>