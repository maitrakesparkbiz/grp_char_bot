<?php
  include('../connection/connect.php');
  // echo "<script>alert('done')</script>";
  session_start();
  $id=$_SESSION['id'];
  $username = $_POST['username'];
  $psw = $_POST['Password'];


/* $target_dir = "../photo/";
$target_file = $target_dir . basename($_FILES["photoupload"]["name"]);
if (move_uploaded_file($_FILES["photoupload"]["tmp_name"], $target_file)) {
  $file= "file moved";
} */
  $passowrd=md5($psw);
/*   $photo = substr($_POST['photo'],12); */

  $sql='UPDATE `user_master` SET `username`="'.$username.'",`password`="'.$passowrd.'"  WHERE id='.$id.'';
  if ($conn->query($sql) === TRUE) {
echo $username;
echo " ";

  } else {
    echo "false";
  }



?>