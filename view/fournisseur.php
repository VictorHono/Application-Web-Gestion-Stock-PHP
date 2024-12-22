<?php  

include "header.php";

?>
<div class="home-content">
<h1>Gestion des Fournisseur</h1>

<!-- Bouton pour ajouter un client -->
<button class="btn-add" id="btn-add-fournisseur" style="margin-left: 20px; width:208px; height:50px;">Ajouter un Fournisseur</button>

<!-- Overlay pour le popup -->
<div class="overlay" id="overlay"></div>

<!-- Popup pour ajouter un client -->
<div class="popup" id="popup-add-fournisseur">
  <div class="popup-header">Ajouter un Fournisseur</div>
  <form action="../index.php?action=inserser_fournisseur" method="post">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" placeholder="Nom du fournisseur" required>

    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" id="prenom" placeholder="Prénom du fournisseur" required>

    <label for="adresse">Adresse</label>
    <input type="text" name="adresse" id="adresse" placeholder="Adresse du fournisseur" required>

    <label for="telephone">Numéro de téléphone</label>
    <input type="tel" name="telephone" id="telephone" placeholder="Téléphone du fournisseur" required>

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" placeholder="E-mail du cfournisseur" required>

    <button type="submit" class="btn-submit">Valider</button>
    <button type="button" class="btn-cancel" id="btn-cancel">Annuler</button>
  </form>
</div>

<!-- Popup de modification -->
<div class="popup" id="popup-modify2">
  <div class="popup-header">Modifier un Fournisseur</div>
  <form action="../index.php?action=modifier_fournisseur" method="post">
  <input type="hidden" name="id" id="id">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom_f" placeholder="Nom du client" required>

    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" id="prenom_f" placeholder="Prénom du client" required>

    <label for="adresse">Adresse</label>
    <input type="text" name="adresse" id="adresse_f" placeholder="Adresse du client" required>

    <label for="telephone">Numéro de téléphone</label>
    <input type="tel" name="telephone" id="tel_f" placeholder="Téléphone du client" required>

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email_f" placeholder="E-mail du client" required>

    <button type="submit" class="btn-submit">Valider</button>
    <button type="button" class="btn-no" style="background-color: crimson;" >Annuler</button>
  </form>
</div>

            <?php
                    include 'listeFournisseur.php';
            ?>
            
        </div>
</div>

<?php  
include "flooter.php";
?>