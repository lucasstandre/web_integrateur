//variables
const next1 = document.getElementById("next1");
const next2 = document.getElementById("next2");
const fieldset1 = document.getElementById("inscription1");
const fieldset2 = document.getElementById("inscription2");
const connexion = document.getElementById("connexion");
const startConnexion = document.getElementsByClassName("startConnexion");
const startInscription = document.getElementById("startinscription");
//mobile

const startinscriptionM = document.getElementById("startinscriptionM");
const next1M = document.getElementById("next1M");
const next2M = document.getElementById("next2M");
const fieldset1M = document.getElementById("inscription1M");
const fieldset2M = document.getElementById("inscription2M");
const connexionM = document.getElementById("connexionM");
const startConnexionM = document.getElementsByClassName("startConnexionM");


//eventListener
for (let i =0, l = startConnexion.length; i < l; i++){
    startConnexion[i].addEventListener("click", connexionStart);
}
next1.addEventListener("click", adresseBox)
startInscription.addEventListener("click", inscription);
//mobile
for (let i =0, l = startConnexion.length; i < l; i++){
    startConnexionM[i].addEventListener("click", connexionStartM);
}
next1M.addEventListener("click", adresseBoxM)
startinscriptionM.addEventListener("click", inscriptionM);

//visible et notvisible pour l'animation
function connexionStart(){ 
    fieldset1.classList.remove("visible");
    fieldset2.classList.remove("visible");

    fieldset1.classList.add("notVisible");
    fieldset2.classList.add("notVisible");

    connexion.classList.remove("notVisible");
    connexion.classList.add("visible")
}

function adresseBox() {
    fieldset1.classList.remove("visible");
    fieldset1.classList.add("notVisible");

    fieldset2.classList.remove("notVisible");
    fieldset2.classList.add("visible");
}
function inscription(){
    connexion.classList.remove("visible");
    connexion.classList.add("notVisible")

    fieldset1.classList.remove("notVisible");
    fieldset1.classList.add("visible");
}

//mobile
function connexionStartM(){ 
    fieldset1M.classList.remove("visible");
    fieldset2M.classList.remove("visible");

    fieldset1M.classList.add("notVisible");
    fieldset2M.classList.add("notVisible");

    connexionM.classList.remove("notVisible");
    connexionM.classList.add("visible")
}

function adresseBoxM() {
    fieldset1M.classList.remove("visible");
    fieldset1M.classList.add("notVisible");

    fieldset2M.classList.remove("notVisible");
    fieldset2M.classList.add("visible");
}
function inscriptionM(){
    connexionM.classList.remove("visible");
    connexionM.classList.add("notVisible")

    fieldset1M.classList.remove("notVisible");
    fieldset1M.classList.add("visible");
}