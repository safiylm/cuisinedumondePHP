<?php
session_start();
?>

<?php
if (file_exists('../data/recette-utilisateur.xml')) {
  $xml = simplexml_load_file('../data/recette-utilisateur.xml');
} else {
  exit('Failed to open test.xml.');
}


$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['mdp']);

if (!empty($email) && !empty($password)) {

    $path = "//utilisateur[ email ='" . $email . "' ]";

    if (count($xml->xpath($path)) == 1) {
       
        foreach ($xml->xpath($path) as $item) {
         // echo  $item->password[0]->__toString();
         // if(password_verify( $password, $item->password[0]->__toString() ) ){
    
            if( $password == $item->password[0]->__toString() ){

                $_SESSION['utilisateur']['email'] = $email;
                $_SESSION['utilisateur']['id'] = $item->attributes()->__toString();
                $_SESSION['utilisateur']['password'] = $item->password[0]->__toString();
                $_SESSION['utilisateur']['prenom'] = $item->prenom[0]->__toString();
                $_SESSION['utilisateur']['nom'] =  $item->nom[0]->__toString();
                $_SESSION['utilisateur']['photo_de_profil'] =  $item->photo_de_profil[0]->__toString();
    
                echo "<script>document.location.href='../mon-compte/index.php'</script>";
                //header not working 
                
            }else{ //password incorrecte
           
                echo "<script>document.location.href='connexion.php?erreur=password'</script>";
                //header not working 
            }
        }
    } 
}
echo "<script>document.location.href='connexion.php?erreur=emailpassword'</script>";
?>