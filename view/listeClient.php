
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
        <?php foreach($_SESSION['client'] as $client) :?>
            <tr>
                <td><?= $client['nom'] ?> <?php if($client['is_new']==1): ?>
                <span class="new-client">Nouveau</span><?php endif; ?></td>
                <td><?= $client['prenom'] ?></td>
                <td><?= $client['adresse'] ?></td>
                <td><?= $client['tel'] ?></td>
                <td><?= $client['email']?></td>
                <td>
                <button class="btn-edit" id="buttonq" data-id="<?= $_SESSION["id_modif_C"] = $client['id_client']; ?>" 
                    data-nom="<?= htmlspecialchars($client['nom']); ?>" 
                    data-prenom="<?= htmlspecialchars($client['prenom']); ?>"
                    data-adresse="<?= htmlspecialchars($client['adresse']);?>"
                    data-tel="<?= $client['tel']; ?>"
                    data-email="<?= htmlspecialchars($client['email']); ?>">
              Modifier
            </button>
            <a href="../index.php?action=Supprimer_client&id=<?= $client['id_client']?>"  onclick="return confirm('TU es sure que tu veux supprimer celui ci mon petit ?')">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>    
    </table>
</div>