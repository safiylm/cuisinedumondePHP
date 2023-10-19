
<?php
 session_start();

 $nbetoile = $_GET["nbetoile"];
 $idRecette = $_GET["idRecette"];

 if (file_exists('../data/recette-utilisateur.xml')) {
     $xml = simplexml_load_file('../data/recette-utilisateur.xml');
} else {
     exit('Failed to open test.xml.');
 }

  $path = "//note_etoile[email_utilisateur ='" . $_SESSION['utilisateur']['email'] . "' and id_recette=" . $idRecette . "]";
echo $path;
// // // on ajoute la recette dans le carnet de recette
  if (count($xml->xpath($path)) == 0) {
  
      $var = $xml->liste_note_etoile->addChild('note_etoile');
      $cpt = count($xml->liste_note_etoile->children());
      $var->addAttribute('id', $cpt);
      $var->addChild('email_utilisateur', $_SESSION['utilisateur']['email']);
      $var->addChild('id_recette', $idRecette);
      $var->addChild('nbetoile', $nbetoile);

  } 

  $xml->asXML();
  $xml->saveXML("../data/recette-utilisateur.xml");

?> 

<script>
    document.location.href= "index.php?idRecette=<?php echo $idRecette; ?>"
</script>