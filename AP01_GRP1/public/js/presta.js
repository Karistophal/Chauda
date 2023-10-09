// Attendez que le document soit prêt
document.addEventListener("DOMContentLoaded", function() {
    // Sélectionnez tous les boutons "En savoir plus" par leur classe
    var enSavoirPlusButtons = document.querySelectorAll(".en-savoir-plus");

    // Ajoutez un gestionnaire d'événements "click" à chaque bouton
    enSavoirPlusButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            var target = button.getAttribute("data-target");
            var detailsElement = document.getElementById(target);

            // Masquez toutes les divs de détails
            var allDetailsElements = document.querySelectorAll(".prestation-details");
            allDetailsElements.forEach(function(detail) {
                detail.style.display = "none";
            });

            // Utilisez JavaScript pour afficher la description de la prestation cliquée
            detailsElement.style.display = "flex";
        });
    });
});
