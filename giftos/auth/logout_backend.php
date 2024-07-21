<?php

session_start();
echo "
  <script>
    window.location.href = '../login.php';
  </script>
";
session_unset();