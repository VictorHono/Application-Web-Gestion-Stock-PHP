<div>
<table class="mtable">
        <tr>
            <th>Nom du produit</th>
            <th>Nom du client</th>
            <th>Quantite</th>
            <th>Prix</th>
            <th>Date de vente</th>
            <th>Actions</th>
        </tr>
        <?php foreach($_SESSION['vents'] as $vente) :?>
            <tr>
                <td><?= $_SESSION['stoq'] = $vente['nom_prod'] ?>
                <?php if($vente['is_new']==1): ?>
                    <span class="new-client">Nouveau</span><?php endif; ?> </td>
                <td><?= $vente['nom']." ".$vente['prenom'] ?></td>
                <td><?= $vente['q_vente'] ?></td>
                <td><?= $vente['prix'] ?> FCFA</td>
                <td><?= $vente['date_vente']?></td>
                <td>
                <a style="color: blue;"  href="../index.php?action=Afficher_recu&id=<?= $vente['id_vente'] ?>" class="receipt-link"><i class='bx bx-receipt'></i></a>
                <a onclick="annulerVente(<?= $vente['id_vente']?> , <?= $vente['id_produit']?> , <?= $vente['q_vente'] ?>)" style="color: red;"><i class='bx bx-block' ></i></a>
                    <!-- <a href="./index.php?action=Suppresion&id=<?=$produit['id_produit']?>"  onclick="return confirm('TU es sure que tu veux supprimer celui ci mon petit ?')">Supprimer</a> -->
                </td>
            </tr>
        <?php endforeach; ?>    
    </table>
</div>