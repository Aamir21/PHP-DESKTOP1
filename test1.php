<?php
include 'connection.php';
if(isset($_POST['submit'])){
    $u_name=$_POST['username'];
    $pass=$_POST['password'];
    $query="SELECT* FROM authentication WHERE username='$u_name' && password='$pass'";
   $result  = mysqli_query($connect, $query);
    $count  = mysqli_num_rows($result);
    if($count){
        echo "ok";
        session_start();
        $_SESSION['user']=$u_name;
         header("location: wellcome.php");
    }
    else{
        echo" not working";
    }
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            
        </style>
        
    </head>
    <body>
    
        <div>
            <form method="POST" action="">
                <input name="username" type="text" required><br>
                <input name="password" type="password" required><br>
                <input type="submit" name="submit">
            </form>
        
        </div>
    
    
    
    
    </body>




</html>