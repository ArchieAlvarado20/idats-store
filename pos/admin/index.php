<?php
require_once('partials/_head.php');
require_once('partials/_sidebar.php');
?>
<style>
  @import url('dist/css/brand-style.css');
</style>
<body>
	
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->

	  
    <?php
    require_once('partials/_topnav.php');
    ?>
  
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <?= alertMessage();?>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php
                 $query = "SELECT sum(price) AS count FROM tblcart";
                 $query_result = mysqli_query($con, $query);
                 while($row = mysqli_fetch_assoc($query_result))
                 {
                   $sales = $row['count'];
                 }
               $query = "SELECT COUNT(*) AS count FROM tblproduct";
               $query_result = mysqli_query($con, $query);
               while($row = mysqli_fetch_assoc($query_result))
               {
                 $count = $row['count'];
               }
               $query = "SELECT sum(qty) AS qty FROM tblproduct";
               $query_result = mysqli_query($con, $query);
               while($row = mysqli_fetch_assoc($query_result))
               {
                 $qty = $row['qty'];
               }
               $query = "SELECT sum(status = 1) AS stock FROM tblproduct";
               $query_result = mysqli_query($con, $query);
               while($row = mysqli_fetch_assoc($query_result))
               {
                 $stock = $row['stock'];
               }
              //  $query = "SELECT * FROM tblproduct as critical WHERE status = 1 Limit 1";
              //  $query_result = mysqli_query($con, $query);
              //  while($row = mysqli_fetch_assoc($query_result))
              //  {
              //    $critical = $row['critical'];
              //  }
               
               ?>
                <h3><?=$sales ?></h3>

                <p>Daily Sales</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-camera"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
               
                <h3><?=$count?><sup style="font-size: 20px"></sup></h3>

                <p>Product Line</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="product.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3><?=$qty?><sup style="font-size: 20px"></sup></h3>

                <p>Stocks</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $stock?></h3>

                <p>Critical Items</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div>
	   <!-- Footer -->
       </section>
       <!--chart section--> 
       <section class="content m-5">
       <!-- DONUT CHART -->
       <div class="card col-md-12">
              <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <!-- <i class="fas fa-times"></i> -->
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 90%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </section>
    <!-- /.content -->
  </div>
  </div>
    <?php require_once('partials/_footer.php'); ?>

  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
  <script>
     $(function () {
   //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

})

    //fade-out alert
$('.alert').show();
setTimeout(function() {
    $('.alert').fadeOut(400);
}, 5000);

</script>






