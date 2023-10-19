<!DOCTYPE html>
<?php
session_start();

if (file_exists('../data/recette-utilisateur.xml')) {
    $xml = simplexml_load_file('../data/recette-utilisateur.xml');
} else {
    exit('Failed to open test.xml.');
}


$idRecette = $_POST['idRecette'];
$email = $_SESSION['utilisateur']["email"];
$contenu = $_POST["contenu"];

if (!empty($idRecette) && !empty($email) && !empty($contenu)) {

    // on ajoute la recette dans le carnet de recette

    $var = $xml->liste_commentaires->addChild('commentaire');
    $cpt = count($xml->liste_commentaires->children());
    $var->addAttribute('id', $cpt);
    $var->addChild('email_utilisateur', $email);
    $var->addChild('id_recette', $idRecette);
    $var->addChild('contenu', $contenu);


    $xml->asXML();
    $xml->saveXML("../data/recette-utilisateur.xml");

}
?>

<script>
    document.location.href= "index.php?idRecette=<?php echo $idRecette; ?>"
</script>