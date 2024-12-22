# Application-Web-Gestion-Stock-PHP
Application web de Gestion de Stock en PHP oriante objet avec le modele MVC.
- **informations de connexion sur l'application de gestion de stock** :
       - email : Admin@gmail.com
       - mot de passe : Admin1234
- **Serveur local utiliser** : Xampp
- **Description du projet** : 
Ce projet a consister à concevoir une **application de gestion de stock** performante en utilisant **PHP orienté objet** avec le modèle **MVC (Modèle-Vue-Contrôleur)**. L’objectif est d’offrir une solution centralisée pour la gestion des produits, des stocks, des commandes, des fournisseurs, des clients, et des factures, tout en assurant une maintenance simplifiée et une architecture évolutive.
  # Cette application permet :
      - La gestion des produits (ajout, modification, suppression).
      - La gestion des clients.
      - La gestion des factures.
      - La gestion des ventes.
      - Le suivi des stocks en temps réel.
      - La gestion des fournisseurs et des commandes.
      - La génération d’analyses.
      - Une interface utilisateur conviviale et intuitive.
  # Ressources de développement utilisées :
    Pour développer cette application en **PHP orienté objet** avec **MVC**, voici les ressources, outils, et technologies mis en place :
  # 1. Langages et technologies principales :
      - **PHP (>= 8.0)** :
        - Utilisation des classes, interfaces, namespaces, et traits pour construire une application orientée objet.
        - Gestion des exceptions pour le traitement des erreurs.
      - **HTML5 / CSS3** :
        - Construction des vues avec une interface utilisateur moderne.
      - **JavaScript** :
        - Amélioration de l’interactivité (ex : mise à jour des stocks en temps réel, calcule dynamique du prix total des ventes).
      - **MySQL** :
        - Base de données relationnelle pour stocker les informations sur les produits, les stocks, les commandes, les utilisateurs, etc.
        - Utilisation des **PDO** pour des requêtes sécurisées et préparées.
   # 2. Architecture logicielle :
      - **Modèle MVC (Modèle-Vue-Contrôleur)** :
        - **Modèle** : Responsable de la gestion des données (requêtes SQL, manipulation des données).
        - **Vue** : Responsable de l’affichage des informations à l’utilisateur (HTML/CSS).
        - **Contrôleur** : Gère la logique métier et les interactions entre le modèle et la vue.
        - Avantages : Séparation claire des responsabilités, facilité de maintenance, et évolutivité.
    # 3. Frameworks et bibliothèques :
      - **BoxIcons** :
        - Pour les icônes (ex. : icônes pour les produits, commandes, fournisseurs, etc.).
      - **Chart.js** :
        - Pour les graphiques d'analyse (ex. :  evolution des ventes journaliere).
      - **PHPMailer** :
        - Pour l’envoi d’e-mails (ex. : confirmations de commande a un fournisseur).
    # 4. Outils de développement :
      - **Composer** :
        - Gestionnaire de dépendances PHP pour ajouter et gérer les bibliothèques externes.
      - **VS Code** :
        - Environnement de développement intégré (IDE) pour écrire le code.
     # 5. Sécurité**
      - **Validation des entrées utilisateur** :
        - Validation des données pour éviter les injections SQL.
      - **Utilisation de PDO (PHP Data Objects)** :
        - Requêtes préparées pour empêcher les injections SQL.
      - **Authentification et autorisation** :
        - Utilisation de sessions sécurisées pour gérer les utilisateurs et leurs rôles (admin, entrepôtier, etc.).
-  **Conseils d’installation et de lancement** :
Avant de commencer, assurez-vous d’avoir les éléments suivants installés et prêts sur votre machine :
### *Étape 1 : pres requis*
    - **XAMPP** :
      - Serveur Apache, PHP, et MySQL.
      - Téléchargement : [https://www.apachefriends.org](https://www.apachefriends.org).
    - **Navigateur web** (Google Chrome, Firefox, etc.).
    - **Un éditeur de texte ou IDE** (Visual Studio Code, PHPStorm, etc.).
    - **Composer** (si des dépendances tiers ont été utilisées dans le projet).
### *Étape 2 : Configuration de la base de données*
1. **Accéder à phpMyAdmin** :  
   - Ouvrez votre navigateur et rendez-vous à l’adresse suivante :  
     [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
2. **Créer une base de données** :
   - Cliquez sur **Nouvelle base de données**.
   - Entrez le nom de la base de données (par exemple, `stock`) et cliquez sur **Créer**.
3. **Importer les tables et données** :
     - Dans phpMyAdmin, sélectionnez la base de données que vous venez de créer.
     - Cliquez sur l’onglet **Importer**.
     - Cliquez sur **Choisir un fichier**, sélectionnez le fichier `gestion_stock.sql` qui est dans le dossier "Db" de l'application, et cliquez sur **Exécuter**.
4. **Mettre à jour la configuration de la base de données dans le projet** :
   - Entrez dans le dossier controller de l'application puis dans le fichier `connexion.php` qui est le fichier de configuration de l'application.
   - Mettez à jour les informations de connexion pour correspondre à votre serveur local XAMPP :
     ```php
            [
                private $host = "localhost";  // Adresse du serveur local '127.0.0.1'
                private $dbname = "stock";  // Nom de la base de données
                private $userName = "root"; // Par défaut, l'utilisateur MySQL est "root"
                private $password = "";  // Par défaut, le mot de passe est vide
            ];
     ```
 ### *Étape 3 : Lancer l’application*
1. **Démarrer XAMPP** (si ce n’est pas déjà fait) :
   - Assurez-vous que les serveurs **Apache** et **MySQL** sont actifs.
2. **Ouvrir l’application dans le navigateur** :
   - Rassurez vous que le dossier de l'application est situer dans le dossier htdocs de Xampp
   - Rendez-vous à l’adresse suivante dans votre navigateur :  
     ```plaintext
     http://localhost/gstock
     ```
