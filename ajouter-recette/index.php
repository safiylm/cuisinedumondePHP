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
            <option value="Plat">Plat</option>
            <option value="Entrée">Entrée</option>
            <option value="Dessert">Dessert</option>

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




<script>
   nbing = 1
   nbetape = 1

   function ajouterIngredient() {
      const div = document.getElementById('div-ingredient')
      const divp = document.createElement("div")
      divp.setAttribute("id", "divi" + nbing)
      divp.setAttribute("class", "div1_ing")

      const input_quant = document.createElement("input")
      input_quant.setAttribute("placeholder", "Quantite")
      input_quant.setAttribute("class", "input-ing")
      input_quant.setAttribute("id", "quantite" + nbing)
      input_quant.setAttribute("name", "quantite" + nbing)

      const input_mesure = document.createElement("select")
      input_mesure.setAttribute("class", "input-ing")
      input_mesure.setAttribute("id", "mesure" + nbing)
      input_mesure.setAttribute("name", "mesure" + nbing)




      var option = document.createElement("option")
      option.value = ""
      option.text = "Mesure non renseigné"
      input_mesure.appendChild(option)

      var option1 = document.createElement("option")
      option1.text = "gramme (g)"
      option1.value = "gramme"
      input_mesure.appendChild(option1)

      var option2 = document.createElement("option")
      option2.text = "kilogramme (kg)"
      option2.value = "kilogramme"
      input_mesure.appendChild(option2)

      var option3 = document.createElement("option")
      option3.text = "litre (l)"
      option3.value = "litre "
      input_mesure.appendChild(option3)

      var option4 = document.createElement("option")
      option4.text = "centilitre (cl) "
      option4.value = "centilitre "
      input_mesure.appendChild(option4)

      var option5 = document.createElement("option")
      option5.text = "milmilitre (ml)"
      option5.value = "milmilitre"
      input_mesure.appendChild(option5)

      var option6 = document.createElement("option")
      option6.text = "c. à café"
      option6.value = "c. à café"
      input_mesure.appendChild(option6)

      var option7 = document.createElement("option")
      option7.text = "c. à soupe "
      option7.value = "c. à soupe "
      input_mesure.appendChild(option7)

      var option8 = document.createElement("option")
      option8.text = "c. à thé"
      option8.value = "c. à thé"
      input_mesure.appendChild(option8)

      const input_ing = document.createElement("input")
      input_ing.setAttribute("placeholder", "Ingrédient")
      input_ing.setAttribute("class", "input-ing")
      input_ing.setAttribute("id", "ingredient" + nbing)
      input_ing.setAttribute("name", "ingredient" + nbing)


      const btn_delete = document.createElement("button")
      btn_delete.setAttribute("class", "btn_delete")
      btn_delete.setAttribute("type", "button")
      btn_delete.setAttribute('onClick', "supprimerIngredient(" + nbing + ")")

      const icon_delete = document.createElement("img")
      icon_delete.setAttribute("src", "../Photos/trash3.svg")
      btn_delete.appendChild(icon_delete)

      const br = document.createElement("br")


      divp.appendChild(input_quant)
      divp.appendChild(input_mesure)
      divp.appendChild(input_ing)
      divp.appendChild(btn_delete)
      divp.appendChild(br)

      div.appendChild(divp)
      nbing++
      document.getElementById('nb-ingredients-total').value = nbing;
   }


   function supprimerIngredient(i) {
      const div = document.getElementById('div-ingredient')
      const n = document.getElementById('divi' + i)
      div.removeChild(n);
      nbing--
   }


   function ajouterEtape() {
      const divp = document.createElement("div")
      divp.setAttribute("id", "dive" + nbetape)

      const text = document.createElement('textarea')
      text.setAttribute('id', 'etape' + nbetape)
      text.setAttribute('name', 'etape' + nbetape)
      text.setAttribute("class", "input_etape")
      text.setAttribute('placeholder', 'Etape ' + nbetape)


      const btn_delete = document.createElement("button")
      btn_delete.setAttribute("class", "btn_delete")
      btn_delete.setAttribute("type", "button")
      btn_delete.setAttribute('onClick', "supprimerEtape(" + nbetape + ")")

      const icon_delete = document.createElement("img")
      icon_delete.setAttribute("src", "../Photos/trash3.svg")
      btn_delete.appendChild(icon_delete)



      divp.appendChild(text)
      divp.appendChild(btn_delete)

      document.getElementById('div_etapes').appendChild(divp)
      nbetape++
      document.getElementById('nb-etapes-total').value = nbetape;

   }


   function supprimerEtape(i) {
      const div = document.getElementById('div_etapes')
      const n = document.getElementById('dive' + i)

      div.removeChild(n);

      nbetape--
   }
</script>