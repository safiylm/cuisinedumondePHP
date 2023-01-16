<?php
  session_start();
  require "../config.php";  


    $nameRecette = $_POST['e'];
    echo $nameRecette;

   if( isset( $nameRecette )){
        $check = $bdd->prepare('DELETE FROM favori WHERE login = ? and nomRecette = ?');
        $check->execute(array($_SESSION['user']['login'], $nameRecette));
        header('Location: index.php');
      }
      
?>