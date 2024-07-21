<?php

  include('header.php');
  include('./conn.php');

  if(isset($_POST['change-password-submit'])) {
    $id = $_SESSION['id'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if(empty($password) || empty($cpassword)) {
      echo "
        <script>
          alert('All fiels should be filled');
          window.location.href = '../account-info.php';
        </script>
      ";
      return false;
    }

    if(strlen($password) < 8) {
      echo "
        <script>
          alert('Password should be atleast 8 characters long!');
          window.location.href = 'change-password.php';
        </script>
      ";
      return false;
    }

    $query = "UPDATE users SET password='$password' WHERE id=$id";
    $res = mysqli_query($conn, $query);

    if(!$res) {
      echo "
        <script>
          alert('Something went wrong: Cannot update your password');
          window.location.href = 'change-password.php';
        </script>
      ";
      return false;
    }

    $_SESSION['password'] = $password;
    echo "
      <script>
        alert('Password has been changed');
        window.location.href = './account-info.php';
      </script>
    ";
  }

?>

<section class="contact_section layout_padding">
  <div class="container px-0">
    <div class="heading_container ">
      <h2 class="text-center">
        Change password
      </h2>
    </div>
  </div>
  <div class="container">
      <div class="col-md-6  col-lg-5 container-bg mx-auto px-3 px-0">
        <form method="POST">
          <div>
            <label>Password:</label>
            <input type="password" name="password" pattern="^(?=.*[A-Za-z])(?=.*\d){8,}$" required />
          </div>
          <div>
            <label>Confirm password:</label>
            <input type="password" name="cpassword" required />
          </div>
          <div class="d-flex">
            <button name="change-password-submit" type='submit'>
              CHANGE PASSWORD
            </button>
          </div>
        </form>
      </div>
  </div>
</section>

<?php include('footer.php') ?>