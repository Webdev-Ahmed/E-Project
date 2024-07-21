<?php 

include("header.php");
include("./conn.php");

$id = $_GET['id'];

$select_query = "SELECT * FROM products WHERE id = $id";
$data = mysqli_fetch_assoc(mysqli_query($conn, $select_query));

?>

<section class="layout_padding">
  <div class="container container-bg">
    <div class="row">
      <div class="col-6 p-3">
        <img src="public/uploads/<?php echo $data['image'] ?>" style="width: 100%; aspect-ratio: 1; object-fit: cover; object-position: center; border-radius: 5px;" alt="<?php echo $data['name'] ?>">
      </div>
      <div class="col-6 p-3">
        <form action="cart/add_to_card_backend.php?p_id=<?php echo $data['id'] ?>" method="POST">
          <div class="mb-3">
            <h5>Name:</h5>
            <input type="text" disabled value="<?php echo $data['name'] ?>" class="form-control">
          </div>
          <div class="mb-3">
            <h5>Description:</h5>
            <textarea type="text" rows="3" style="resize: none;" disabled class="form-control"><?php echo $data['description'] ?></textarea>
          </div>
          <div class="mb-3">
            <h5>Category:</h5>
            <input type="text" disabled value="<?php echo $data['category'] ?>" class="form-control">
          </div>
          <div class="mb-4">
            <h5>Price:</h5>
            <input type="text" disabled value="Rs. <?php echo $data['price'] ?>" class="form-control">
          </div>
          <div class="mb-3">
            <h5>Quantity:</h5>
            <input type="number" min='1' max='999' value="1" name="item_qty" placeholder="Enter the quantity" class="form-control">
          </div>
          <div style="display: flex; gap: 20px;">
            <button style="margin: 0;">ADD TO CARD</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php include("footer.php") ?>