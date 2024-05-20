
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php" id="nav__title">RECETTE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="../categorie/index.php" >Categorie</a>
        </li>
        <?php if (empty($_SESSION['utilisateur']['email'])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="../favoris/index.php" >Mon carnet</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../auth/connexion.php" >Connexion</a>
        </li>
         <?php } else {  ?>
        <li class="nav-item">
          <a class="nav-link" href="../mon-compte/index.php"  >Mon compte </a>
        </li>
         <?php } ?>
      </ul>
    
    </div>
  </div>
</nav>
