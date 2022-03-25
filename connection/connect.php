<?php
$conn = new mysqli('localhost', 'root', '','chat');
if($conn->connect_error)
{
  echo $conn->connect_error;
}
?>