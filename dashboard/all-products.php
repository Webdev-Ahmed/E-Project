<?php 

include('./header.php');
include('./conn.php');

$query = "SELECT * FROM products ORDER BY created_at";
$res = mysqli_query($conn, $query);

?>

<div class="container-fluid">
  <div class="container-fluid">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">
          All products
        </h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Name</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Added on</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Quantity</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Price</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Actions</h6>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php

                while($data = mysqli_fetch_assoc($res)) {
                  $quantityBadge;
                  $quantityBadgeClr;
                  $formatedDate = date_format(date_create($data['created_at']),"Y / m / d");

                  if($data['quantity'] <= 30) {
                    $quantityBadge = "Full Stock";
                    $quantityBadgeClr = "primary";
                  }
                  
                  if($data['quantity'] < 20) {
                    $quantityBadge = "Medium";
                    $quantityBadgeClr = "secondary";
                  }
                  
                  if($data['quantity'] < 10) {
                    $quantityBadge = "Low";
                    $quantityBadgeClr = "pink";
                    $quantityBadgeClr = "warning";
                  }
                  
                  if($data['quantity'] < 5) {
                    $quantityBadge = "Critical";
                    $quantityBadgeClr = "danger";
                  }

                  echo "
                    <tr>
                      <td class='border-bottom-0'>
                        <h6 class='fw-semibold mb-0'>$data[id]</h6>
                      </td>
                      <td class='border-bottom-0'>
                        <h6 class='fw-semibold mb-1'>$data[name]</h6>
                        <span class='fw-normal'>$data[category]</span>
                      </td>
                      <td class='border-bottom-0'>
                        <p class='mb-0 fw-normal'>$formatedDate</p>
                      </td>
                      <td class='border-bottom-0'>
                        <div class='d-flex align-items-center gap-2'>
                          <span
                            class='badge bg-$quantityBadgeClr rounded-3 fw-semibold'
                            >". $quantityBadge ."</span
                          >
                        </div>
                      </td>
                      <td class='border-bottom-0'>
                        <h6 class='fw-semibold mb-0 fs-4'>Rs. $data[price]</h6>
                      </td>
                      <td>
                      <a class='btn btn-sm btn-secondary' href='edit-product.php?id=$data[id]'>Edit</a>
                        <a class='btn btn-sm btn-danger' href='product/delete_product_backend.php?id=$data[id]'>Delete</a>
                      </td>
                    </tr>
                  ";
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('./footer.php') ?>