// Attendre que le document soit prêt
document.addEventListener("DOMContentLoaded", function() {
    // Sélectionner tous les boutons "En savoir plus" par leur classe
    var enSavoirPlusButtons = document.querySelectorAll(".en-savoir-plus");

    // Ajouter un gestionnaire d'événements "click" à chaque bouton
    enSavoirPlusButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            var target = button.getAttribute("data-target");
            var detailsElement = document.getElementById(target);

            // Masquez toutes les divs de détails
            var allDetailsElements = document.querySelectorAll(".prestation-details");
            allDetailsElements.forEach(function(detail) {
                detail.style.display = "none";
            });

            //Affichage des détails de la prestation
            detailsElement.style.display = "flex";

            // Faire défiler la page jusqu'à l'élément cible
            for (let i = 0; i < allDetailsElements.length; i++)
            {
                allDetailsElements[i].scrollIntoView({ behavior: "smooth" }); // "smooth" pour un défilement fluide
            }
        })
    });
});
