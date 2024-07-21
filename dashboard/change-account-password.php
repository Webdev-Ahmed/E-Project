<?php 

include('header.php');
include('./conn.php');

$id = $_SESSION['id'];

if(isset($_POST['change-password-submit'])) {
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  if(empty($password) || empty($cpassword)) {
    echo "
      <script>
        alert('All fields should be filled!');
        window.location.href = './change-account-password.php';
      </script>
    ";
    return false;
  }

  if(strlen($password) < 8) {
    echo "
      <script>
        alert('Password should be atleast 8 characters long');
        window.location.href = './change-account-password.php';
      </script>
    ";
    return false;
  }

  if($password !== $cpassword) {
    echo "
      <script>
        alert('Password and comfirm password does not match');
        window.location.href = './change-account-password.php';
      </script>
    ";
    return false;
  }

  $query = "UPDATE users SET password='$password' WHERE id=$id";
  $res = mysqli_query($conn, $query);

  if(!$res) {
    echo "
      <script>
        alert('Something went wrong: Could not update your password!');
        window.location.href = './change-account-password.php';
      </script>
    ";
    return false;
  }

  $_SESSION['password'] = $password;
  echo "
    <script>
      alert('Your password has been updated');
      window.location.href = './account-info.php';
    </script>
  ";
}

?>

<div class="container-fluid">
  <div class="container-fluid">
    <div class="card w-100">
      <div class="card-body">
        <h3 class="mb-2">Change password</h3>
        <div class="card-body">
          <form method="POST">
            <div class="mb-3">
              <label for="passwordInput" class="form-label"
                >Password</label
              >
              <input
                type="password"
                pattern="^(?=.*[A-Za-z])(?=.*\d){8,}$"
                class="form-control"
                id="passwordInput"
                name="password"
              />
            </div>
            <div class="mb-3">
              <label for="confirmPasswordInput" class="form-label"
                >Confirm password</label
              >
              <input
                type="password"
                class="form-control"
                id="confirmPasswordInput"
                name="cpassword"
              />
            </div>
            <button type="submit" name="change-password-submit" class="btn btn-primary">
              Change password
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php') ?>