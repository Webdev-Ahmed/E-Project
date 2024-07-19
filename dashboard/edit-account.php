<?php 

include('header.php');
include('./conn.php');
$id = $_GET['id'];

$q = "SELECT * FROM users WHERE id = $id";
$res = mysqli_query($conn, $q);
$data = mysqli_fetch_assoc($res);

?>

<div class="container-fluid">
  <div class="container-fluid">
    <div class="card w-100">
      <div class="card-body">
        <h3 class="mb-2">Edit account</h3>
        <div class="card-body">
          <form action="account/info_edit_backend.php?id=<?php echo $id ?>" method="POST">
            <div class="mb-3">
              <label for="firstNameInput" class="form-label"
                >First Name</label
              >
              <input
                type="text"
                class="form-control"
                id="firstNameInput"
                name="first_name"
                value="<?php echo $data['first_name'] ?>"
              />
            </div>
            <div class="mb-3">
              <label for="lastNameInput" class="form-label"
                >Last Name</label
              >
              <input
                type="text"
                class="form-control"
                id="lastNameInput"
                name="last_name"
                value="<?php echo $data['last_name'] ?>"
              />
            </div>
            <div class="mb-3">
              <label for="emailInput" class="form-label"
                >Email</label
              >
              <input
                type="text"
                class="form-control"
                id="emailInput"
                name="email"
                value="<?php echo $data['email'] ?>"
              />
            </div>
            <div>
              <a href="change-account-password.php" class="btn btn-secondary">
                Change password
              </a>
              <button type="submit" name="update-account-submit" class="btn btn-primary">
                Update accont
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php') ?>