<?php

include("../conn.php");
session_start();

if(isset($_POST['update-account-submit'])) {
  $id = $_SESSION['id'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];

  echo $first_name, $last_name, $email;

  if(empty($first_name) || empty($last_name) || empty($email)) {
    echo "
      <script>
        alert('All fiels should be filled');
        window.location.href = '../edit-account.php';
      </script>
    ";
    return false;
  }

  $query = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email' WHERE id=$id";
  $res = mysqli_query($conn, $query);

  if(!$res) {
    echo "
      <script>
        alert('Something went wrong: Can not update your account info');
        window.location.href = '../edit-account.php';
      </script>
    ";
    return false;
  }

  $_SESSION['first_name'] = $first_name;
  $_SESSION['last_name'] = $last_name;
  $_SESSION['email'] = $email;
  echo "
    <script>
      alert('Account info has been updated');
      window.location.href = '../account-info.php';
    </script>
  ";

}