<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/admin_stats.css"/>
    <link rel="icon" href="img/Logo.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <title>iGAPET</title>
</head>
<body>
<div id=header>
    <?php $nom_page="Administration";
    include('v_header.php');?>
</div>
<div id=nav>
    <?php include ('v_admin_menu.php');?>
</div>
<div id="full">
    <div class="quart">
        <h3>Statistiques utilisateur</h3>
        <p>Afficher les dates des dernières inscription & Nombre d'utilisateur</p>
    </div>
    <div class="quart">
        <h3>Statistiques capteur</h3>
        <div class="chart-container">
            <canvas id="myChart" width="40" height="40"></canvas>
            <script>
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ["Lumière", "Humidité","Lumière", "Humidité","Lumière", "Humidité","Lumière", "Humidité","Lumière", "Humidité"],
                        datasets: [{
                            label: ' ',
                            data: [12, 19, 3, 5, 2, 3]
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            </script>
        </div>
    </div>
    <div class="quart">
        <h3>Statistiques affluence</h3>
        <div class="chart-container">
            <canvas id="myChart2" width="40" height="40"></canvas>
            <script>
                var ctx2 = document.getElementById("myChart2").getContext('2d');
                var myChart = new Chart(ctx2, {
                    type: 'line',
                    data: {
                        labels: ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi","Samedi"],
                        datasets: [{
                            label: ' ',
                            data: [12, 19, 3, 50, 2, 3]
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            </script>
        </div>
    </div>
    <div class="quart">
        <h3>Statistiques panne</h3>
        <p>Afficher les dates des dernières pages </p>
    </div>
</div>
</body>
</html>
