<?php

include('../conn.php');
$id = $_GET['id'];

$cartData = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM cart WHERE userID = $id"), MYSQLI_ASSOC);

foreach($cartData as $x) {
  $order_id = time();
  $order_quantity = $x['item_quantity'];
  $user_id = $id;
  $product_id = $x['productID'];
  $cartItem = mysqli_fetch_assoc(mysqli_query($conn, "SELECT price FROM products WHERE id=$product_id"));
  $order_price = ($cartItem['price'] * $order_quantity);
  $query = "INSERT INTO orders (order_id, order_quantity, order_price, user_id, product_id) VALUES ($order_id, $order_quantity, $order_price, $user_id, $product_id)";
  $res = mysqli_query($conn, $query);
}

$cartEmpty = mysqli_query($conn, "DELETE FROM cart WHERE userID = $id");
echo "
  <script>
    window.location.href = '../purchase.php';
  </script>
";