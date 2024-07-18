<?php include("./header.php"); ?>

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Add new product</h5>
      <div class="card-body">
        <form action="./product/add_product_backend.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="productNameInput" class="form-label"
              >Product Name</label
            >
            <input
              type="text"
              class="form-control"
              id="productNameInput"
              name="p_name"
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
            ></textarea>
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
          <button type="submit" name="add-product-submit" class="btn btn-primary">
            Add product
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include("./footer.php") ?>