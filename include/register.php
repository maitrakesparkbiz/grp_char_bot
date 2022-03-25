<?php
session_start();
if ($_SESSION['admin'] == null) {

  echo "<script>window.location.href='/index.html'</script>";
}
else
{
  if ($_POST['submit']) { 
    include('../connection/connect.php');
    // echo "<script>alert('done')</script>";
  
    $username = $_POST['username'];
    $psw = $_POST['psw'];
  /*   $target_dir = "../photo/";
    $target_file = $target_dir . basename($_FILES["filenname"]["name"]);
    if (move_uploaded_file($_FILES["filenname"]["tmp_name"], $target_file)) {
      echo $_FILES["filenname"]["name"];
    } */
    $passowrd = md5($psw);
  
  
  
    $sql = 'INSERT INTO `user_master`( `username`, `password`, `role`) VALUES ("'.$username.'","'.$passowrd.'",2)';
    if ($conn->query($sql) === TRUE) {
  
      echo "<script>alert('Register successfully')</script>";
      echo "<script>window.location.href='../index.html'</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo  $mysqli->error;
    /*   echo "<script>alert('Please register first')</script>";
    echo "<script>window.location.href='../register.html'</script>"; */
  }
    
}
?>