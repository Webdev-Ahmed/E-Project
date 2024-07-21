<?php

include('../conn.php');
$id = $_GET['id'];

$query = "DELETE FROM cart WHERE id=$id";
$res = mysqli_query($conn, $query);

if(!$res) {
  echo "
    <script>
      alert('Something went wrong: Could remove the product!');
      window.location.href = '../cart.php';
    </script>
  ";
  return false;
} 

echo "
  <script>
    alert('Product has been removed');
    window.location.href = '../cart.php';
  </script>
";