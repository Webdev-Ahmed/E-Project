<?php

include('../conn.php');
$id = $_GET['id'];

$query = "DELETE FROM orders WHERE id = $id";
$res = mysqli_query($conn, $query);

if(!$res) {
  echo "
    <script>
      alert('Something went wrong: Could not cancel the order!');
      window.location.href = '../orders.php';
    </script>
  ";
  return false;
}

echo "
  <script>
    alert('The order has been canceled!');
    window.location.href = '../orders.php';
  </script>
";