<?php  
session_start();
if (!isset($_SESSION['admin_id'])) {
  header("Location: ../index.php?action=logout");
  exit();
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title><?php
    echo ucfirst(str_replace(".php","",basename($_SERVER['PHP_SELF'])));
            ?>
    </title>
    <link rel="stylesheet" href="../public/css/style.css"/>
    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
  </head>
  <body>
    
    <div class="sidebar hidden-print">
      <div class="logo-details">
        <i class='bx bxl-vimeo'></i>
        <span class="logo_name">VIC-GST</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="../index.php?action=Dashboad" class="<?php echo basename($_SERVER['PHP_SELF']) == "dashboard.php" ? "active" : "" ?>">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="../index.php?action=affichervente" class="<?php echo basename($_SERVER['PHP_SELF']) == "vente.php" ? "active" : "" ?>">
          <i class='bx bxs-purchase-tag-alt'></i>
            <span class="links_name">Ventes</span>
          </a>
        </li>

        <li>
          <a href="../index.php?action=afficherclient" class="<?php echo basename($_SERVER['PHP_SELF']) == "client.php" ? "active" : "" ?>">
            <i class="bx bx-user"></i>
            <span class="links_name">Clients</span>
          </a>
        </li>

        <li>
          <a href="../index.php?action=afficherproduit" class="<?php echo basename($_SERVER['PHP_SELF']) == "article.php" ? "active" : "" ?>">
            <i class="bx bx-box"></i>
            <span class="links_name">Articles</span>
          </a>
        </li>

        <li>
          <a href="../index.php?action=afficherfournisseur" class="<?php echo basename($_SERVER['PHP_SELF']) == "fournisseur.php" ? "active" : "" ?>">
          <i class='bx bxs-user-rectangle'></i>
            <span class="links_name">Fournisseurs</span>
          </a>
        </li>
        <li>
          <a href="../index.php?action=afficherCommande" class="<?php echo basename($_SERVER['PHP_SELF']) == "commande.php" ? "active" : "" ?>">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Commandes</span>
          </a>
        </li>
        <li>
          <a href="../index.php?action=afficherCategorie"  class="<?php echo basename($_SERVER['PHP_SELF']) == "categorie.php" ? "active" : "" ?>">
            <i class="bx bx-book-alt"></i>
            <span class="links_name">Categories</span>
          </a>
        </li>
        <li>
          <a href="../index.php?action=afficherAnalyse"  class="<?php echo basename($_SERVER['PHP_SELF']) == "analyse.php" ? "active" : "" ?>">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="links_name">Analyses</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-coin-stack"></i>
            <span class="links_name">Stock</span>
          </a>
        </li>
        <!-- <li>
          <a href="#">
            <i class="bx bx-message" ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-heart" ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li> -->
        <li>
          <a href="#">
            <i class="bx bx-cog"></i>
            <span class="links_name">Configuration</span>
          </a>
        </li>
        <li class="log_out">
          <a href="../index.php?action=logout">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Déconnexion</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav class="hidden-print">
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">
            <?php
            echo ucfirst(str_replace(".php","",basename($_SERVER['PHP_SELF'])));
            ?>
    </span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Recherche..." />
          <i class="bx bx-search"></i>
        </div>
        <div class="profile-details">
          <!--<img src="images/profile.jpg" alt="">-->
          <span class="admin_name"><?= $_SESSION['admin_nom'] ?></span>
          <i class="bx bx-chevron-down"></i>
        </div>
      </nav>