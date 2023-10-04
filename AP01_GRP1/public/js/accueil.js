//changement d'image

const flecheGauche = document.querySelector(".fleche-gauche");
const flecheDroite = document.querySelector('.fleche-droite');
const image = document.querySelector('.image');

let index = 1
image.src = "/assets/img/accueil/chauffage"+index+".jpg";
console.log(flecheGauche);


flecheGauche.addEventListener("click", ()=> {
    if (index-1 > 0) {
        index = index - 1;
        image.src = "/assets/img/accueil/chauffage"+index+".jpg";
    }
})

flecheDroite.addEventListener("click", ()=> {
    if (index+1 < 5) {
        index = index + 1;
        image.src = "/assets/img/accueil/chauffage"+index+".jpg";
    }
})