<?php include("header.php") ?>

<section class="contact_section layout_padding">
  <div class="container px-0">
    <div class="heading_container ">
      <h2 class="text-center">
        Edit account info
      </h2>
    </div>
  </div>
  <div class="container">
      <div class="col-md-6  col-lg-5 container-bg mx-auto px-3 px-0">
        <form action="account/edit_info_backend.php" method="POST">
          <div>
            <label>First Name:</label>
            <input required value="<?php echo $_SESSION['first_name'] ?>" type="text" name="first_name" />
          </div>
          <div>
            <label>Last Name:</label>
            <input required value="<?php echo $_SESSION['last_name'] ?>" type="text" name="last_name" />
          </div>
          <div>
            <label>Email:</label>
            <input required value="<?php echo $_SESSION['email'] ?>" type="email" name="email" />
          </div>
          <div class="d-flex">
            <button name="update-account-submit" type="submit">
              UPDATE ACCOUNT INFO
            </button>
          </div>
        </form>
      </div>
  </div>
</section>

<?php include("footer.php") ?>