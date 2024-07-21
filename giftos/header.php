<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="./images/favicon.png" type="image/x-icon">

  <title>
    Giftos
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="public/css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="public/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="public/css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          <span>
            Giftos
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shop.php">
                Shop
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="why.php">
                Why Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="testimonial.php">
                Testimonial
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <?php
              session_start();            
              if(isset($_SESSION['email'])) {
                if($_SESSION['role'] == 'admin') {
                  echo "
                    <li class='nav-item'>
                      <a class='nav-link' href='../dashboard/dashboard.php'>Dashboard</a>
                    </li>
                  ";
                }
              }
            ?>
          </ul>
          
          <div class="user_option">
            <?php 
              if(isset($_SESSION['email'])) {
                $first_name = $_SESSION['first_name'];
                echo "
                  <div class='dropdown show'>
                    <a class='dropdown-toggle' style='font-weight: 500; cursor: pointer;' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                      $first_name
                    </a>

                    <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                      <a class='dropdown-item' href='account-info.php'>My Profile</a>
                      <div class='dropdown-divider'></div>
                      <a class='dropdown-item' href='auth/logout_backend.php'>Logout</a>
                    </div>
                  </div>
                ";
              } else {
                echo "
                  <a href='login.php'>
                    <i class='fa fa-user' aria-hidden='true'></i>
                    <span>
                      Login
                    </span>
                  </a>
                ";
              }
            
            ?>
            <a href="cart.php">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <?php 
                include('conn.php');

                if(isset($_SESSION['email'])) {
                  $id = $_SESSION['id'];
                  $itemCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(id) AS count FROM cart WHERE userID=$id"));

                  if($itemCount) {
                    echo "($itemCount[count])";
                  } 
                }
              ?>
            </a>
          </div>
        </div>
      </nav>
    </header>
  </div>
