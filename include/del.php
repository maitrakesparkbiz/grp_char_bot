<?php
  include('../connection/connect.php');
  // echo "<script>alert('done')</script>";
  session_start();
  $id=$_SESSION['id'];


  $sql='DELETE FROM `user_master` WHERE id='.$id.'';
  if ($conn->query($sql) === TRUE) {

    echo "true";
  } else {

  }
  session_unset();
  session_destroy();
 


?>