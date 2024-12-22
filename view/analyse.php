<?php
include "header.php";
?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Inclure Chart.js -->
    <style>
        .gaphic {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        .tt {
            text-align: center;
        }

        .chart-container {
            width: 80%;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .cva {
            display: block;
            max-width: 100%;
            height: auto;
        }
    </style>


<div class="home-content">
     <div class="gaphic">
         <h1 class="tt">Analyse des Ventes</h1>
    <div class="chart-container">
        <canvas class="cva" id="salesChart"></canvas>
    </div>
    </div>
</div>
   
   


<?php  
include "flooter.php";
?>



