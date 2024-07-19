<?php

include("../conn.php");
session_start();

if(isset($_POST['update-account-submit'])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $id = $_SESSION['id'];

  echo $first_name, $last_name, $email, $id;

  if(empty($first_name) || empty($last_name) || empty($email)) {
    echo "
      <script>
        alert('All fields should be filled!');
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
        alert('Something went wrong: Could not update the info!');
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
      alert('The info has been updated');
      window.location.href = '../account-info.php';
    </script>
  ";
}