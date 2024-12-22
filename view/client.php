<?php  

include "header.php";

?>
<div class="home-content">
<h1>Gestion des Clients</h1>

<!-- Bouton pour ajouter un client -->
<button class="btn-add" id="btn-add-client" style="margin-left: 20px; width:200px; height:50px;">Ajouter un Client</button>

<button class="btn-add" id="btn-view-client" style="margin-left: 20px; width:200px; height:50px; background-color:brown;">Clients bloques</button>
<!-- Overlay pour le popup -->
<div class="overlay" id="overlay"></div>

<!-- Popup pour ajouter un client -->
<div class="popup" id="popup-add-client">
  <div class="popup-header">Ajouter un Client</div>
  <form action="../index.php?action=inserser_client" method="post">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" placeholder="Nom du client" required>

    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" id="prenom" placeholder="Prénom du client" required>

    <label for="adresse">Adresse</label>
    <input type="text" name="adresse" id="adresse" placeholder="Adresse du client" required>

    <label for="telephone">Numéro de téléphone</label>
    <input type="tel" name="telephone" id="telephone" placeholder="Téléphone du client" required>

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" placeholder="E-mail du client" required>

    <button type="submit" class="btn-submit">Valider</button>
    <button type="button" class="btn-cancel" id="btn-cancel">Annuler</button>
  </form>
</div>

<!-- Popup de modification -->
<div class="popup" id="popup-modify2">
  <div class="popup-header">Modifier un Client</div>
  <form action="../index.php?action=modifier_client" method="post">
  <input type="hidden" name="id" id="id">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom_c" placeholder="Nom du client" required>

    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" id="prenom_c" placeholder="Prénom du client" required>

    <label for="adresse">Adresse</label>
    <input type="text" name="adresse" id="adresse_c" placeholder="Adresse du client" required>

    <label for="telephone">Numéro de téléphone</label>
    <input type="tel" name="telephone" id="tel_c" placeholder="Téléphone du client" required>

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email_c" placeholder="E-mail du client" required>

    <button type="submit" class="btn-submit">Valider</button>
    <button type="button" class="btn-no" style="background-color: crimson;" >Annuler</button>
  </form>
</div>

<!-- Popup de modification -->
<div class="popup2" id="popup-view-client">
  <div class="popup-header2">Liste Clients Bloques</div>
  <div>
    <table class="mtable">
        <tr>
            <th>Nom</th>
            <th>prenom</th>
            <th>adresse</th>
            <th>Numero de telephone</th>
            <th>email</th>
            <th>Actions</th>
        </tr>
        <?php foreach($_SESSION['clientB'] as $client) :?>
            <tr>
                <td><?= $client['nom'] ?> <?php if($client['is_new']==1): ?>
                <span class="new-client">Nouveau</span><?php endif; ?></td>
                <td><?= $client['prenom'] ?></td>
                <td><?= $client['adresse'] ?></td>
                <td><?= $client['tel'] ?></td>
                <td><?= $client['email']?></td>
                <td>
                    <a href="../index.php?action=Debloquer_client&id=<?= $client['id_client']?>"  onclick="return confirm('TU es sure que tu veux supprimer celui ci mon petit ?')">Debloquer</a>
                </td>
            </tr>
        <?php endforeach; ?>    
    </table>
</div>
<div style="display:flex; justify-content: center; margin-top: 10px;  ">
  <button type="button" class="btn-no" id="btn-cancel5" style="background-color: crimson;" >Annuler</button>
</div>
    
  
</div>

            <?php
                    include 'listeClient.php';
            ?>
            
        </div>
</div>

<?php  
include "flooter.php";
?>
