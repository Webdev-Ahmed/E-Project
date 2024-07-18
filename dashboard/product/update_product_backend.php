<?php

include('../conn.php');

if(isset($_POST['update-product-submit'])) {
  $id = $_GET['id'];
  $name = $_POST['p_name'];
  $description = $_POST['p_description'];
  $category = $_POST['p_category'];
  $price = $_POST['p_price'];
  $quantity = $_POST['p_quantity'];

  $img = $_FILES['p_image'];
  
  if(empty($name) && empty($description) && empty($price) && empty($quantity)) {
    echo "
      <script>
        alert('Atleast one field should be changed!');
        window.location.href = '../edit-product.php';
      </script>
    ";
    return false;
  };

  if(empty($img['name'])) {
    $query = "UPDATE products SET name = '$name', description = '$description', category = '$category', price = '$price', quantity = '$quantity' WHERE id = $id";
    $res = mysqli_query($conn, $query);

    if(!$res) {
      echo "
        <script>
          alert('Something went wrong: Could\'nt update the product!');
          window.location.href = '../edit-product.php';
        </script>
      ";
      return false;
    }

    echo "
      <script>
        alert('Product has been updated!');
        window.location.href = '../all-products.php';
      </script>
    ";
    return true;

    exit();
  } 
  
  if(isset($img['name'])) {
    $target_dir = "../../giftos/public/uploads/";
    $target_file = $target_dir . basename($_FILES['p_image']['name']);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $oldImageName = $_POST['old_image_name'];

    $img_name = time() . "." . $imageFileType;

    if($imageFileType !== "jpg" && $imageFileType !== "jpeg" && $imageFileType !== "PNG" && $imageFileType !== "png" && $imageFileType !== "webp") {
      echo "
        <script>
          alert('The file should be an image');
          window.location.href = '../edit-product.php';
        </script>
      ";
      return false;
    }
  
    if($_FILES['p_image']['size'] > 5_000_000) {
      echo "
        <script>
          alert('File size should be less then 5mb');
          window.location.href = '../edit-product.php';
        </script>
      ";
      return false;
    }

    $query = "UPDATE products SET name = '$name', description = '$description', category = '$category', price = '$price', quantity = '$quantity', image = '$img_name' WHERE id = $id";
    $res = mysqli_query($conn, $query);

    if(!$res) {
      echo "
        <script>
          alert('Something went wrong: Could\'nt update the product!');
          window.location.href = '../edit-product.php';
        </script>
      ";
      return false;
    }

    if(!move_uploaded_file($img['tmp_name'], $target_dir . $img_name)) {
      echo "
        <script>
          alert('Something went wrong: Could\'nt upload the image to the server!');
          window.location.href = '../edit-product.php';
        </script>
      ";
      return false;
    }

    unlink($target_dir . $oldImageName);
    echo "
      <script>
        alert('Product has been updated!');
        window.location.href = '../all-products.php';
      </script>
    ";
    return true;

    exit();
  }
}