
<?php
session_start();
?>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href='../css/nav.css' />

<!-- Top Navigation Menu -->
<div class="topnav">
      <a href="../index.php" id="nav__title" class="active" > RECETTE</a>

  <!-- Navigation links (hidden by default) -->
  <div id="myLinks">
          <a class="nav-link" href="../categorie/index.php" >Categorie</a>

     <?php if (empty($_SESSION['utilisateur']['email'])) { ?>
          <a class="nav-link" href="../mon-carnet/index.php" >Mon carnet</a>
          <a class="nav-link" href="../auth/connexion.php" >Connexion</a>
       <?php } else {  ?>
          <a class="nav-link" href="../mon-compte/index.php"  >Mon compte </a>
      <?php } ?>

  </div>
  <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<script>

function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
} 
</script>