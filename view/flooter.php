<script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>
    <script class="MODIFIER PRODUIT">
     // Gestion du popup
    document.querySelectorAll('.btn-modify').forEach(button => {
      button.addEventListener('click', () => {
        const popup = document.getElementById('popup-modify');
        const overlay = document.querySelector('.overlay');

        // Remplir les champs du formulaire avec les données du produit
        document.getElementById('id').value = button.getAttribute('data-id');
        document.getElementById('nom').value = button.getAttribute('data-nom');
        document.getElementById('categorie_M').value = button.getAttribute('data-categorie');
        document.getElementById('quantite_M').value = button.getAttribute('data-quantite');
        document.getElementById('prix_u_M').value = button.getAttribute('data-prix');
        document.getElementById('date_fabrication_M').value = button.getAttribute('data-date-fabrication');
        document.getElementById('date_expiration_M').value = button.getAttribute('data-date-expiration');

        // Afficher le popup et l'overlay
        popup.classList.add('active');
        overlay.classList.add('active');
      });
    });

    // Bouton Annuler
    document.querySelector('.btn-cancel').addEventListener('click', () => {
      document.getElementById('popup-modify').classList.remove('active');
      document.querySelector('.overlay').classList.remove('active');
    });

    // Fermer le popup en cliquant sur l'overlay
    document.querySelector('.overlay').addEventListener('click', () => {
      document.getElementById('popup-modify').classList.remove('active');
      document.querySelector('.overlay').classList.remove('active');
    });

    </script>

    <script class="AJOUTER CLIENT">
    // Gestion du popup "Ajouter un client"
    const btnAddClient = document.getElementById('btn-add-client');
    const popupAddClient = document.getElementById('popup-add-client');
    const overlay = document.getElementById('overlay');
    const btnCancel = document.getElementById('btn-cancel'); 
    const btnSubmit = document.getElementById('btn-submit');

    // Ouvrir le popup
    btnAddClient.addEventListener('click', () => {
      popupAddClient.classList.add('active');
      overlay.classList.add('active');
    });

    // Fermer le popup
    btnCancel.addEventListener('click', () => {
      popupAddClient.classList.remove('active');
      overlay.classList.remove('active');
    });

    // Fermer le popup en cliquant sur l'overlay
    overlay.addEventListener('click', () => {
      popupAddClient.classList.remove('active');
      overlay.classList.remove('active');
    });
  </script>

<script class="VIEW CLIENT">
    // Gestion du popup "Ajouter un client"
    const btnViewClient = document.getElementById('btn-view-client');
    const popupViewClient = document.getElementById('popup-view-client');
    const overlay5 = document.getElementById('overlay');
    const btnCancel5 = document.getElementById('btn-cancel5'); 
    // const btnSubmit5 = document.getElementById('btn-submit');

    // Ouvrir le popup
    btnViewClient.addEventListener('click', () => {
      popupViewClient.classList.add('active');
      overlay5.classList.add('active');
    });

    // Fermer le popup
    btnCancel5.addEventListener('click', () => {
      popupViewClient.classList.remove('active');
      overlay5.classList.remove('active');
    });

    // Fermer le popup en cliquant sur l'overlay
    overlay5.addEventListener('click', () => {
      popupViewClient.classList.remove('active');
      overlay5.classList.remove('active');
    });
  </script>

  <script class="MODIFIER CLIENT">
     
 // Gestion du popup
 document.querySelectorAll('.btn-edit').forEach(button => {
      button.addEventListener('click', () => {
        const popup = document.getElementById('popup-modify2');
        const overlay = document.getElementById('overlay');

// Remplir les champs du formulaire avec les données du produit
        document.getElementById('id').value = button.getAttribute('data-id');
        document.getElementById('nom_c').value = button.getAttribute('data-nom');
        document.getElementById('prenom_c').value = button.getAttribute('data-prenom');
        document.getElementById('adresse_c').value = button.getAttribute('data-adresse');
        document.getElementById('tel_c').value = button.getAttribute('data-tel');
        document.getElementById('email_c').value = button.getAttribute('data-email');

       
        // Afficher le popup et l'overlay
        popup.classList.add('active');
        overlay.classList.add('active');
      });
    });

    // Bouton Annuler
    document.querySelector('.btn-no').addEventListener('click', () => {
      document.getElementById('popup-modify2').classList.remove('active');
      document.querySelector('.overlay').classList.remove('active');
    });

    // Fermer le popup en cliquant sur l'overlay
    document.querySelector('.overlay').addEventListener('click', () => {
      document.getElementById('popup-modify2').classList.remove('active');
      document.querySelector('.overlay').classList.remove('active');
    });
        
    </script>

    <script class="PRIX TOTAL">
    function setprix(){
      var article = document.querySelector('#id_produit');
      var quantite = document.querySelector('#quantite');
      var prix = document.querySelector('#prix');
      var prix_u = article.options[article.selectedIndex].getAttribute("data-prixs_u");

      prix.value =Number(quantite.value) * Number(prix_u);
    }
    </script>

    <script class="IMPRIMER RECU">
    btnPrint =document.getElementById("btnPrint");
    btnPrint.addEventListener("click", () => {
    window.print();
    });
  </script>

  <script class="ANNULER VENTE">
  function annulerVente(id, idProduit, quantite){
  if(confirm("Etes vous sure de vouloir annuler cette vente ?")){
  window.location.href="../index.php?action=Annuler_vente&id="+id+"&id_produit="+idProduit+"&quantite="+quantite+"";
  }
  }
  </script> 

<script class="AJOUTER FOURNISSEUR">
    // Gestion du popup "Ajouter un client"
    const btnAddfournisseur = document.getElementById('btn-add-fournisseur');
    const popupAddfournisseur = document.getElementById('popup-add-fournisseur');
    const overlay2 = document.getElementById('overlay');
    const btnfournisseur = document.getElementById('btn-cancel'); 
    const btnSubmit2 = document.getElementById('btn-submit');

    // Ouvrir le popup
    btnAddfournisseur.addEventListener('click', () => {
      popupAddfournisseur.classList.add('active');
      overlay2.classList.add('active');
    });

    // Fermer le popup
    btnCancel.addEventListener('click', () => {
      popupAddfournisseur.classList.remove('active');
      overlay2.classList.remove('active');
    });

    // Fermer le popup en cliquant sur l'overlay
    overlay.addEventListener('click', () => {
      popupAddfournisseur.classList.remove('active');
      overlay2.classList.remove('active');
    });
  </script>

  <script class="MODIFIER FOURNISSEUR">
     
 // Gestion du popup
 document.querySelectorAll('.btn-edit-fournisseur').forEach(button => {
      button.addEventListener('click', () => {
        const popup = document.getElementById('popup-modify2');
        const overlay = document.getElementById('overlay');

// Remplir les champs du formulaire avec les données du produit
        document.getElementById('id').value = button.getAttribute('data-id');
        document.getElementById('nom_f').value = button.getAttribute('data-nom');
        document.getElementById('prenom_f').value = button.getAttribute('data-prenom');
        document.getElementById('adresse_f').value = button.getAttribute('data-adresse');
        document.getElementById('tel_f').value = button.getAttribute('data-tel');
        document.getElementById('email_f').value = button.getAttribute('data-email');

       
        // Afficher le popup et l'overlay
        popup.classList.add('active');
        overlay.classList.add('active');
      });
    });

    // Bouton Annuler
    document.querySelector('.btn-no').addEventListener('click', () => {
      document.getElementById('popup-modify2').classList.remove('active');
      document.querySelector('.overlay').classList.remove('active');
    });

    // Fermer le popup en cliquant sur l'overlay
    document.querySelector('.overlay').addEventListener('click', () => {
      document.getElementById('popup-modify2').classList.remove('active');
      document.querySelector('.overlay').classList.remove('active');
    });
        
    </script>
    <script class="MODIFIER CATEGORIE">
     
     // Gestion du popup
     document.querySelectorAll('.btn-edit-categorie').forEach(button => {
          button.addEventListener('click', () => {
            const popup = document.getElementById('popup-modify4');
            const overlay = document.getElementById('overlay');
    
    // Remplir les champs du formulaire avec les données du produit
            document.getElementById('id').value = button.getAttribute('data-id');
            document.getElementById('nom_Ca').value = button.getAttribute('data-nom');
    
           
            // Afficher le popup et l'overlay
            popup.classList.add('active');
            overlay.classList.add('active');
          });
        });
    
        // Bouton Annuler
        document.querySelector('.btn-no').addEventListener('click', () => {
          document.getElementById('popup-modify4').classList.remove('active');
          document.querySelector('.overlay').classList.remove('active');
        });
    
        // Fermer le popup en cliquant sur l'overlay
        document.querySelector('.overlay').addEventListener('click', () => {
          document.getElementById('popup-modify4').classList.remove('active');
          document.querySelector('.overlay').classList.remove('active');
        });
            
        </script>

<script>
        // Récupérer les données PHP dans JavaScript
        const dates = <?php echo json_encode(array_column($_SESSION["analyse"], 'date')); ?>; // Dates des ventes
        const sales = <?php echo json_encode(array_column($_SESSION["analyse"], 'total_ventes')); ?>; // Totaux des ventes

        // Configurer le graphique avec Chart.js
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'line', // Type de graphique : ligne
            data: {
                labels: dates, // Les dates sur l'axe X
                datasets: [{
                    label: 'Évolution des ventes (FCFA)',
                    data: sales, // Les montants des ventes sur l'axe Y
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Couleur de fond
                    borderColor: 'rgba(75, 192, 192, 1)', // Couleur de la ligne
                    borderWidth: 2, // Épaisseur de la ligne
                    tension: 0.3, // Courbe lissée
                    pointRadius: 4, // Taille des points
                    pointBackgroundColor: 'rgba(75, 192, 192, 1)', // Couleur des points
                }]
            },
            options: {
                responsive: true, // Rendre le graphique réactif
                plugins: {
                    legend: {
                        display: true, // Afficher la légende
                        position: 'top', // Position de la légende
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Dates',
                            font: {
                                size: 14
                            }
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Montant des ventes (FCFA)',
                            font: {
                                size: 14
                            }
                        },
                        beginAtZero: true // Commencer à zéro sur l'axe Y
                    }
                }
            }
        });
    </script>

  </body>
</html>