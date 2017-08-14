<?php
    function setcomment($conn){
        if(isset($_POST['submit'])){
            $Email = $_POST['Email'];
            $date = $_POST['date'];
            $msg = $_POST['msg'];
                
        $sql = "INSERT INTO comments(Email, date, msg) VALUES('$Email', '$date', '$msg')";
        $show = $conn->query($sql);
        }
        
    }
    function getcomment($conn)
    {
        $sql = "SELECT * FROM comments";
        $show = $conn->query($sql);
	$i = 1;
        while($run = $show->fetch_assoc())
        {
            "<br";
            echo '<div>';
            echo $run['Email']."<br>";
            echo $run['date']."<br>";
            echo $run['msg']."<br>";
            echo '</div>';
	    $i++;
	    if($i>10)
		break;	
		


        }
    }
