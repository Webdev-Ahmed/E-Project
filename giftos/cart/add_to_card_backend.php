<?php

include("../conn.php");
session_start();
$user_id = $_SESSION['id'];
$product_id = $_GET['p_id'];
$item_qty = $_POST['item_qty'];

if(empty($_SESSION['email'])) {
  echo "
    <script>
      alert('You have to login first to add this product to cart!');
      window.location.href = '../login.php';
    </script>
  ";
  return false;
}

if($item_qty < 1) {
  echo "
    <script>
      alert('Item quantity should be atleast be 1!');
      window.location.href = '../shop-item.php?id=$product_id';
    </script>
  ";
  return false;
}

$query = "INSERT INTO cart (userID, productID, item_quantity) VALUES ($user_id, $product_id, $item_qty)";
$res = mysqli_query($conn, $query);

if(!$res) {
  echo "
    <script>
      alert('Something went wrong: Could not add the product to cart!');
      window.location.href = '../shop.php';
    </script>
  ";
  return false;
}

echo "
  <script>
    alert('Product has been added to cart');
    window.location.href = '../cart.php';
  </script>
";
