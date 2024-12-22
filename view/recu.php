<?php

include "header.php";
$recu = $_SESSION['recu'];
?>
<div class="home-content">

     <div style="display:flex; justify-content:center;">
      <button class="hidden-print" id="btnPrint" style="cursor: pointer;"><i class='bx bx-printer'></i> imprimer</button>
     </div>
    


    <div class="page">
          <div class="cote-a-cote">
             <h2>VIC-GST </h2>
             <i class='bx bxl-vimeo'></i>
             <div>
              <p>Recu N : <?= $recu['id_vente'] ?> </p>
              <p>Date : <?= date('d/m/y H:i:s', strtotime($recu['date_vente'] ))?> </p>
             </div>
          </div>
          <div class="cote-a-cote" style="width: 50%;" >
            <p>Nom :</p>
            <p><?= $recu['nom']." ".$recu['prenom'] ?></p>
          </div>
          <div class="cote-a-cote" style="width: 50%;" >
            <p>Numero de Telephone:</p>
            <p><?= $recu['tel'] ?></p>
          </div>
          <div class="cote-a-cote" style="width: 50%;" >
            <p>Adresse:</p>
            <p><?= $recu['adresse'] ?></p>
          </div>

          <br>


          <table class="mtable">
        <tr>
            <th>Designation</th>
            <th>Quantite</th>
            <th>Prix Unitaire</th>
            <th>Prix total</th>

        </tr>
            <tr>
                <td><?= $recu['nom_prod'] ?></td>
                <td><?= $recu['q_vente'] ?></td>
                <td><?= $recu['prix_u'] ?> FCFA</td>
                <td><?= $recu['prix']?> FCFA</td>
            </tr>
    </table>

    <br>

      <div style="justify-content: end; display:flex; " >
              <p >Merci pour votre achat</p>
      </div>
    </div>

</div>

<!-- Overlay pour le popup -->
<div class="overlay"></div>

<!-- Popup de modification -->
<div class="popup" id="popup-modify">
  <div class="popup-header">Modifier le produit</div>
  <form action="../index.php?action=modifier_produit" method="post">
    <input type="hidden" name="id" id="id">
    <label for="nom_article">Nom de l'article</label>
    <input type="text" name="nom_article" id="nom" placeholder="Nom de l'article" required>

    <label for="categorie">Catégorie</label>
    <select name="categorie" id="categorie_M" required>
      <option value="ordinateurs">Ordinateurs</option>
      <option value="imprimantes">Imprimantes</option>
      <option value="accessoires">Accessoires</option>
    </select>

    <label for="quantite">Quantité</label>
    <input type="number" name="quantite" id="quantite_M" placeholder="Quantité" required>

    <label for="prix_u">Prix Unitaire</label>
    <input type="number" name="prix_u" id="prix_u_M" placeholder="Prix Unitaire" required>

    <label for="date_fabrication">Date de Fabrication</label>
    <input type="date" name="date_fabrication" id="date_fabrication_M" required>

    <label for="date_expiration">Date d'expiration</label>
    <input type="date" name="date_expiration" id="date_expiration_M" required>

    <button type="submit" class="btn-submit">Valider</button>
    <button type="button" class="btn-cancel">Annuler</button>
  </form>
</div>

    
<?php  
include "flooter.php";
?>