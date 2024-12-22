<div>
    <table class="mtable">
        <tr>
            <th>Nom de la categorie</th>
            <th>Actions</th>
        </tr>
        <?php foreach($_SESSION['Categorie'] as $categorie) :?>
            <tr>
                <td><?= $categorie['nom'] ?></td>
                <td>
                <button class="btn-edit-categorie" id="buttonq" data-id="<?= $categorie['id_categorie']; ?>" 
                    data-nom="<?= htmlspecialchars($categorie['nom']); ?>">
              Modifier
            </button>
                    <!-- <a href="./index.php?action=Suppresion&id=<?=$produit['id_produit']?>"  onclick="return confirm('TU es sure que tu veux supprimer celui ci mon petit ?')">Supprimer</a> -->
                </td>
            </tr>
        <?php endforeach; ?>    
    </table>
</div>