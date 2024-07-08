<?php

session_start();
echo "
  <script>
    alert('You are now logged out of account!');
    window.location.href = '../index.php';
  </script>
";
session_unset();