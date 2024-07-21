<?php

include("../conn.php");

if(isset($_POST['login-submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if(empty($email) || empty($password)) {
    echo "
      <script>
        alert('All fields should be filled!');
        window.location.href = '../login.php';
      </script>
    ";
    return false;
  }

  if(strlen($password) <= 8) {
    echo "
      <script>
        alert('Password should be atleast 8 characters long!');
        window.location.href = '../login.php';
      </script>
    ";
    return false;
  }

  $user_query = "SELECT * FROM users WHERE email = '$email'";
  $user = mysqli_query($conn, $user_query);

  if(!$user) {
    echo "
      <script>
        alert('No account exists with this email');
        window.location.href = '../login.php';
      </script>
    ";
    return false;
  }

  $user_data = mysqli_fetch_assoc($user);

  if($password !== $user_data['password']) {
    echo "
      <script>
        alert('Password or email is incorrect');
        window.location.href = '../login.php';
      </script>
    ";
    return false;
  } 

  session_start();
  $_SESSION['id'] = $user_data['id'];
  $_SESSION['first_name'] = $user_data['first_name'];
  $_SESSION['last_name'] = $user_data['last_name'];
  $_SESSION['email'] = $user_data['email'];
  $_SESSION['password'] = $user_data['password'];
  $_SESSION['role'] = $user_data['role'];
  echo "
    <script>
      alert('Login successfully');
      window.location.href = '../index.php';
    </script>
  ";

}