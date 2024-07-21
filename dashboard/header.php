<?php include('auth/session_check.php') ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Modernize Free</title>
    <link
      rel="shortcut icon"
      type="image/png"
      href="./assets/images/logos/favicon.png"
    />
    <link rel="stylesheet" href="./assets/css/styles.min.css" />
  </head>

  <body>
    <!--  Body Wrapper -->
    <div
      class="page-wrapper"
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin6"
      data-sidebartype="full"
      data-sidebar-position="fixed"
      data-header-position="fixed"
    >
      <!-- Sidebar Start -->
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div
            class="brand-logo d-flex align-items-center justify-content-between"
          >
            <a href="./dashboard.php" class="text-nowrap logo-img">
              <img
                src="./assets/images/logos/dark-logo.svg"
                width="180"
                alt=""
              />
            </a>
            <div
              class="close-btn d-xl-none d-block sidebartoggler cursor-pointer"
              id="sidebarCollapse"
            >
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="./dashboard.php"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-layout-dashboard"></i>
                  </span>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">PRODUCT OPTIONS</span>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="./add-product.php"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-plus"></i>
                  </span>
                  <span class="hide-menu">Add product</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="./all-products.php"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-layout-grid"></i>
                  </span>
                  <span class="hide-menu">All products</span>
                </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">USERS OPTION</span>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="./all-users.php"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-users"></i>
                  </span>
                  <span class="hide-menu">All users</span>
                </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">ORDERS OPTION</span>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="./orders.php"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-box"></i>
                  </span>
                  <span class="hide-menu">All orders</span>
                </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">AUTH</span>
              </li>
              <?php
              
              if(empty($_SESSION['email'])) {
                echo "
                  <li class='sidebar-item'>
                    <a
                      class='sidebar-link'
                      href='./index.php'
                      aria-expanded='false'
                    >
                      <span>
                        <i class='ti ti-logout'></i>
                      </span>
                      <span class='hide-menu'>Login</span>
                    </a>
                  </li>
                ";
              } else {
                echo "
                  <li class='sidebar-item'>
                    <a
                      class='sidebar-link'
                      href='auth/logout_backend.php'
                      aria-expanded='false'
                    >
                      <span>
                        <i class='ti ti-login'></i>
                      </span>
                      <span class='hide-menu'>Log out</span>
                    </a>
                  </li>
                ";
              }
              ?>
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!--  Sidebar End -->
      <!--  Main wrapper -->
      <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
          <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
              <li class="nav-item d-block d-xl-none">
                <a
                  class="nav-link sidebartoggler nav-icon-hover"
                  id="headerCollapse"
                  href="javascript:void(0)"
                >
                  <i class="ti ti-menu-2"></i>
                </a>
              </li>
            </ul>
            <div
              class="navbar-collapse justify-content-end px-0"
              id="navbarNav"
            >
              <ul
                class="navbar-nav flex-row ms-auto align-items-center justify-content-end"
              >
                <li class="nav-item dropdown">
                  <a
                    class="nav-link"
                    href="javascript:void(0)"
                    id="drop2"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    style="display: flex; align-items: center; gap: 6px"
                  >
                    <i class="ti ti-user" style="font-size: 18px; margin-bottom: 10px"></i>
                    <h6 class="nav-link" style="font-size: 16px; padding: 0 !important;"><?php echo $_SESSION['first_name'] ?></h6>
                  </a>
                  <div
                    class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                    aria-labelledby="drop2"
                  >
                    <div class="message-body">
                      <a
                        href="account-info.php"
                        class="d-flex align-items-center gap-2 dropdown-item"
                      >
                        <i class="ti ti-user fs-6"></i>
                        <p class="mb-0 fs-3">My Profile</p>
                      </a>
                      <a
                        href="auth/logout_backend.php"
                        class="btn btn-outline-primary mx-3 mt-2 d-block"
                        >Logout</a
                      >
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </header>