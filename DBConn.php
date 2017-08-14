<?php
  
  $conn = mysqli_connect("localhost", "root", "", "sitehub");

  if(!$conn){
	die("connection failed".mysqli_connect_error());
}
