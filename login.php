<?php include("header.php") ?>

<section class="contact_section layout_padding">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="text-center">
          Login
        </h2>
      </div>
    </div>
    <div class="container">
        <div class="col-md-6  col-lg-5 container-bg mx-auto px-3 px-0">
          <form action="auth/login_backend.php" method="POST">
            <div>
              <input type="email" name="email" required placeholder="Email" />
            </div>
            <div>
              <input type="password" name="password" required placeholder="Password" />
            </div>
            <div class="d-flex">
              <p>Don't have an account?</p>
              <a class="ml-2" href="register.php">Register</a>
            </div>
            <div class="d-flex">
              <button name="login-submit" type="submit">
                LOGIN
              </button>
            </div>
          </form>
        </div>
    </div>
  </section>

<?php include("footer.php") ?>