<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Graph</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
    <style>
        #myChart {
            width: 100%;
            height: 300px;
        }
        .chart-container {
            width: 45%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.685);  
           
        }
        #myChart2 {
            width: 100%;
            height:300px;
        }
        
        .chart-container-wave {
            width: 500px;
            max-width: 600px;
            margin: auto;
            text-align: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.685);  
        }
        #myChart3 {
            width: 800px;
            height:300px;
        }
        .card{
            width: 300px;
            height:150px;
            border-radius: 5px;
            background-color: white;
            text-align: center;
            align-content: center;
            color:orange;
            font-family: sans-serif;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.685);  
        }
    </style>

</head>
<body style="background-color:#E8EFFA">
    <div class="display-card" style=" width: 95%;height:180px;padding-top:30px; display: flex; gap:20px;padding-left:30px;">
        <div class="card"><i style="font-size: 50px;" class="bi bi-person-heart" ></i><br>30k</div>
        <div class="card"><i style="font-size: 50px;" class="bi bi-hourglass-split"></i><br>114:36 Hrs</div>
        <div class="card"><i style="font-size: 50px;" class="bi bi-currency-rupee"></i><br>Rs.352130</div>
        <div class="card"><i style="font-size: 50px;" class="bi bi-bag-heart"></i><br>20 k</div>
        <div class="card"><i style="font-size: 50px;"class="bi bi-truck"></i><br>18 k</div>
        <div class="card"><i style="font-size: 50px;" class="bi bi-chat-heart"></i><br>5.6 k</div>
    </div>
    <div class="container-first" style=" background-color:#E8EFFA; display:flex;flex-wrap:nowrap; padding-top: 20px;padding-left:10px;gap:20px;">
    <div class="chart-container" style="background-color: white;height:100%;max-height:600px; padding-left:50px;padding-bottom:20px;padding-right:50px; border-radius: 5px;">
        <canvas id="myChart"></canvas>
    </div>
    <canvas id="myChart2" style="width:100%;max-width:45%;height:100%;height:300px;padding-bottom:20px;background-color: white; 
    padding-left:50px;padding-right:50px; border-radius: 5px;box-shadow: 0 0 5px rgba(0, 0, 0, 0.685);  "></canvas></div>

<canvas id="myChart3" style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.685);  margin-left:20px;margin-right:10px;margin-bottom:10px; margin-top:20px;max-width:1000px;height:300px;background-color:white; padding-left:50px;padding-bottom:20px;padding-right:50px; border-radius: 5px;"></canvas>

<script>
        const xValue = ['January','February','March','April','May','June','July','August','September','October','November','December'];

        new Chart("myChart3", {
            type: "line",
            data: {
                labels: xValue,
                datasets: [
                    { 
                        label: 'Fishes',
                        data: [1000,3000,5000,2500,1000,1110,3000,2000,5000,2478,2478,4000],
                        backgroundColor:'rgba(57, 110, 160, 0.363)',
                        borderColor:'transparent',
                        fill: true,
                    },
                    { 
                        label: 'Plants',
                        data: [1600,3000,1000,4000,2000,5000,7000,5000,6000,2000,1000,4000],
                        backgroundColor:'rgba(221, 84, 226, 0.363)',
                        borderColor:'transparent',
                        fill: true,
                    },
                    { 
                        label: 'Accessories',
                        data: [300,700,2000,5000,6000,4000,2000,1000,1000,3000,1000,2000],
                        backgroundColor:'#FFEDBB',
                        borderColor:'transparent',
                        fill: true,
                    }
                ]
            },
            options: {
                    title: {
                        display: true,
                        text: "Products Sale Graph",
                    },
                    legend: {
                        display: true,
                        position: 'top',
                    }
            }
        });
    </script>
</body >
<script>
         const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                datasets: [{
                    label: 'Sample Data',
                    data: [1200, 1700, 1350, 1500, 1750, 1300],
                    backgroundColor: '#59876e',                    
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 2000
                    }
                }
            }
        });
    </script>
    <script>
const xValues = ["Italy", "France", "Spain", "USA", "India"];
const yValues = [55, 49, 44, 24, 15];
const barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart2", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "World Wide sales 2024"
    }
  }
});
</script>

</html>
