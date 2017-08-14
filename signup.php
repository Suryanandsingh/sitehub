<?php

   session_start();

   include 'DBConn.php';
 
   $first = $_POST['first'];
   $last = $_POST['last'];
   $Email = $_POST['Email'];
   $pwd = $_POST['pwd'];

   if(empty($first)){
    header("Location: main.php?id=first");
	exit();
   }
   else{
	if (!preg_match("/^[a-zA-Z ]*$/",$first)){
	   header("Location: main.php?id = Invalid_Name");
            exit();
	}

   }
   if(empty($last)){
   	header("Location: main.php?id=last");
	exit();
   }
   if(empty($Email)){
   	header("Location: main.php?id=email");
	exit();
   }
   else{
	if (!filter_var($Email, FILTER_VALIDATE_EMAIL)){
	  header("Location: main.php?id=invalid_mail");
	  exit();
	}
   }
   if(empty($pwd)){
   	header("Location: main.php?id=password");
	exit();
   }
   else{
	if(strlen($pwd)<8){
	   header("Location: main.php?id=pasword_atleast_8");
	   exit();
	}
	
    }
   
    $sql_mail = "SELECT Email FROM user WHERE Email='$Email' ";
    $res = $conn->query($sql_mail);
    $check_mail = mysqli_num_rows($res);
    if($check_mail == 1){
	header("Location: main.php?error=Email");
	exit();
    }
    else{
        //$hidden_pass = password_hash($pwd, PASSWORD_DEFAULT); 
        $pwd = md5($pwd);
   	    $sql = "INSERT INTO user(first, last, Email, pwd) VALUES ('$first', '$last', '$Email', '$pwd') ";
   	    $show = $conn->query($sql);
   	    header("Location: main.php");
      }

   

