<script src="https://code.jquery.com/jquery-3.6.3.js"></script>

<div class="container-ajouter-recette">

   <form method='post' action="../ajouter-recette/post-ajouter-recette.php">

      <input type="text" id="nom-recette" name="nom-recette" class="input" placeholder="nom" required/>

      </br></br>
      <input type="text" id="nb-personne" name="nb-personne" class="input" placeholder="nombre de personnes ou porsion" required/>

      <div class="div-temps">
         <input type="text" id="tmp-prep" name="tmp-prep" class="input" placeholder="Temps de préparation" required/>
         <input type="text" id="tmp-cuisson" name="tmp-cuisson" class="input" placeholder="Temps de cuisson" required/>
         <input type="text" id="tmp-attente" name="tmp-attente" class="input" placeholder="Temps d'attente" required/>
      </div>


      <div class="div-difficulte-cout-categorie">
         <select name="categorie" id="categorie" class="input" required>
            <option value="Non renseigné">Catégorie non renseigné </option>
            <option value="Plats">Plats</option>
            <option value="Entrées">Entrées</option>
            <option value="Désserts">Désserts</option>
            <option value="Pâtisserie">Pâtisserie</option>
            <option value="Salades">Salades</option>
            <option value="Confitures">Confitures</option>
            <option value="Gâteaux - Biscuits">Gâteaux - Biscuits</option>
            <option value="Petit-déjeuner">Petit-déjeuner</option>
            <option value="Sauces">Sauces</option>
            <option value="Soupes">Soupes</option>
            <option value="Tartes">Tartes</option>
            <option value="Accompagnements">Accompagnements</option>
            <option value="Apéritifs">Apéritifs</option>
            <option value="Bases">Bases</option>
            <option value="Boissons">Boissons</option>
            <option value="Boulangerie - Viennoiserie">Boulangerie - Viennoiserie</option>
            
         </select>
         <select name="difficulte" id="difficulte" class="input" required>
            <option value="difficulté" selected>Difficulté non renseigné </option>
            <option value="Facile">Facile</option>
            <option value="Intermédiaire">Intermédiaire</option>
            <option value="Difficile">Difficile</option>
         </select>

         <select name="cout" id="cout" class="input" required>

            <option value="Non renseigné">Coût non renseigné </option>
            <option value="Pas cher">Pas cher</option>
            <option value="Abordable">Abordable</option>
            <option value="Assez cher">Assez cher</option>
         </select>

      </div>


      </br>
      <p>Entrez les ingrédients </p>
      <div id="div-ingredient">
         <input type="text" class="input-ing" name="quantite" placeholder="Quantité" required/>

         <select name="mesure" id="cout" class="input-ing" required>
            <option value="Mesure non renseigné">Mesure non renseigné </option>
            <option value="gramme"> gramme (g) </option>
            <option value="kilogramme"> kilogramme (kg) </option>
            <option value="litre"> litre (l) </option>
            <option value="centilitre"> centilitre (cl) </option>
            <option value="milmilitre"> milmilitre (ml) </option>
            <option value="c. à café"> c. à café </option>
            <option value="c. à soupe"> c. à soupe </option>
            <option value="c. à thé "> c. à thé </option>
         </select>

         <input type="text" class="input-ing" name="ingredient" placeholder="Ingrédient" required/>

      </div>
      <input type='hidden' name='nb-ingredients-total' id='nb-ingredients-total'/>
      <button type="button" class="btnn" onClick="ajouterIngredient()"> Ajouter un ingrédient </button>

      </br></br></br>
      <p>Entrez les étapes </p>

      <div id="div_etapes">
         <textarea type="text" class="input_etape" id="etape0" name="etape0" placeholder="Etape 0" required></textarea>
      </div>
      <input type='hidden' name='nb-etapes-total' id='nb-etapes-total'/>

      <button type="button" class="btnn" onClick="ajouterEtape()"> Ajouter une étape </button>


      </br></br>

      <p class="fontbeautifull">Ajouter photo
         <input class="btnFile" type="file" style="padding:20px; font-size:18px;" name="photo" accept=".gif, .jpg , .png, .jpeg" />
      </p>


      <button type="sunmit" class="btn-submit"> Ajouter la recette </button>

   </form>
</div> <!-- fin div containerR -->




<script src="../ajouter-recette/ajouter-recette.js">
</script>