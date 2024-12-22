
<div>
<table class="mtable">
        <tr>
            <th>Nom du produit</th>
            <th>Nom du fournisseur</th>
            <th>Quantite</th>
            <th>Prix</th>
            <th>Date de Commande</th>
            <!-- <th>Actions</th> -->
        </tr>
        <?php foreach($_SESSION['Commande'] as $Commande) :?>
            <tr>
                <td><?= $_SESSION['stoq'] = $Commande['nom_prod'] ?>
                <?php if($Commande['is_new']==1): ?>
                    <span class="new-client">Nouveau</span><?php endif; ?> </td>
                <td><?= $Commande['nom']." ".$Commande['prenom'] ?></td>
                <td><?= $Commande['q_commande'] ?></td>
                <td><?= $Commande['prix'] ?> FCFA</td>
                <td><?= $Commande['date_commande']?></td>
                <!-- <td>
                <a style="color: blue;"  href="../index.php?action=Afficher_recu&id=<?= $vente['id_vente'] ?>" class="receipt-link"><i class='bx bx-receipt'></i></a>
                <a onclick="annulerVente(<?= $Commande['id_commande']?> , <?= $Commande['id_produit']?> , <?= $Commande['q_vente'] ?>)" style="color: red;"><i class='bx bx-block' ></i></a> 
                    <a href="./index.php?action=Suppresion&id=<?=$produit['id_produit']?>"  onclick="return confirm('TU es sure que tu veux supprimer celui ci mon petit ?')">Supprimer</a> 
                </td> -->
            </tr>
        <?php endforeach; ?>    
    </table>
</div>