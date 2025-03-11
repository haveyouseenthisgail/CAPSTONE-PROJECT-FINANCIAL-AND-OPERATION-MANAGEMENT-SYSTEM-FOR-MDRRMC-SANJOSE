 <?php
  session_start();
  if (!isset($_SESSION['admin_id'])) {
    header('Location: ../index.php');
    exit();
  }

  ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
   <title>Admin | Dashboard</title>
   <?php include 'link.php' ?>
 </head>


 <body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">


     <?php include 'sidebar.php' ?>


     <div class="content-wrapper">
       <div class="content-header">
         <div class="container-fluid">
           <div class="row mb-2">
             <div class="col-sm-6">
               <h1 class="m-0">Dashboard</h1>
             </div>
             <div class="col-sm-6">
             </div>
           </div>
         </div>
       </div>
       <section class="content">
         <div class="container-fluid">

           <div class="row">
             <div class="col-md-12">
               <div class="small-box bg-info" style="background-color:unset !important;border-radius:1rem;border: 2px solid #1E90FF;">
                 <div class="inner" style="background:#D3D3D3;border-top-left-radius:14px;border-top-right-radius:14px;display:grid; grid-template-columns:repeat(2,1fr)">
                   <div class="box__heading" style="align-self: center;">
                     <h2 style="color: #1E90FF;">Expired Supplies</h2>

                   </div>
                   <div class="supply__img flex flex-justify--end">
                     <img src="/dist/img/custom-img/supply-chain (2).png" alt="">
                   </div>
                 </div>

                 <a href="expired-supplies.php" class="small-box-footer" style="background-color: #908686;border-bottom-left-radius:10.8px;border-bottom-right-radius:10.8px;font-size:1.4rem;">Details <i class="fas fa-arrow-circle-right"></i></a>
               </div>
             </div>
           </div>
         </div>

       </section>
       <section class="content">
         <div class="container-fluid">
           <div class="row">
             <div class="col-md-12">

               <div class="card card-danger">
                 <div class="card-header" style="background-color: #1E90FF !important;">
                   <h3 class="card-title">Stock Supplies Chart</h3>
                   <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                       <i class="fas fa-minus"></i>
                     </button>
                   </div>
                 </div>
                 <div class="card-body">
                   <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                 </div>
               </div>

               <div class="row">
               <div class="col-md-6">

               <div class="card card-danger ">
                 <div class="card-header" style="background-color: #1E90FF !important;">
                   <h3 class="card-title"> Disbursement Chart (AIP-GENFUND) </h3>
                   <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                       <i class="fas fa-minus"></i>
                     </button>
                   </div>
                 </div>
                 <div class="card-body">
                   <canvas id="genfundChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                 </div>
               </div>
               </div>
<div class="col-md-6">
               <div class="card card-danger ">
                 <div class="card-header" style="background-color: #1E90FF !important;">
                   <h3 class="card-title">Disbursement Chart (AIP-STF)</h3>
                   <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                       <i class="fas fa-minus"></i>
                     </button>
                   </div>
                 </div>
                 <div class="card-body">
                   <canvas id="stfChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                 </div>
               </div>
               </div>
               </div>


             </div>





           </div>

         </div>
       </section>
     </div>
   </div>
   </div>



   <?php include 'script.php' ?>
   <script>
     $(function() {
       // Fetch stock data and render chart
       function fetchStockData() {
         $.ajax({
           url: '../inc/get_stock_data.php', // PHP script
           method: 'GET',
           dataType: 'json',
           success: function(data) {
             if (data.error) {
               console.error(data.error);
               return;
             }

             // Prepare labels (item_name) and data (item_quantity)
             var labels = data.map(item => item.item_name);
             var quantities = data.map(item => item.item_quantity);

             // Chart data
             var donutData = {
               labels: labels, // All item names
               datasets: [{
                 data: quantities, // Corresponding item quantities
                 backgroundColor: generateColors(labels.length) // Dynamic colors
               }]
             };

             // Chart options
             var donutOptions = {
               maintainAspectRatio: false,
               responsive: true,
               legend: {
                 display: true
               }
             };

             // Render chart
             var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
             new Chart(donutChartCanvas, {
               type: 'doughnut',
               data: donutData,
               options: donutOptions
             });
           },
           error: function(xhr, status, error) {
             console.error('AJAX Error: ', error);
           }
         });
       }

       // Helper function to generate unique colors
       function generateColors(count) {
         var colors = [];
         for (var i = 0; i < count; i++) {
           colors.push(`hsl(${(i * 360 / count) % 360}, 70%, 50%)`); // Generate hues
         }
         return colors;
       }

       // Initial fetch
       fetchStockData();
     });




     $(function() {
       // Function to fetch data via AJAX and render the pie chart
       function fetchGenFundData() {
         $.ajax({
           url: '../inc/getGenFundData.php', // Replace with the actual path to your PHP file
           method: 'GET',
           dataType: 'json',
           success: function(response) {
             // Update the pie chart with fetched data
             var pieChartCanvas = $('#genfundChart').get(0).getContext('2d');
             var pieData = {
               labels: ['Funds disbursed', 'Funds remaining'],
               datasets: [{
                 data: [response.funds_disbursed, response.funds_remaining],
                 backgroundColor: ['#00a65a', '#f56954'], // Green for disbursed, Red for remaining
               }]
             };

             var pieOptions = {
               maintainAspectRatio: false,
               responsive: true,
               legend: {
                 display: true,
                 labels: {
                   generateLabels: function(chart) {
                     return [{

                         text: 'Funds remaining',
                         fillStyle: '#f56954'

                       }, // Green label
                       {
                         text: 'Funds disbursed',
                         fillStyle: '#00a65a'

                       } // Red label
                     ];
                   }
                 }
               }
             };

             // Create the chart
             new Chart(pieChartCanvas, {
               type: 'pie',
               data: pieData,
               options: pieOptions
             });
           },
           error: function(xhr, status, error) {
             console.error("Error fetching data: " + error);
           }
         });
       }

       // Call the function to fetch data and render the chart
       fetchGenFundData();
     });



     $(function() {
       // Function to fetch data via AJAX and render the STF chart
       function fetchStfFundData() {
         $.ajax({
           url: '../inc/getstfFundData.php', // Replace with the actual path to your PHP file
           method: 'GET',
           dataType: 'json',
           success: function(response) {
             // Update the STF pie chart with fetched data
             var pieChartCanvas = $('#stfChart').get(0).getContext('2d');
             var pieData = {
               labels: ['Funds disbursed', 'Funds remaining'],
               datasets: [{
                 data: [response.funds_disbursed, response.funds_remaining],
                 backgroundColor: ['#00a65a', '#f56954'], // Green for disbursed, Red for remaining
               }]
             };

             var pieOptions = {
               maintainAspectRatio: false,
               responsive: true,
               legend: {
                 display: true,
                 labels: {
                   generateLabels: function(chart) {
                     return [{
                         text: 'Funds remaining',
                         fillStyle: '#f56954'
                       }, // Green label
                       {

                         text: 'Funds disbursed',
                         fillStyle: '#00a65a'
                       } // Red label
                     ];
                   }
                 }
               }
             };

             // Create the STF chart
             new Chart(pieChartCanvas, {
               type: 'pie',
               data: pieData,
               options: pieOptions
             });
           },
           error: function(xhr, status, error) {
             console.error("Error fetching STF data: " + error);
           }
         });
       }

       // Call the function to fetch data and render the chart
       fetchStfFundData();
     });
   </script>
 </body>

 </html>