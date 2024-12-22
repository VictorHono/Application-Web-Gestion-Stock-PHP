<?php
include "header.php";
$id_select= null;
if ($_SERVER["REQUEST_METHOD"]=== 'POST' && isset($_POST['id_client'])){
    $id_select=$_POST["id_client"];
}
?>
<div class="home-content">
<div style="padding-left:150px;">
        <a style="color: blue; cursor: pointer; text-decoration: none; "  href="../index.php?action=Afficher_Grand_recu&id_client=<?= $_SESSION['bn'] ?? 1 ?>" class="receipt-link"><div style="display:flex; justify-content:center; background-color: red;  width:100px; height: 20px; border-radius: 23em; "><i class='bx bx-receipt' style="color:aliceblue; margin-top:2px"></i></div></i></a>
</div>


        <div class="overview-boxes">
            <div class="box">
                <form action="../index.php?action=inserer_vente" method="post">
                    <label for="nom_article">Nom de l'article</label>

                <label for="id_produit">Articles</label>
                <select name="id_produit" id="id_produit">
                    <?php 
                        foreach($_SESSION['prod'] as $Value){
                            ?>
                            <option data-prixs_u="<?= $Value['prix_u']?>" value="<?= $_SESSION["id_produit"] = $Value['id_produit'];?>">
                            <?= $Value['nom_produit']." - ".$Value['quantite']." dispognible";?> </option>
                            <?php 
                        }
                    
                    ?>
                </select>
                
                <label for="id_client">Clients</label>
                <select name="id_client" id="id_client">
                    <?php 
                        foreach($_SESSION['client'] as $Value){
                            ?>
                            <option value="<?= $Value['id_client'] ?>"><?= $Value['nom']." ".$Value['prenom'];
                            $_SESSION["id_client"] = $Value['id_client'];  ?></option>
                            <?php 
                        }
                    
                    ?>
                </select>
                

                <label for="quantite">Quantite</label>
                <input onkeyup="setprix()" type="number" name="quantite" id="quantite" placeholder="veuillez saisir la quantite de l'article">

                <label for="prix">Prix </label>
                <input type="number" name="prix" id="prix" placeholder="veuillez saisir le prix de l'article">

                <button type="submit">valider</button>
                <?php
                if(!empty($_SESSION['message2']['text'])){
                ?>
                <div class="alert <?= $_SESSION['message2']['type'] ?>">
                    <?= $_SESSION['message2']['text'] ?>
                </div>
                <?php
                }
                ?>

                </form>
            </div>

            <div class="box">
            <?php
                    include 'listeVente.php';
            ?>
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