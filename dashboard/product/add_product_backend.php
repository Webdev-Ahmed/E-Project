<?php

include("../conn.php");

if(isset($_POST['add-product-submit'])) {
  $name = $_POST['p_name'];
  $description = $data['description'];
  $price = $_POST['p_price'];
  $quantity = $_POST['p_quantity'];
  $category = $_POST['p_category'];

  $img = $_FILES['p_image'];

  if(empty($name) || empty($description) || empty($price) || empty($quantity) || empty($img) || empty($category)) {
    echo "
      <script>
        alert('All fields should be filled!');
        window.location.href = '../add-product.php';
      </script>
    ";
    return false;
  }

  $target_dir = "../../giftos/public/uploads/";
  $target_file = $target_dir . basename($_FILES['p_image']['name']);
  $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

  $img_name = time() . "." . $imageFileType;
  
  if($imageFileType !== "jpg" && $imageFileType !== "jpeg" && $imageFileType !== "PNG" && $imageFileType !== "png" && $imageFileType !== "webp") {
    echo "
      <script>
        alert('The file should be an image');
        window.location.href = '../add-product.php';
      </script>
    ";
    return false;
  }

  if($_FILES['p_image']['size'] > 5_000_000) {
    echo "
      <script>
        alert('File size should be less then 5mb');
        window.location.href = '../add-product.php';
      </script>
    ";
    return false;
  }

  $query = "INSERT INTO products (name, description, price, quantity, image, category) VALUES ('$name', '$description', '$price', '$quantity', '$img_name', '$category')";
  $res = mysqli_query($conn, $query);

  if(!$res) {
    echo "
      <script>
        alert('Something went wrong: The product could not be added!');
        window.location.href = '../add-product.php';
      </script>
    ";
    return false;
  } else {
    if(!move_uploaded_file($_FILES['p_image']["tmp_name"], $target_dir . $img_name)) {
      echo "
        <script>
          alert('Your file could not be uploaded!');
          window.location.href = '../add-product.php';
        </script>
      ";
      return false;
    } else {
      echo "
        <script>
          alert('The file ". basename( $_FILES["p_image"]["name"]). " has been uploaded');
          window.location.href = '../all-products.php';
        </script>
      ";
      return true;
    }
  }
}