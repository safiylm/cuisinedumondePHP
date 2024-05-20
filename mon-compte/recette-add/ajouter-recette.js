
nbing = 1
nbetape = 1

function ajouterIngredient() {
   const div = document.getElementById('div-ingredient-parent')
   
   const divp = document.createElement("div")
   divp.setAttribute("id", "div-ingredient-enfant-nb-" + nbing)
   divp.setAttribute("class", "div-ingredient-enfant")

   const input_ing = document.createElement("input")
   input_ing.setAttribute("placeholder", "Ingrédient")
   input_ing.setAttribute("class", "form-control")
   input_ing.setAttribute("id", "un-ingredient-nb-" + nbing)
   input_ing.setAttribute("name", "un-ingredient-nb-" + nbing)


   const btn_delete = document.createElement("button")
   btn_delete.setAttribute("class", "btn btn-primary")
   btn_delete.setAttribute("type", "button")
   btn_delete.setAttribute('onClick', "supprimerIngredient(" + nbing + ")")

   const icon_delete = document.createElement("img")
   icon_delete.setAttribute("src", "../Photos/trash3.svg")
   btn_delete.appendChild(icon_delete)

   const br = document.createElement("br")


   divp.appendChild(input_ing)
   divp.appendChild(btn_delete)
   divp.appendChild(br)

   div.appendChild(divp)
   nbing++
   document.getElementById('nb-ingredients-total').value = nbing;
}


function supprimerIngredient(i) {
   const div = document.getElementById('div-ingredient-parent')
   const n = document.getElementById('div-ingredient-enfant-nb-' + i)
   div.removeChild(n);
   nbing--
}


function ajouterEtape() {
   const divp = document.createElement("div")
   divp.setAttribute("id", "div-etape-enfant-nb-" + nbetape)

   const text = document.createElement('textarea')
   text.setAttribute('id', 'une-etape-nb-' + nbetape)
   text.setAttribute('name', 'une-etape-nb-' + nbetape)
   text.setAttribute("class", "form-control")
   text.setAttribute('placeholder', 'Etape ' + nbetape)


   const btn_delete = document.createElement("button")
   btn_delete.setAttribute("class", "btn btn-primary")
   btn_delete.setAttribute("type", "button")
   btn_delete.setAttribute('onClick', "supprimerEtape(" + nbetape + ")")

   const icon_delete = document.createElement("img")
   icon_delete.setAttribute("src", "../Photos/trash3.svg")
   btn_delete.appendChild(icon_delete)



   divp.appendChild(text)
   divp.appendChild(btn_delete)

   document.getElementById('div-etape-parent').appendChild(divp)
   nbetape++
   document.getElementById('nb-etapes-total').value = nbetape;

}


function supprimerEtape(i) {
   const div = document.getElementById('div-etape-parent')
   const n = document.getElementById('div-etape-enfant-nb-' + i)

   div.removeChild(n);

   nbetape--
}