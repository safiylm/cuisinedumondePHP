
<?php

      
if(isset($_POST['like_session'])) { 
    like_session($_POST['like_session']);
} 

if(isset($_POST['dislike_session'])) { 
    dislike_session($_POST['dislike_session']);
} 


function isLikedSession($id){
    $doublon = false;
    foreach ($_SESSION['favori'] as $item) {
        if ($item == htmlspecialchars($id))
            $doublon = true;
    }
    return $doublon;
}


function like_session($idRecette)
{
    $isLiked =isLikedSession($idRecette);
  
    if(empty($_SESSION['favori']))
    $_SESSION['favori']= array();
  
    //on ajoute les recettes enregistrés dans les variables de sessions 
    if (!$isLiked &&  !empty($idRecette))
        array_push($_SESSION['favori'], htmlspecialchars($idRecette));
}

function dislike_session($idRecette)
{
    $isLiked =isLikedSession($idRecette);

    if ( $isLiked && !empty($idRecette)) {
        for ($i = 0; $i < sizeof($_SESSION['favori']); $i++) {
            if ($_SESSION['favori'][$i] === $idRecette) {
                array_splice($_SESSION['favori'], $i, 1);
            }
        }
    }

}



function displayHeartSession($id)
{
    $isLiked =isLikedSession($id);

    //Deja liké 
    if ($isLiked ) {
        echo "<form method='post'><input type='hidden' name='dislike_session' value='".$id."'>". 
        '<button type="submit" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
            <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1" />
            </svg></button></form>';
    } else {
        echo "<form method='post'><input type='hidden' name='like_session' value='".$id."'>". 
        '<button type="submit" class="btn btn-light"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
            <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.6 7.6 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z" />
            </svg></button></form>';
    }
    
}

/***************************************************************** */
      
if(isset($_POST['like_xml']) && isset($_POST['fromHome'])  ) { 
like_xml( $_POST['like_xml'], $_POST['fromHome']);
   echo "<script>window.location.href= document.URL</script>";

} 

if(isset($_POST['dislike_xml']) && isset($_POST['fromHome'])  ) { 
   dislike_xml($_POST['dislike_xml'], $_POST['fromHome']);
   echo "<script>window.location.href= document.URL</script>";
} 

function isLikedXml($xml, $id ){
    $doublon = false;
    
    $path = "//enregistrement[email_utilisateur ='" . $_SESSION['utilisateur']['email'] . "' and id_recette=" . $id . "]";
    if (count($xml->xpath($path)) != 0) $doublon=true;

    return $doublon;
}

function displayHeartXml($xml, $id, $fromHome=false)
{ 
    $isLiked = isLikedXml( $xml, $id);

    if (!empty($_SESSION['utilisateur']['email'])) 
    {   
        if (!$isLiked) {

            echo "<form method='post'><input type='hidden' name='like_xml' value='".$id."'>". 
            "<input type='hidden' name='fromHome' value='".$fromHome."'>". 
            "<button type=\"submit\" class='btn btn-light'>". 
            '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.6 7.6 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z" />
                </svg></button></form>';

        } else {
            echo "<form method='post'><input type='hidden' name='dislike_xml' value='".$id."'>". 
            "<input type='hidden' name='fromHome' value='".$fromHome."'>". 
            "<button type=\"submit\" class='btn btn-light'>". 
            '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1" />
                </svg></button></form>';

        }
    } 
}



function like_xml( $idRecette, $fromHome=false)
{
    $url_xml_file = "../data/recette-utilisateur.xml";
    if($fromHome)  $url_xml_file = "./data/recette-utilisateur.xml";

    if (file_exists($url_xml_file)) {
        $xml = simplexml_load_file($url_xml_file);
      } else {
        exit('Failed to open test.xml.');
      }

       // echo $xml->liste_enregistrements->enregistrement->email_utilisateur;
        $var = $xml->liste_enregistrements->addChild('enregistrement');
        $cpt = count($xml->liste_enregistrements->children());
        $var->addAttribute('id', $cpt);
        $var->addChild('email_utilisateur', $_SESSION['utilisateur']['email']);
        $var->addChild('id_recette', $idRecette);

        $xml->asXML();
        $xml->saveXML($url_xml_file);
}

function dislike_xml($idRecette, $fromHome=false)
{
    $url_xml_file = "../data/recette-utilisateur.xml";
    if($fromHome)  $url_xml_file = "./data/recette-utilisateur.xml";

    if (file_exists($url_xml_file)) {
        $xml = simplexml_load_file($url_xml_file);
      } else {
        exit('Failed to open test.xml.');
      }

    $path = "//enregistrement[email_utilisateur ='" . $_SESSION['utilisateur']['email'] . "' and id_recette=" . $idRecette . "]";

    foreach ($xml->xpath($path) as $var) {
        unset($var[0]);
    }

    $xml->asXML();
    $xml->saveXML($url_xml_file);
}



?>