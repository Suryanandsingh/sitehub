<?php

  session_start();
  include 'DBConn.php';
  include 'comment.php';

?>
<!DOCTYPE html>
<html>
    <head>
        
         <title>Main</title>
        <script type="text/javascript" src="login_signup.js"></script>
        
<!--            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
        
        <link rel="stylesheet" type="Text/css" href="mainPage.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
    </head>
    
    <body>
        
        <div id="myModal" class="modal">
                
                <div class="modal-content">
                    <span class="close">&times;</span>
                    
                    <h2>Create an account</h2>
                    <form id="myForm" role="form"  method="post" >
                        <input type="text" class="inputfield" id="first_name" name="first" placeholder="First Name">
                        <p id="first" class="validation_error">p</p>
                        <input type="text" class="inputfield" id="last_name" name="last" placeholder="Last Name">
                        <p id="last" class="validation_error">p</p>
                        <input type="email" class="inputfield" id="emails" name="Email" placeholder="Email" >
                        <p id="email" class="validation_error">p</p>
                        <input type="password" class="inputfield" id="passwords" name="pwd" placeholder="Password">
                        <p id="password" class="validation_error">p</p>
                        <button type="button" class="signupb" id="signUp_button" name="submit" onclick="validate()">SIGN UP</button>
                       
                    </form>

                </div>
                
            </div>
        
        <div id="main_container">
          
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
                            
                            <input class="lg-pwd-text" type="text" name="Email" placeholder="Email" >
                            
                            <input  class="lg-pwd-text" type="password" name="pwd" placeholder="Password" >
                            
                            <input class="login-button" type="submit" name="submit" value="Login">
                        </form>' 
                        ;
			              
                        echo '<button class="signup" id="sign" onclick="display()">SIGN UP</button>';}
		?>
                            
                        </div>
                </div>
                
            </div>
            
            <div id="container">
                
                <div id="content">
                    
                    <div id="content-head">
                        <ul>
                            <li><a id="categories">Content</a></li>
                            <li><a id="feedback-button" >Feedback</a></li>
                            <li><a id="about-button">About</a></li>
                        </ul>
                     </div>
                        
                        <div id="category-div">
                            <div id="category-content">
                                <ul>
                                    <li>
                                        <a class="categ" href="categories.php?id=shopping" >Shopping</a>
                                    </li>
                                    <li>
					 <a class="categ" href="categories.php?id=news" >News</a>
                                    </li>
                                    <li>
                                        <a class="categ" href="categories.php?id=College" >College</a>
                                    </li>
                                    <li>
                                        <a class="categ" href="categories.php?id=Hospital" >Hospital</a>
                                    </li>
                                    <li>
					<a class="categ" href="categories.php?id=Entertainment" >Entertainment</a>                                        
                                    <li>
                                        <a class="categ" href="categories.php?id=Educational" >Educational</a>
                                    </li>
                                    <li>
                                        <a class="categ" href="categories.php?id=Banking" >Banking</a>
                                    </li>
                                    <li>
                                        <a class="categ" href="#" >Category8</a>
                                    </li>
                                    <li>
                                        <a class="categ" href="#" >Category9</a>
                                    </li>
                                    <li>
                                        <a class="categ" href="#" >Category10</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div id="feedback-div">
                            <div id="feedback-content">
	<?php
			if(isset($_SESSION['Email'])){
                                echo '<form action="'.setcomment($conn).'" method="POST" >
				    <input type="hidden" name="Email" value="'.$_SESSION['Email'].'">
                		    <input type="hidden" name="date" value="'.date('y-m-d H:i:s').'">
                                    <textarea name="msg" id="textarea"  type="text" placeholder="Feedback" ></textarea>
                                    <input type="submit" class="feedback-submit" name="submit" value="SUBMIT">
                                </form>';
			}
			else{
				echo 'Your are not logged in!';
			}
            		getcomment($conn);// for geeting comments
	?>
                            </div>
                        </div>
                         <div id="about-div">
                            <h1 >About</h1>                        
                        </div>
                </div>
                
            </div>
        
        </div>
        <script type="text/javascript" src="login_signup.js"></script>
            
            
    </body>
    

</html>
