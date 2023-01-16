<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<?php
  session_start();
?>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">

        <a href="../index.php" class="navbar-brand"> RECETTE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a href="../favoris/index.php" class="nav-link active" aria-current="page">Mes recettes préférées </a>
                </li>
               
                <?php if (!empty($_SESSION['user']['login'])) { ?>
                   
                    <li class="nav-item">
                        <a href="../Publications/index.php" class="nav-link active" aria-current="page"> Mes publications </a>
                    </li>

                    <li class="nav-item">
                        <a href="../ajouter_recette/index.php" class="nav-link active" aria-current="page"> Ajouter une recette </a>
                    </li>

                    <li class="nav-item">
                        <a href="../compte/index.php" class="nav-link active" aria-current="page">Mes données personnelles </a>
                    </li>
                <?php } ?>
                
            

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Compte
                    </a>
                    <ul class="dropdown-menu">
                    <?php if (empty($_SESSION['user']['login'])) { ?>
                        <li><a class="dropdown-item" href="../connexion/index.php">Connexion</a></li>
                        <li><a class="dropdown-item" href="../inscription/index.php">Inscription</a></li>
                    <?php }else{  ?>
                        <li><a class="dropdown-item" href="../deconnexion/index.php"> Deconnexion</a></li>
                    <?php } ?>
                    </ul>
                </li>
            </ul>
           

        </div>

    </div>
</nav>



      
      

     
 
  <!-- Fin de la barre de navigation -->