<!DOCTYPE html>
<html lang="fr">

<head>
   <title>Recette </title>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" />
   <link rel="stylesheet" href="../CSS/body.css" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
   <link rel="stylesheet" href="../css/ajouter_recette.scss" />

   <?php



   // Connexion à la base de données
   include("../navigation/index.php");

   $json_object = file_get_contents("../data/recette.json");
   $tab = json_decode($json_object, true);
   $id = $_GET['idRecette'];


   if (file_exists('../data/recette-utilisateur.xml')) {
      $xml = simplexml_load_file('../data/recette-utilisateur.xml');
   } else {
      exit('Failed to open test.xml.');
   }

   ?>
</head>

<body>

   <div class="container-ajouter-recette">

      <form method='post' action="../ajouter-recette/post-ajouter-recette.php">

         <input type="text" id="nom-recette" name="nom-recette" class="input" placeholder="nom" required />
         <input type="text" id="nb-personne" name="nb-personne" class="input" placeholder="nombre de personnes ou porsion" required />
         <input type="text" id="tmp-total" name="tmp-total" class="input" placeholder="Temps total" required />
         <input type="text" name="url-image" class="input" placeholder="Lien de l'image" required />


         <select name="categorie" id="categorie" class="input">
            <option value="Non renseigné">Catégorie non renseigné </option>
            <?php foreach ($tab["sitecuisine"]["liste_categorie"]["categorie"] as $item) {
               echo "<option value='" . $item . "'>" . $item . "</option>";
            } ?>
         </select>


         <select name="difficulte" id="difficulte" class="input">
            <option value="difficulté" selected>Difficulté non renseigné </option>
            <option value="Facile">Facile</option>
            <option value="Intermédiaire">Intermédiaire</option>
            <option value="Difficile">Difficile</option>
         </select>


         <select name="cout" id="cout" class="input">

            <option value="Non renseigné">Coût non renseigné </option>
            <option value="Pas cher">Pas cher</option>
            <option value="Abordable">Abordable</option>
            <option value="Assez cher">Assez cher</option>
         </select>



         <!-- **************************************** -->

         <p>Entrez les ingrédients </p>
         <div id="div-ingredient-parent" class="div-ingredient-parent">
            <div id="div-ingredient-enfant-nb-0" class="div-ingredient-enfant">
               <input type="text" class="input-ing" name="un-ingredient-nb-0" placeholder="Ingrédient" required />
            </div>
         </div>

         <input type='hidden' name='nb-ingredients-total' id='nb-ingredients-total' />
         <button type="button" class="btnn" onClick="ajouterIngredient()"> Ajouter un ingrédient </button>


         <!-- **************************************** -->


         <p>Entrez les étapes </p>

         <div id="div-etape-parent" class="div-etape-parent">
            <div id="div-etape-enfant-nb-0" class="div-etape-enfant">
               <textarea type="text" class="input_etape" id="etape0" name="une-etape-nb-0" placeholder="Etape 0" required></textarea>
            </div>
         </div>
         <input type='hidden' name='nb-etapes-total' id='nb-etapes-total' />

         <button type="button" class="btnn" onClick="ajouterEtape()"> Ajouter une étape </button>

         <!-- **************************************** -->


         <p class="fontbeautifull">Ajouter photo
            <input class="btnFile" type="file" style="padding:20px; font-size:18px;" name="photo" accept=".gif, .jpg , .png, .jpeg" />
         </p>


         <!-- **************************************** -->


         <button type="sunmit" class="btn-submit"> Ajouter la recette </button>

      </form>
   </div> 

   <script src="../ajouter-recette/ajouter-recette.js">
   </script>