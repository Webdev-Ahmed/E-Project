<?php

session_start();
session_unset();
echo "
  <script>
    alert('You are now logged out of account!');
    window.location.href = '../index.php';
  </script>
";
