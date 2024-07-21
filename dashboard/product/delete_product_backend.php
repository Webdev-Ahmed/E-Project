<?php

include('../conn.php');

$id = $_GET['id'];

$select_query = "SELECT * FROM products WHERE `id` = $id";
$select_result = mysqli_query($conn, $select_query);
$product = mysqli_fetch_assoc($select_result);
$delete_query = "DELETE FROM products WHERE `id` = $id";
$delete_res = mysqli_query($conn, $delete_query);

if(!$delete_res) {
  echo "
    <script>
      alert('Deletion failed!');
      window.location.href = '../all-products.php';
    </script>
  ";
  return false;
} else {
  unlink("../../giftos/public/uploads/" . $product['image']);
  echo "
    <script>
      alert('Product has been deleted');
      window.location.href = '../all-products.php';
    </script>
  ";
  return true;
}
