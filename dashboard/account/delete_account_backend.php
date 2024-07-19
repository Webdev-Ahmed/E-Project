<?php 

include('../conn.php');

$id = $_GET['id'];

$query = "DELETE FROM users WHERE id = $id";
$res = mysqli_query($conn, $query);

if(!$res) {
  echo "
    <script>
      alert('Something went wrong: This user could\'nt be deleted!');
      window.location.href = '../all-users.php';
    </script>
  ";
  return false;
}

echo "
  <script>
    alert('The product has been deleted');
    window.location.href = '../all-users.php';
  </script>
";
