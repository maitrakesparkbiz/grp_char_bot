<?php
  include('../connection/connect.php');
  // echo "<script>alert('done')</script>";

  session_start();
  $id=$_SESSION['id'];
  $message = $_POST['message'];



/* $target_dir = "../photo/";
$target_file = $target_dir . basename($_FILES["photoupload"]["name"]);
if (move_uploaded_file($_FILES["photoupload"]["tmp_name"], $target_file)) {
  $file= "file moved";
} */

/*   $photo = substr($_POST['photo'],12); */

  $sql='INSERT INTO `log`( `user_id`, `description`) VALUES ('.$id.',"'.$message.'")';
  echo $sql;
  if ($conn->query($sql) === TRUE) {

echo "true ";

  } else {
    echo "false";
  }



?>