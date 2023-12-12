<!DOCTYPE html>
<?php
session_start();

if (file_exists('../data/recette-utilisateur.xml')) {
    $xml = simplexml_load_file('../data/recette-utilisateur.xml');
} else {
    exit('Failed to open test.xml.');
}


if (!empty($_GET['idCommentaire']) && !empty($_GET['idRecette'])) {
    $path = "//commentaire[@id=" . $_GET['idCommentaire'] . "]";

    if (count($xml->xpath($path)) == 1) {
        foreach ($xml->xpath($path) as $var) {
            unset($var[0]);
        }
    }
}

$xml->asXML();
$xml->asXML('../data/recette-utilisateur.xml');

?>
<script>
    document.location.href = "index.php?idRecette=<?php echo $_GET['idRecette']; ?>"
</script>