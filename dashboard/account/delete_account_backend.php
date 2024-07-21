<?php 

include('../conn.php');
session_start();

$id = $_GET['id'];

$query = "DELETE FROM users WHERE id = $id";
$res = mysqli_query($conn, $query);

if($id == $_SESSION['id']) {
  if($_SESSION['role'] == 'admin') {
    session_unset();
  }
}

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
    alert('The user has been deleted');
    window.location.href = '../all-users.php';
  </script>
";
