<?php 

include('./header.php');
include('./conn.php');

$query = "SELECT * FROM orders ORDER BY ordered_at";
$res = mysqli_query($conn, $query);

?>

<div class="container-fluid">
  <div class="container-fluid">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">
          All orders
        </h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Order ID</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Quantity</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Total Price</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">UserID</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Ordered At</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Actions</h6>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php

                while($data = mysqli_fetch_assoc($res)) {
                  $formatedDate = date_format(date_create($data['ordered_at']),"d / m / y");

                  echo "
                    <tr>
                      <td class='border-bottom-0'>
                        <h6 class='fw-semibold mb-0'>$data[id]</h6>
                      </td>
                      <td class='border-bottom-0'>
                        <h6 class='fw-semibold mb-1'>$data[order_id]</h6>
                      </td>
                      <td class='border-bottom-0'>
                        <h6 class='mb-0 fw-semibold'>$data[order_quantity]</p>
                      </td>
                      <td class='border-bottom-0'>
                        <h6 class='mb-0 fw-semibold'>Rs.$data[order_price]</p>
                      </td>
                      <td class='border-bottom-0'>
                        <h6 class='fw-semibold mb-0 fs-4'>$data[user_id]</h6>
                      </td>
                      <td class='border-bottom-0'>
                        <h6 class='fw-normal mb-0 fs-4'>$formatedDate</h6>
                      </td>
                      <td class='border-bottom-0'>
                        <a class='btn btn-danger' href='order/cancel_order_backend.php?id=$data[id]'>Reject Order</a>
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