
   <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
   <link rel="stylesheet" href="../css/ajouter_recette.css" />


   <div class="container-ajouter-recette">
   <h1>Déposer une recette </h1>
      <form method='post' action="../ajouter-recette/post-ajouter-recette.php">

         <input type="text" id="nom-recette" name="nom-recette" class="form-control" placeholder="nom" required />
         <input type="text" id="nb-personne" name="nb-personne" class="form-control" placeholder="nombre de personnes ou porsion" required />
         <input type="text" id="tmp-total" name="tmp-total" class="form-control" placeholder="Temps total" required />
         <input type="text" name="url-image" class="form-control" placeholder="Lien de l'image" required />


         <select name="categorie" id="categorie" class="form-select">
            <option value="Non renseigné">Catégorie non renseigné </option>
            <?php foreach ($tab["sitecuisine"]["liste_categorie"]["categorie"] as $item) {
               echo "<option value='" . $item . "'>" . $item . "</option>";
            } ?>
         </select>


         <select name="difficulte" id="difficulte" class="form-select">
            <option value="difficulté" selected>Difficulté non renseigné </option>
            <option value="Facile">Facile</option>
            <option value="Intermédiaire">Intermédiaire</option>
            <option value="Difficile">Difficile</option>
         </select>


         <select name="cout" id="cout" class="form-select">

            <option value="Non renseigné">Coût non renseigné </option>
            <option value="Pas cher">Pas cher</option>
            <option value="Abordable">Abordable</option>
            <option value="Assez cher">Assez cher</option>
         </select>



         <!-- **************************************** -->

         <p>Entrez les ingrédients </p>
         <div id="div-ingredient-parent" class="div-ingredient-parent">
            <div id="div-ingredient-enfant-nb-0" class="div-ingredient-enfant">
               <input type="text" class="form-control" name="un-ingredient-nb-0" placeholder="Ingrédient" required />
            </div>
         </div>

         <input type='hidden' name='nb-ingredients-total' id='nb-ingredients-total' />
         <button type="button" class="btn btn-primary" onClick="ajouterIngredient()"> Ajouter un ingrédient </button>


         <!-- **************************************** -->


         <p>Entrez les étapes </p>

         <div id="div-etape-parent" class="div-etape-parent">
            <div id="div-etape-enfant-nb-0" class="div-etape-enfant">
               <textarea type="text" class="input_etape" id="etape0" name="une-etape-nb-0" placeholder="Etape 0" required></textarea>
            </div>
         </div>
         <input type='hidden' name='nb-etapes-total' id='nb-etapes-total' />

         <button type="button" class="btn btn-primary" onClick="ajouterEtape()"> Ajouter une étape </button>

         <!-- **************************************** -->


         <p class="fontbeautifull">Ajouter photo
            <input class="btnFile" type="file" style="padding:20px; font-size:18px;" name="photo" accept=".gif, .jpg , .png, .jpeg" />
         </p>


         <!-- **************************************** -->


         <button type="sunmit" class="btn btn-primary" > Ajouter la recette </button>

      </form>
   </div> 

   <script src="../ajouter-recette/ajouter-recette.js">
   </script>

 