<?php

include("../conn.php");

if(isset($_POST['register-submit'])) {
  $first_name = $_POST["fname"];
  $last_name = $_POST["lname"];
  $email = $_POST["email"];
  $password = $_POST["pass"];
  $cpassword = $_POST["cpass"];

  $check_query = "SELECT * FROM users WHERE email = '$email'";
  $check = mysqli_query($conn, $check_query);

  if(empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($cpassword)) {
    echo "
    <script>
      alert('All fields should be filled!');
      window.location.href = '../register.php';
    </script>
    ";
    return false;
  }

  if(!$check) {
    echo "
      <script>
        alert('Email already exists!');
        window.location.href = '../register.php';
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

  if($password !== $cpassword) {
    echo "
      <script>
        alert('Password and confirm password does not match!');
        window.location.href = '../register.php';
      </script>
    ";
    return false;
  }

  $insert_query = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";
  $insert = mysqli_query($conn, $insert_query);

  if(!$insert) {
    echo "
      <script>
        alert('Insertion failed!');
        window.location.href = '../register.php';
      </script>
    ";
    return false;
  } else {
    echo "
    <script>
        alert('Account successfully created!');
        window.location.href = '../login.php';
      </script>
    ";
    return true;
  }
}