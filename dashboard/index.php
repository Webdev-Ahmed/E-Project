<?php

session_start();
if(isset($_SESSION['email'])) {
  echo "<script>alert('Already logged in!'); window.location.href = './dashboard.php'; </script>";
}

?>

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
      <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center"
      >
        <div class="d-flex align-items-center justify-content-center w-100">
          <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
              <div class="card mb-0">
                <div class="card-body">
                  <a
                    class="text-nowrap logo-img text-center d-block py-3 w-100"
                  >
                    <img
                      src="./assets/images/logos/dark-logo.svg"
                      width="180"
                      alt=""
                    />
                  </a>
                  <p class="text-center">Dashboard for giftos</p>
                  <form action="auth/login_backend.php" method="POST">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"
                        >Email</label
                      >
                      <input
                        type="email"
                        name="email"
                        pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$"
                        class="form-control"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                      />
                    </div>
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label"
                        >Password</label
                      >
                      <input
                        type="password"
                        name="password"
                        pattern="^(?=.*[A-Za-z])(?=.*\d){8,}$"
                        class="form-control"
                        id="exampleInputPassword1"
                      />
                    </div>
                    <button
                      type="submit"
                      name="login-submit"
                      class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"
                      >Login</button
                    >
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
