<?php  
include "header.php";
if (!isset($_SESSION['admin_id'])) {
  header("Location: ../index.php?action=logout");
  exit();
}
?>
<div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Commande </div>
              <div class="number"><?= $_SESSION['ALLCommande'] ?? 0 ?></div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bx-cart-alt cart"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Vente</div>
              <div class="number"><?php echo $_SESSION['ALLvents'] ?? 0 ?></div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bxs-cart-add cart two"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Profit</div>
              <div class="number">12,876 F</div>
              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text">Depuis hier</span>
              </div>
            </div>
            <i class="bx bx-cart cart three"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Revenu</div>
              <div class="number">11,086</div>
              <div class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
                <span class="text">Aujourd'hui</span>
              </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
          </div>
        </div>

        <div class="overview-boxes">
           <div class="box">
            <div class="right-side">
              <div class="box-topic">Chiffre d'Affaire</div>
              <div class="number"><?php echo number_format($_SESSION['CA'] ?? 0)  ?> FCFA</div>
              <div class="indicator">
              </div>
            </div>
            <i class="bx bx-cart-alt cart"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Articles</div>
              <div class="number"><?php echo $_SESSION['ALLprod'] ?></div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
          </div>
        </div>
       

        <div class="sales-boxes">
          <div class="recent-sales box">
            <div class="title">Vente recentes</div>
            <div class="sales-details">
              <ul class="details">
                <li class="topic">Date</li>
                <?php foreach($_SESSION['LastVents'] as $value){
                  ?>
                   <li><a href="#"><?= date('d/m/y H:i:s', strtotime($value['date_vente'] ))?></a></li>
                  <?php
                } ?>

              </ul>
              <ul class="details">
                <li class="topic">Client</li>
                <?php foreach($_SESSION['LastVents'] as $value){
                  ?>
                   <li><a href="#"><?= $value['nom']." ".$value['prenom'] ?></a></li>
                  <?php
                } ?>
              </ul>
              <ul class="details">
                <li class="topic">Produit</li>
                <?php foreach($_SESSION['LastVents'] as $value){
                  ?>
                   <li><a href="#"><?= $value['nom_prod']?></a></li>
                  <?php
                } ?>
              </ul>
              <ul class="details">
                <li class="topic">Prix</li>
                <?php foreach($_SESSION['LastVents'] as $value){
                  ?>
                   <li><a href="#"><?= $value['prix'] ?> FCFA</a></li>
                  <?php
                } ?>
              </ul>
            </div>
            <div class="button">
              <a href="../index.php?action=affichervente">Voir Tout</a>
            </div>
          </div>
          <div class="top-sales box">
            <div class="title">Produit le plus vendu</div> 
                  <ul class="top-sales-details">
                    <?php if(isset($_SESSION['MostVents'])){
                      foreach( $_SESSION['MostVents'] as $key => $produit){
                        ?>
                          <li>
                              <a href="#">
                                <span class="product"><?=  htmlspecialchars($produit['produit'])?></span>
                              </a>
                            <span class="price"><?= $value['prix'] ?>FCFA</span>
                          </li>
                        <?php
                      }}?>
                  </ul>
          </div>
        </div>
      </div>
    </section>
<?php  
include "flooter.php";
?>
