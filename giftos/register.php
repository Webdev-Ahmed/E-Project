<?php include("header.php") ?>

<section class="contact_section layout_padding">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="text-center">
          Register
        </h2>
      </div>
    </div>
    <div class="container">
        <div class="col-md-6  col-lg-5 container-bg mx-auto px-3 px-0">
          <form action="auth/register_backend.php" method="POST">
            <div class="d-flex">
              <input type="text" name="fname" class="mr-2" required placeholder="First Name" />
              <input type="text" name="lname" class="ml-2" required placeholder="Last Name" />
            </div>
            <div>
              <input type="email" name="email" required placeholder="Email" />
            </div>
            <div>
              <input type="password" name="pass" required placeholder="Password" />
            </div>
            <div>
              <input type="password" name="cpass" required placeholder="Confirm Password" />
            </div>
            <div class="d-flex">
              <p>Already have an account?</p>
              <a class="ml-2" href="login.php">Login</a>
            </div>
            <div class="d-flex">
              <button name="register-submit" type="submit">
                REGISTER
              </button>
            </div>
          </form>
        </div>
    </div>
  </section>

<?php include("footer.php") ?>