<?php 

include('./header.php');
include('./conn.php');

$query = "SELECT * FROM users ORDER BY created_at";
$res = mysqli_query($conn, $query);

?>

<div class="container-fluid">
  <div class="container-fluid">
    <div class="card w-100">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">
          All users
        </h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">First Name</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Last Name</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Email</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Role</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Account Created</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Actions</h6>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php

                while($data = mysqli_fetch_assoc($res)) {
                  $formatedDate = date_format(date_create($data['created_at']),"Y / m / d");
                  $role = ucfirst($data['role']);

                  echo "
                    <tr>
                      <td class='border-bottom-0'>
                        <h6 class='fw-semibold mb-0'>$data[id]</h6>
                      </td>
                      <td class='border-bottom-0'>
                        <h6 class='fw-semibold mb-1'>$data[first_name]</h6>
                      </td>
                      <td class='border-bottom-0'>
                        <h6 class='mb-0 fw-semibold'>$data[last_name]</p>
                      </td>
                      <td class='border-bottom-0'>
                        <h6 class='mb-0 fw-semibold'>$data[email]</p>
                      </td>
                      <td class='border-bottom-0'>
                        <h6 class='fw-semibold mb-0 fs-4'>$role</h6>
                      </td>
                      <td class='border-bottom-0'>
                        <h6 class='fw-normal mb-0 fs-4'>$formatedDate</h6>
                      </td>
                      <td>
                        <a class='btn btn-sm btn-danger' href='account/delete_account_backend.php?id=$data[id]'>Delete</a>
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