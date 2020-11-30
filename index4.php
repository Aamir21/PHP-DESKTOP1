<?php

    $error_message='';

    $host='localhost';
    $user='root';
    $password='';
    $database='quest';
    $connect=mysqli_connect($host,$user,$password,$database);


if(isset($_POST['submit'])){
    $u_name=$_POST['username'];
    $pass=$_POST['password'];
    $query="SELECT* FROM authentication WHERE username='$u_name' && password='$pass'";
   $result  = mysqli_query($connect, $query);
    $count  = mysqli_num_rows($result);
    if($count){
       session_start() ;
        $_SESSION['user']= $u_name;
        
         header("location: wellcome.php");
    }
    else{
        $error_message="Wrong User or Password !";
    }
   
    
}


  
?>


<!DOCTYPE html>
<html>
    <head>
        <style>
            
            body{
                background-image:url(main_home.png);
                background-size: cover;
                background-repeat: no-repeat;
                
                
            }
            
            #d1{
                width: 320px;
                height: 400px;
                background-color: bisque;
                border: solid thin grey;
                border-radius: 5px;
                margin-top: 100px;
                margin-left: 10px;
                box-shadow: 0px 0px 2px gray;
                opacity: 0.9;
            }
            
            #f1{
                margin-left: 5px;
                margin-top: 10px;
                width: 300px;
                height: 320px;
                background-color: transparent;
                
                
            }
            
            #f1 input[type=text]{
                width: 200px;
                height: 24px;
                border: solid thin grey;
                border-radius: 3px;
                margin-top: 80px;
                margin-left: 50px;
                padding-left: 10px;
                outline: none;
                font-family: bahnschrift;
            }
            
            #f1 input[type=password]{
                width: 200px;
                height: 24px;
                border: solid thin grey;
                border-radius: 3px;
                margin-top: 20px;
                margin-left: 50px;
                padding-left: 10px;
                outline: none;
                font-family: bahnschrift;
            }
            #f1 input[type=password]:hover{
              
            }
            
            #f1 input[type=submit]{
                width: 140px;
                height: 40px;
                border: solid thin grey;
                border-radius: 20px;
                margin-top: 30px;
                margin-left: 115px;
                outline: none;
                transition: all 0.5s linear;
                
            }
            #f1 input[type=submit]:hover{
                
                background-color: beige;
                box-shadow: 0 0 2px grey;
                transition: all 0.2s linear;
            }
            
            
        </style>
        
    </head>
    <body>
    
        <div id="d1">
            <form method="POST" action="" id="f1">
                <input name="username" type="text" placeholder="Username" required><br>
                <input name="password" type="password" placeholder="Password" required><br>
                <input type="submit" name="submit" value="Login">
            </form>
        <div style="color:red; margin-left:72px;"><?php  echo $error_message; ?></div>
        </div>
        
    
    
    
    
    </body>




</html>