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
        <?php foreach($_SESSION['fournisseur'] as $fournisseur) :?>
            <tr>
                <td><?= $fournisseur['nom'] ?> <?php if($fournisseur['is_new']==1): ?>
                <span class="new-client">Nouveau</span><?php endif; ?></td>
                <td><?= $fournisseur['prenom'] ?></td>
                <td><?= $fournisseur['adresse'] ?></td>
                <td><?= $fournisseur['tel'] ?></td>
                <td><?= $fournisseur['email']?></td>
                <td>
                <button class="btn-edit-fournisseur" id="buttonq" data-id="<?=  $fournisseur['id_fournisseur']; ?>" 
                    data-nom="<?= htmlspecialchars($fournisseur['nom']); ?>" 
                    data-prenom="<?= htmlspecialchars($fournisseur['prenom']); ?>"
                    data-adresse="<?= htmlspecialchars($fournisseur['adresse']);?>"
                    data-tel="<?= $fournisseur['tel']; ?>"
                    data-email="<?= htmlspecialchars($fournisseur['email']); ?>">
              Modifier
            </button>
                    <!-- <a href="./index.php?action=Suppresion&id=<?=$produit['id_produit']?>"  onclick="return confirm('TU es sure que tu veux supprimer celui ci mon petit ?')">Supprimer</a> -->
                </td>
            </tr>
        <?php endforeach; ?>    
    </table>
</div>