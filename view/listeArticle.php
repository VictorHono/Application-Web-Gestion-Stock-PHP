<div>
    <form action="" method="GET">
    <table class="mtable">
        <tr>
            <th>Nom du produit</th>
            <th>categorie</th>
            <th>quantite</th>
            <th>prix_u</th>
            <th>Date_fabrication</th>
            <th>Date_expiration</th>
        </tr>
            <tr>
               <tr>
            <td><input type="text" name="nom_article" id="nom_article" placeholder="veuillez saisir le nom de l'article"></td>
            <td> <select name="id_categorie" id="id_categorie">
                <?php foreach($_SESSION['Categorie'] as $categorie) :?>
                    <option value="<?=$categorie['id_categorie'] ?>"><?=$categorie['nom'] ?></option>
                <?php endforeach ?>
                </select></td>
            <td><input type="number" name="quantite" id="quantite" placeholder="veuillez saisir la quantite de l'article"></td>
            <td><input type="number" name="prix_u" id="prix_u" placeholder="veuillez saisir le prix unitaire de l'article"></td>
            <td><input type="date" name="date_fabrication" id="date_fabrication" placeholder="veuillez saisir la Date de Fabrication de l'article"></td>
            <td><input type="date" name="date_expiration" id="date_expiration" placeholder="veuillez saisir la Date d'expiration de l'article"></td>
               </tr>
            </tr>
    </table>
    <br>
    <button type="submit">valider</button>
    </form>
    <br>
    <table class="mtable">
        <tr>
            <th>Nom du produit</th>
            <th>categorie</th>
            <th>quantite</th>
            <th>prix_u</th>
            <th>date_fabrication</th>
            <th>date_expiration</th>
            <th>Actions</th>
        </tr>
        <?php foreach($_SESSION['prod'] as $produits) :?>
            <tr>
                <td><?= $produits['nom_produit'] ?></td>
                <td><?= $produits['nom_categorie'] ?></td>
                <td><?= $produits['quantite'] ?></td>
                <td><?= $produits['prix_u'] ?> FCFA</td>
                <td><?= date('d/m/y H:i:s', strtotime($produits['date_fabrication'] ))?></td>
                <td><?= date('d/m/y H:i:s', strtotime($produits['date_expiration'])) ?></td>
                <td>
                <button class="btn-modify" id="buttonq" data-id="<?= $produits['id_produit'];?>" 
                    data-nom="<?= htmlspecialchars($produits['nom_produit']);?>" 
                    data-categorie="<?= $produits['id_categorie'];?>"
                    data-quantite="<?= $produits['quantite']; ?>"
                    data-prix="<?= $produits['prix_u']; ?>"
                    data-date-fabrication="<?= $produits['date_fabrication']; ?>"
                    data-date-expiration="<?= $produits['date_expiration']; ?>">
              Modifier
            </button>
                    <!-- <a href="./index.php?action=Suppresion&id=<?=$produit['id_produit']?>"  onclick="return confirm('TU es sure que tu veux supprimer celui ci mon petit ?')">Supprimer</a> -->
                </td>
            </tr>
        <?php endforeach; ?>    
    </table>
</div>


