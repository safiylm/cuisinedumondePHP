<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<link rel="stylesheet" href='../css/nav.css'>

<?php
session_start();


?>
<nav>

    <a href="../index.php" class="nav__title"> RECETTE</a>

    <div> 
    <a href="../categorie/index.php" class="nav__link" aria-current="page">Categorie </a>
        
    <?php if (empty($_SESSION['utilisateur']['email'])) { ?>

            <a href="../mon-carnet/index.php" class="nav__link" aria-current="page">Mon carnet</a>

            <a class="nav__link" href="../auth/connexion.php">Connexion</a>

        <?php } else {  ?>

            <a href="../mon-compte/index.php" class="nav__link">Mon compte </a>

        <?php } ?>
    </div>
</nav>

