<!DOCTYPE html>
<?php
session_start();

if (file_exists('../data/recette-utilisateur.xml')) {
  $xml = simplexml_load_file('../data/recette-utilisateur.xml');
} else {
  exit('Failed to open test.xml.');
}

echo $_GET['idCommentaire'];
echo $_GET['idRecette'];

if (!empty($_GET['idCommentaire']) && !empty($_GET['idRecette']) && !empty($_GET['nvcontenu'])) {
  $path = "//commentaire[@id=" . $_GET['idCommentaire'] . "]";

  for ($i = 0; $i < count($xml->liste_commentaires->commentaire); $i++) {

    if ($_SESSION['utilisateur']['email'] == $xml->liste_commentaires->commentaire[$i]->email_utilisateur) {
      $xml->liste_commentaires->commentaire[$i]->contenu  = $_GET['nvcontenu'];
    }
  }

  $xml->asXML();
  $xml->asXML('../data/recette-utilisateur.xml'); ?>
  <script>
    document.location.href = "index.php?idRecette=<?php echo $_GET['idRecette']; ?>"
  </script>

<?php }
?>

<form method="get" action="#">
  <input name="idCommentaire" type="hidden" value="<?php echo $_GET['idCommentaire'];?>">
  <input name="idRecette" type="hidden" value="<?php echo $_GET['idRecette'];?>">
  <textarea name="nvcontenu" class="form-control"></textarea>
  <button type="submit">Modifier son Commentaire</button>
</form>