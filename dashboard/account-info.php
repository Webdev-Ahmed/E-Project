<?php include("header.php") ?>

<div class="container-fluid">
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h3 class="mb-4">Account Info</h3>
        <div class="px-4 mb-4">
          <div class="mb-1" style="display: flex; gap: 10px; align-items: center;">
            <h5>First Name:</h5>
            <h5 class="fw-normal"><?php echo $_SESSION['first_name'] ?></h5>
          </div>
          <div class="mb-1" style="display: flex; gap: 10px; align-items: center;">
            <h5>Last Name:</h5>
            <h5 class="fw-normal"><?php echo $_SESSION['last_name'] ?></h5>
          </div>
          <div class="mb-1" style="display: flex; gap: 10px; align-items: center;">
            <h5>Email:</h5>
            <h5 class="fw-normal"><?php echo $_SESSION['email'] ?></h5>
          </div>
          <div style="display: flex; gap: 10px; align-items: center;">
            <h5>Password:</h5>
            <h5 class="fw-normal"><?php echo $_SESSION['password'] ?></h5>
          </div>
        </div>
        <a href="edit-account.php?id=<?php echo $_SESSION['id'] ?>" class="btn btn-primary">Edit Account info</a>
      </div>
    </div>
  </div>
</div>

<?php include("footer.php") ?>