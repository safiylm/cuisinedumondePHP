
function Modifier(){
    document.getElementById("titre").style.display = 'none';
    document.getElementById("heart").style.display = 'none';
    document.getElementById("ingredients").style.display = 'none';
    document.getElementById("numero1").style.display = 'none';
    document.getElementById("numero2").style.display = 'none';
    document.getElementById("numero3").style.display = 'none';
    document.getElementById("preparation_etape1").style.display = 'none';
    document.getElementById("preparation_etape2").style.display = 'none';
    document.getElementById("preparation_etape3").style.display = 'none';

    document.getElementById("ModifierBtn").style.display = 'none';
    document.getElementById("EnregistrerBtn").style.display = 'block';
    document.querySelector(".divIngEtape").style.height = '550px';
    // document.getElementById("EnregistrerBtn").style.textAlign = 'center';

    document.getElementById("titreIPT").style.display = 'block';
    document.getElementById("ingredientsIPT").style.display = 'block';
    document.getElementById("pEtape1IPT").style.display = 'block';
    document.getElementById("pEtape2IPT").style.display = 'block';
    document.getElementById("pEtape3IPT").style.display = 'block';
}

function Enregistrer(){
    document.getElementById("titre").style.display = 'block';
    document.getElementById("heart").style.display = 'block';
    document.getElementById("ingredients").style.display = 'block';
    document.getElementById("preparation_etape1").style.display = 'block';
    document.getElementById("preparation_etape2").style.display = 'block';
    document.getElementById("preparation_etape3").style.display = 'block';

    document.getElementById("ModifierBtn").style.display = 'block';
    document.getElementById("EnregistrerBtn").style.display = 'none';
    
    document.getElementById("titreIPT").style.display = 'none';
    document.getElementById("ingredientsIPT").style.display = 'none';
    document.getElementById("pEtape1IPT").style.display = 'none';
    document.getElementById("pEtape2IPT").style.display = 'none';
    document.getElementById("pEtape3IPT").style.display = 'none';

    console.log(document.getElementById("titreIPT").value)
    console.log(document.getElementById("ingredientsIPT").value)
    console.log(document.getElementById("pEtape1IPT").value)
    console.log(document.getElementById("pEtape2IPT").value)
    console.log(document.getElementById("pEtape3IPT").value)
}




function create(){
    var titreipt = document.createElement("INPUT");
    titreipt.setAttribute("type", "text"); 
    titreipt.setAttribute("value", "Hello World!");
    document.body.appendChild(titreipt);
    
    var titrebtn = document.createElement("INPUT");
    titrebtn.setAttribute("type", "button"); 
    titrebtn.setAttribute("value", "Valider");
    document.body.appendChild(titrebtn);
}


