<?php

session_start();
if(empty($_SESSION['email'])) {
  echo "<script>alert('You can not acces this page without logging in!'); window.location.href = './index.php'; </script>";
}