<?php 

include('header.php');
include('./conn.php');
$id = $_GET['id'];

$q = "SELECT * FROM products WHERE id = $id";
$res = mysqli_query($conn, $q);
$data = mysqli_fetch_assoc($res);

?>

<div class="container-fluid">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 d-flex align-items-stretch">
        <div class="card w-100">
          <div class="card-body">
            <div class="mb-4">
              <h5 class="card-title fw-semibold">Product Image</h5>
            </div>
            <div class="card-body p-2">
              <img style="width: 100%; height: 200px; aspect-ratio: 1; object-fit: contain; object-position: center;" src="<?php echo "../giftos/public/uploads/" . $data['image'] ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 d-flex align-items-stretch">
        <div class="card w-100">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Add new product</h5>
            <div class="card-body">
              <form action="./product/update_product_backend.php?id=<?php echo $data['id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="productNameInput" class="form-label"
                    >Product Name</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="productNameInput"
                    name="p_name"
                    value="<?php echo $data['name'] ?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="productDescriptionInput" class="form-label"
                    >Product Description</label
                  >
                  <textarea
                    type="textarea"
                    class="form-control"
                    style="resize: none;"
                    id="productDescriptionInput"
                    name="p_description"
                    rows="4"
                  ><?php echo rtrim(ltrim($data['description'])) ?></textarea>
                </div>
                <div class="mb-3">
                  <label for="productCategoryInput" class="form-label"
                    >Product Category</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="productCategoryInput"
                    name="p_category"
                    value="<?php echo $data['category'] ?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="productPriceInput" class="form-label"
                    >Product Price</label
                  >
                  <input
                    type="number"
                    class="form-control"
                    id="productPriceInput"
                    name="p_price"
                    value="<?php echo $data['price'] ?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="productQuantityInput" class="form-label"
                    >Product Quantity</label
                  >
                  <input
                    type="number"
                    class="form-control"
                    id="productQuantityInput"
                    name="p_quantity"
                    value="<?php echo $data['quantity'] ?>"
                  />
                </div>
                <div class="mb-3">
                  <label for="productImageInput" class="form-label"
                    >Product Image</label
                  >
                  <input
                    type="file"
                    class="form-control"
                    id="productImageInput"
                    name="p_image"
                  />
                </div>
                <input type="text" hidden value="<?php echo $data['image'] ?>" name="old_image_name">
                <button type="submit" name="update-product-submit" class="btn btn-primary">
                  Update product
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php') ?>