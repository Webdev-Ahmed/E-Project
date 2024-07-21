<?php 

include('header.php');
include('conn.php');
include('auth/session_check.php');

$id = $_SESSION['id'];
$cartData = mysqli_fetch_all(mysqli_query($conn, "SELECT * FROM cart WHERE userID = $id"), MYSQLI_ASSOC);

?>

<div class="layout_padding">
  <div class="container text-center mb-4">
    <?php if(!empty($cartData)) {
      echo  "<h1>Your Cart</h1>";
    } else {
      echo "<h1>Cart is empty</h1>";
    } ?>
  </div>
  <div class="col-8 mx-auto">
    <table class="table">
    <?php if(!empty($cartData)) {
      echo "
        <thead class='text-center'>
          <th>Preview</th>
          <th>Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Actions</th>
        </thead>
      ";
    } ?>
      <tbody style="position: relative;">
        <?php
          $total = 0;
          if(!empty($cartData)){
            foreach($cartData as $x) {
              $cartItem = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id = $x[productID]"));
              $itemQty = $x['item_quantity'];

              $total += ($cartItem['price'] * $itemQty);
            
              echo "
                <tr class='text-center' style='height: 40px;'>
                  <td><img src='public/uploads/$cartItem[image]' width='70' style='object-fit: cover; object-position:center;' height='70' /></td>
                  <td>$cartItem[name]</td>
                  <td>$itemQty</td>
                  <td>Rs. $cartItem[price]</td>
                  <td><button class='m-0 btn-sm mx-auto'><a href='cart/remove_from_cart_backend.php?id=$x[id]'><i class='fa fa-times'></i></a></button></td>
                </tr>
              ";
            }
          } 
        ?>
      </tbody>
    </table>
    <?php if(!empty($cartData)) {
      echo "
        <div style='align-items: center; gap: 20px; justify-content:center;' class='d-flex mt-5'>
          <h2>Total: </h2>
          <h3 style='font-weight: 400;'>Rs. $total</h3>
        </div>
        <div class='d-flex'>
          <a class='mt-3 btn-anchor' href='purchase/purchase_items_backend.php?id=$id'>Purchase now</a>
        </div>
      ";
    } ?>
  </div>
</div>

<?php include('footer.php') ?>

