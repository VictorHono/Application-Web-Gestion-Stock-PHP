<?php  
include "header.php";
?>
<div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <form action="../index.php?action=inserer_produit" method="post">
                    <label for="nom_article">Nom de l'article</label>
                <input type="text" name="nom_article" id="nom_article" placeholder="veuillez saisir le nom de l'article">

                <label for="id_categorie">Categorie</label>
                <select name="id_categorie" id="id_categorie">
                <?php foreach($_SESSION['Categorie'] as $categorie) :?>
                    <option value="<?=$categorie['id_categorie'] ?>"><?=$categorie['nom'] ?></option>
                <?php endforeach ?>
                </select>
                
                <label for="quantite">Quantite</label>
                <input type="number" name="quantite" id="quantite" placeholder="veuillez saisir la quantite de l'article">

                <label for="prix_u">Prix Unitaire</label>
                <input type="number" name="prix_u" id="prix_u" placeholder="veuillez saisir le prix unitaire de l'article">

                <label for="date_fabrication">Date de Fabrication</label>
                <input type="date" name="date_fabrication" id="date_fabrication" placeholder="veuillez saisir la Date de Fabrication de l'article">

                <label for="date_expiration">Date d'expiration</label>
                <input type="date" name="date_expiration" id="date_expiration" placeholder="veuillez saisir la Date d'expiration de l'article">

                <button type="submit">valider</button>
                <?php
                if(!empty($_SESSION['message']['text'])){
                ?>
                <div class="alert <?= $_SESSION['message']['type'] ?>">
                    <?= $_SESSION['message']['text'] ?>
                </div>
                <?php
                }
                ?>

                </form>
            </div>

            <div class="box">
            <?php
                    include 'listeArticle.php';
            ?>
            </div>
        </div>
</div>

<!-- Overlay pour le popup -->
<div class="overlay"></div>

<!-- Popup de modification -->
<div class="popup" id="popup-modify">
  <div class="popup-header">Modifier le produit</div>
  <form action="../index.php?action=modifier_produits" method="post">
    <input type="hidden" name="id" id="id">
    <label for="nom">Nom de l'article</label>
    <input type="text" name="nom" id="nom" placeholder="Nom de l'article" required>

    <label for="id_categorie">Catégorie</label>
    <select name="id_categorie" id="categorie_M" required>
    <?php foreach($_SESSION['Categorie'] as $categorie) :?>
                    <option value="<?=$categorie['id_categorie'] ?>"><?=$categorie['nom'] ?></option>
    <?php endforeach ?>
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

