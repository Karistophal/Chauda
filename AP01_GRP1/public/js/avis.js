const hitboxs = document.querySelectorAll('.hitbox')
const etoiles = document.querySelectorAll('.etoile')
const boxEtoiles = document.querySelector('.boxEtoiles')

var animation = false;
var choisi = false;

hitboxs.forEach((hitbox) => {
    hitbox.addEventListener("mouseover", () => {
        if (animation == false) {
            reloadEtoiles(hitbox.getAttribute("id"))
        }
    });
});

hitboxs.forEach((hitbox) => {
    hitbox.addEventListener("click", () => {
        selectEtoile(hitbox.getAttribute("id"))


        $(document).ready(function () {
            $('#ajout-donnee').click(function () {
                $.ajax({
                    type: 'POST',
                    url: '/ajout-donnee', // L'URL de la route Symfony
                    success: function (response) {
                        alert(response.message); // Afficher une alerte avec la réponse du serveur
                    },
                    error: function () {
                        alert('Une erreur s\'est produite lors de l\'ajout de la donnée');
                    }
                });
            });
        });
            
    });
});

boxEtoiles.addEventListener("mouseleave", () => {
    if (animation == false) {
        etoiles.forEach((etoile) => {
            etoile.style.transform = 'translateY(0px)';
            if (choisi == false) {
                etoile.setAttribute("src", "assets/img/avis/etoileVide.png")
            }
        })
    }
})


function selectEtoile(a) {
    animation = true
    choisi = true

    //animation
    etoiles[Math.floor((parseInt(a) + 1) / 2) - 1].style.transform = 'translateY(0px)'
    for (let i = 0; i < a / 2; i++) {
        setTimeout(() => {
            etoiles[i].style.transform = 'translateY(-30%)'
            setTimeout(() => {
                etoiles[i].style.transform = 'translateY(0px)'
                if (i == a / 2 - 1 || i == a / 2 - 0.5) {
                    animation = false
                }
            }, 300)
        }, 70 * i)
    }

    etoiles.forEach((etoile) => {
        //remplissage etoiles
        const numEtoile = parseInt(etoile.getAttribute("id"))
        if (numEtoile < a / 2 + 1) {
            if (a % 2 == 1 && numEtoile > a / 2) {
                etoile.setAttribute("src", "assets/img/avis/etoileMoitie.png")
            }
            else {
                etoile.setAttribute("src", "assets/img/avis/etoilePleine.png")
            }
        }
        else {
            etoile.setAttribute("src", "assets/img/avis/etoileVide.png")
        }
    })
}



function reloadEtoiles(i) {
    etoiles.forEach((etoile) => {

        //remplissage etoiles
        if (choisi == false) {
            const numEtoile = parseInt(etoile.getAttribute("id"))
            if (numEtoile < i / 2 + 1) {
                if (i % 2 == 1 && numEtoile > i / 2) {
                    etoile.setAttribute("src", "assets/img/avis/etoileMoitie.png")
                }
                else {
                    etoile.setAttribute("src", "assets/img/avis/etoilePleine.png")
                }
            }
            else {
                etoile.setAttribute("src", "assets/img/avis/etoileVide.png")
            }
        }

        //animation etoile
        if (parseInt(etoile.getAttribute('id')) == Math.floor((parseInt(i) + 1) / 2)) {
            etoile.style.transform = 'translateY(-20%)';
        }
        else {
            etoile.style.transform = 'translateY(0px)';
        }
    })
}