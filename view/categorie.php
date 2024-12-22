<?php  

include "header.php";

?>
<div class="home-content">
<h1>Gestion des Categories</h1>

<!-- Bouton pour ajouter un client -->
<button class="btn-add" id="btn-add-fournisseur" style="margin-left: 20px; width:208px; height:50px;">Ajouter une Categorie</button>

<!-- Overlay pour le popup -->
<div class="overlay" id="overlay"></div>

<!-- Popup pour ajouter un client -->
<div class="popup" id="popup-add-fournisseur">
  <div class="popup-header">Ajouter une Categorie</div>
  <form action="../index.php?action=inserserCategorie" method="post">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" placeholder="Nom de la Categorie" required>
    <button type="submit" class="btn-submit">Valider</button>
    <button type="button" class="btn-cancel" id="btn-cancel">Annuler</button>
  </form>
</div>

<!-- Popup de modification -->
<div class="popup" id="popup-modify4">
  <div class="popup-header">Modifier un Fournisseur</div>
  <form action="../index.php?action=modifier_categorie" method="post">
  <input type="hidden" name="id" id="id">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom_Ca" placeholder="Nom de la Categorie" required>
    <button type="submit" class="btn-submit">Valider</button>
    <button type="button" class="btn-no" style="background-color: crimson;" >Annuler</button>
  </form>
</div>

            <?php
                    include 'listeCategorie.php';
            ?>
            
        </div>
</div>

<?php  
include "flooter.php";
?>