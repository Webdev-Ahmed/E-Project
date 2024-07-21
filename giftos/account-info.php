<?php include("header.php") ?>

<section class="contact_section layout_padding">
  <div class="container px-0">
    <div class="heading_container ">
      <h2 class="text-center">
        Account info
      </h2>
    </div>
  </div>
  <div class="container">
      <div class="col-md-6  col-lg-5 container-bg mx-auto px-3 px-0">
        <form>
          <div>
            <label>First Name:</label>
            <input value="<?php echo $_SESSION['first_name'] ?>" disabled type="text" name="first_name" />
          </div>
          <div>
            <label>Last Name:</label>
            <input value="<?php echo $_SESSION['last_name'] ?>" disabled type="text" name="last_name" />
          </div>
          <div>
            <label>Email:</label>
            <input value="<?php echo $_SESSION['email'] ?>" disabled type="text" name="email" />
          </div>
          <div>
            <label>Password:</label>
            <input value="<?php echo $_SESSION['password'] ?>" disabled type="text" name="password" />
          </div>
          <div class="d-flex">
            <a class="btn-anchor" href="./edit-account.php?id=<?php echo $_SESSION['id'] ?>">
              EDIT
            </a>
            <a class="btn-anchor" href="./change-password.php">
              CHANGE PASSWORD
            </a>
          </div>
        </form>
      </div>
  </div>
</section>

<?php include("footer.php") ?>