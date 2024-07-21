<?php 

include("header.php");
include("conn.php");

$projectCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(first_name) AS all_users FROM users"));
$totalProducts = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(name) AS all_products FROM products"));
$totalEarning = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(order_price) AS total FROM orders"));

$topFiveOrders = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM orders ORDER BY ordered_at LIMIT 5"), MYSQLI_ASSOC);
$topFourProducts = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM products ORDER BY created_at LIMIT 4"), MYSQLI_ASSOC);

?>

        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row">
            <div class="col-lg-8 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-body">
                  <div class="card-body pb-0">
                    <h1 class="card-title">Total customers:</h1>
                    <div class="card-body">
                      <h1><?php echo $projectCount['all_users'] ?></h1>
                    </div>
                  </div>
                  <div class="card-body">
                    <h1 class="card-title">Total products:</h1>
                    <div class="card-body">
                      <h1><?php echo $totalProducts['all_products'] ?></h1>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
            <div class="col-lg-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card overflow-hidden">
                    <div class="card-body p-4">
                      <h3 class="card-title mb-9 fw-semibold">
                        Earnings
                      </h3>
                      <div class="row align-items-center">
                        <div class="col-8">
                          <h5>EarningGoal:</h5>
                          <h6 style="opacity: .7;" class="fw-normal mb-3">Rs. 1,000,000</h6>
                          <h5>TotalEarning:</h5>
                          <h6 style="opacity: .7;" class="fw-normal mb-3">Rs. <?php echo $totalEarning['total'] ?></h6>
                        </div>
                        <div class="col-4">
                          <div class="d-flex justify-content-center">
                            <div id="breakup"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
            </div>
          </div>
          <div class="card w-100">
            <div class="card-body p-4">
              <h5 class="card-title fw-semibold mb-4">
                Recent Orders
              </h5>
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <?php
                    
                      if(!empty($topFiveOrders)) {
                        echo "
                          <tr>
                            <th class='border-bottom-0'>
                              <h6 class='fw-semibold mb-0'>Id</h6>
                            </th>
                            <th class='border-bottom-0'>
                              <h6 class='fw-semibold mb-0'>Order ID</h6>
                            </th>
                            <th class='border-bottom-0'>
                              <h6 class='fw-semibold mb-0'>Quantity</h6>
                            </th>
                            <th class='border-bottom-0'>
                              <h6 class='fw-semibold mb-0'>Price</h6>
                            </th>
                            <th class='border-bottom-0'>
                              <h6 class='fw-semibold mb-0'>User ID</h6>
                            </th>
                          </tr>
                        ";
                      }
                    
                    ?>
                  </thead>
                  <tbody>
                    <?php 
                      if(!empty($topFiveOrders)) {
                        foreach($topFiveOrders as $x) {
                          echo "
                            <tr>
                              <td class='border-bottom-0'>
                                <h6 class='fw-semibold mb-0'>$x[id]</h6>
                              </td>
                              <td class='border-bottom-0'>
                                <h6 class='fw-semibold mb-1'>$x[order_id]</h6>
                              </td>
                              <td class='border-bottom-0'>
                                <p class='mb-0 fw-normal'>$x[order_quantity]</p>
                              </td>
                              <td class='border-bottom-0'>
                                <h6 class='fw-semibold mb-0 fs-4'>Rs. $x[order_price]</h6>
                              </td>
                              <td class='border-bottom-0'>
                                <p class='fw-semibold mb-0 fs-4'>$x[user_id]</p>
                              </td>
                            </tr>
                          ";
                        }
                      }
                    ?>
                  </tbody>
                </table>
                <?php 

                  if(!empty($topFiveOrders)) {
                    echo "
                      <a href='orders.php' class='btn btn-primary mt-4'>See All</a>
                    ";
                  } else {
                    echo "
                      <h3 class='text-center mt-2 mb-4'>There are no recent orders!</h3>
                    ";
                  }

                ?>
              </div>
            </div>
          </div>
          <div class="row">
            <h4 class="fw-semibold mb-4">Latest products</h2>
            <?php

              foreach($topFourProducts as $x) {
                echo "
                  <div class='col-sm-6 col-xl-3'>
                    <div class='card overflow-hidden rounded-2'>
                      <div class='position-relative'>
                        <a href='item.php?id=$x[id]'
                          ><img
                            src='../giftos/public/uploads/$x[image]'
                            class='card-img-top rounded-0'
                            height='270'
                            style='object-fit:cover;'
                            alt='$x[name]'
                        /></a>
                      </div>
                      <div class='card-body pt-3 p-4'>
                        <h6 class='fw-semibold fs-4'>$x[name]</h6>
                        <div
                          class='d-flex align-items-center justify-content-between'
                        >
                          <h6 class='fw-semibold fs-4 mb-0'>
                            Rs. $x[price]
                          </h6>
                        </div>
                      </div>
                    </div>
                  </div>
                ";
              }
            
            ?>
          </div>
        </div>
      </div>
    </div>
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/sidebarmenu.js"></script>
    <script src="./assets/js/app.min.js"></script>
    <script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
    <script>
      totalEarning = <?php echo $totalEarning['total'] ?>;

      $(function () {
        earningGoal = 1000000;
        console.log(totalEarning);

        var breakup = {
          color: "#adb5bd",
          series: [totalEarning, earningGoal],
          chart: {
            width: 180,
            type: "donut",
            fontFamily: "Plus Jakarta Sans', sans-serif",
            foreColor: "#adb0bb",
          },
          plotOptions: {
            pie: {
              startAngle: 0,
              endAngle: 360,
              donut: {
                size: "75%",
              },
            },
          },
          stroke: {
            show: false,
          },

          dataLabels: {
            enabled: false,
          },

          legend: {
            show: false,
          },
          colors: ["#5D87FF", "#ecf2ff", "#F9F9FD"],

          responsive: [
            {
              breakpoint: 991,
              options: {
                chart: {
                  width: 150,
                },
              },
            },
          ],
          tooltip: {
            theme: "dark",
            fillSeriesColor: false,
          },
        };

        var chart = new ApexCharts(document.querySelector("#breakup"), breakup);
        chart.render();
      });

    </script>
  </body>
</html>
