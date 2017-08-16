<?php

 session_start();
    include 'DBConn.php';
    $content = $_GET['id'];
    $fetch = "SELECT * FROM $content";
    $fetch_result = $conn->query($fetch);
  
    
//        print_r($s['Name']);
//    endforeach;
//    print_r($fetch_result->fetch_assoc());
//    while($row = $fetch_result->fetch_assoc()){
//        echo $row['Name'].'      '.$row['link']."<br><br>";
//    }
?>
<!DOCTYPE html>
<html>
    <head>
        
         <title>Categories</title>
<!--        <link rel="stylesheet" type="Text/css" href="categories.css">-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!--        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  -->
        
        <link rel="stylesheet" type="Text/css" href="mainPage.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </head>
    
    <body>
        
        <div id="main_container">
            
            <div id="myModal" class="modal">
                
                <div class="modal-content">
                    <span class="close">&times;</span>
                    
                    <h2>Create an account</h2>
                    <form id="myForm" role="form"  method="post" >
                        <input type="text" class="inputfield" id="first_name" name="first" placeholder="First Name" onsubmit="">
                        <p id="first" class="validation_error">p</p>
                        <input type="text" class="inputfield" id="last_name" name="last" placeholder="Last Name">
                        <p id="last" class="validation_error">p</p>
                        <input type="email" class="inputfield" id="emails" name="Email" placeholder="Email">
                        <p id="email" class="validation_error">p</p>
                        <input type="password" class="inputfield" id="passwords" name="pwd" placeholder="Password">
                        <p id="password" class="validation_error">p</p>
                        <button type="button" class="signupb" id="signUp_button" name="submit" onclick="validate()">SIGN UP</button>
                       
                    </form>

                </div>
                
            </div>
          
            <div id="head">
                
                <div id="logo">
                    
                </div>
             
                <div id="login-signup-container">
        
                    <div id="login-content">
	   <?php
			if(isset($_SESSION['first'])){
			    echo $_SESSION['first'].'<form action="logout.php">
					<button type="submit">LogOut</button>
				</form>'	;
			 }
			else{
                    echo '<form id="form" action="login.php" method="POST">
                            
                            <input class="lg-pwd-text" type="email" name="Email" placeholder="Email" >
                            
                            <input  class="lg-pwd-text" type="password" name="pwd" placeholder="Password" >
                            
                            <input class="login-button" type="submit" name="submit" value="Login">
                        </form>' 
                        ;

                       
                       echo'<button class="signup" id="sign" onclick="display()">SIGN UP</button>';
            }
            ?>
                        </div>
                </div>
                
            </div>
            
            <div id="categories">
                
                <div id="categories-content">
                    <div id="categories-content-head">
                        <p ><?php echo"$content"; ?></p>
                    </div>
                    <div id="categories-content-body">
                        <ul>
                            <?php foreach($fetch_result as $s): ?>
                            <li>
                                <a href="<?php echo($s['link']); ?>" target="_blank"><img src="<?php echo($s["Name"]);?>" width="175" height="96" ></a> 
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div> 
                </div>
                
                <div id="footer">
                
                </div>
            </div>
                    
        </div>
        <script type="text/javascript" src="login_signup.js"></script>    
    
    </body>
    
    
    

</html>
