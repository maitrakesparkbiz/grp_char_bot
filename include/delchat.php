<?php
  include('../connection/connect.php');
  session_start();
if ($_SESSION['admin'] == null) {

  echo "<script>window.location.href='/index.html'</script>";
}else
// echo "<script>alert('done')</script>";


$sql='DELETE FROM `log`';
if ($conn->query($sql) === TRUE) {

  echo "true";
} else {
  echo "false";
}

{}


?>