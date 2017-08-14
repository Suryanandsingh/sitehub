<?php
  
  session_start();

  include 'DBConn.php';
	 
  $Email = $_POST['Email'];
  $pwd = $_POST['pwd'];

  

//    $sql = "SELECT * FROM user WHERE Email='$Email'";
//    $result = $conn->query($sql);
//    $row = $result->fetch_assoc();
//    $hash_pwd = $row['pwd'];
//    $hash = password_verify($pwd, $hash_pwd);
//    if($hash == 0){
//        header("Location: main.php?error=password");
//	   exit();
//    }
//    else{
  $sql = "SELECT * FROM user WHERE Email='$Email' AND pwd='$pwd' ";
  $result = $conn->query($sql);
  if(!$row = $result->fetch_assoc())
  {
   	    //$_SESSION['first'] = $row['first'];
        echo "invalde user";
        header("Location: main.php");
   }
   else{
    	$_SESSION['first'] = $row['first'];
        $_SESSION['Email'] = $row['Email'];
        header("Location: main.php");
  }
    //}

  
    //}
