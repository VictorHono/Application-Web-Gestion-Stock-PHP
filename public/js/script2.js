$(document).ready(function () {
    // Ouvrir le modal avec les données du produit
    $(".edit-btn").click(function () {
        $("#product_id").val($(this).data("id"));
        $("#nom_article").val($(this).data("nom_article"));
        $("#categorie").val($(this).data("categorie"));
        $("#quantite").val($(this).data("quantite"));
        $("#prix_u").val($(this).data("prix_u"));
        $("#date_fabrication").val($(this).data("date_fabrication"));
        $("#date_expiration").val($(this).data("date_expiration"));

        $("#editModal").fadeIn();
    });

    // Fermer le modal
    $(".close-btn, .cancel-btn").click(function () {
        $("#editModal").fadeOut();
    });

    // Soumettre le formulaire via Ajax
    $("#editForm").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "./update_product.php",
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                alert(response);
                location.reload(); // Recharger la page pour voir les changements
            },
            error: function () {
                alert("Erreur lors de la modification du produit.");
            },
        });
    });
});
