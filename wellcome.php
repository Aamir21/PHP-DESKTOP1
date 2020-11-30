<?php

                session_start();
                $username=$_SESSION['user'];
                if($username==''){
                    header('location: index4.php');
                }
                
?>
<!doctype html>
<html>
    
    
    <head>
        
        
        <style type="text/css">
            
            body{
                background-color:  #fffcf6;
                background-image: url(WelcomePage.jpg);
                background-size: cover;
                
            }
            
            
            
            #date{
                width: 200px;
                height: 110px;
                background:linear-gradient(90deg, seagreen, seagreen);
                border: solid thin grey;
                border-radius: 8px;
                display: block;
                margin-left: 1000px;
                margin-top: -100px;
                box-shadow: 0 0 2px gray;
                padding-bottom: 10px;
            
                
            }
            
            #p_date{
                font-size: 20px;
                font-family: Arial;
                margin-left: 10px;
                color: aliceblue;
                
            }
            #p_time{
                margin-top: -10px;
                font-size: 45px;
                margin-left: 10px;
                
            }
            
            
            #d_logout{
                
                background-color: transparent;
                position: absolute;
                right: 20px;
                top: 14px;
                
            }
           
            
            #a_exit{
                width: 90px;
                height: 34px;
                font-size: 20px;
                background-color: lightgoldenrodyellow;
                color: black;
                padding-left: 30px;
                padding-right: 30px;
                padding-top: 4px;
                padding-bottom: 6px;
                border: solid thin black;
                border-radius: 3px;
                text-decoration: none;
                box-shadow: 0 0 2px grey;
                
                
                
            }
            
            #a_exit:hover{
                background-color: #F2342E;
            }
            
            
            
            #d_div0{
                
                width: auto;
                height: 80px;
                background-color: whitesmoke;
                border: solid thin gray;
                box-shadow: 0 0 2px gray;
                border-radius: 4px;
                margin-top: 10px;
                
            }
            
            
            #p_user{
                font-size: 25px;
                padding-left: 20px;
                font-family: inherit;
            }
            
            
            
            #d_uname{
                
                font-family: bahnschrift ;
                font-size: 20px;
                font-weight: bold;
                margin-left: 50px;
                
            }
            
            
            #d_div1{
                width: 250px;
                height: 380px;
                background-color: lavender;
                border: solid thin grey;
                box-shadow: 0 0 2px gray;
                margin-top: 20px;
                border-radius: 5px;
                
            }
            
            #d_div1 a button{
                width: 130px;
                height: 60px;
                background: linear-gradient(90deg, #1E6649, slategreen);
                border: solid thin gray;
                border-radius: 30px;
                box-shadow: 0 0 2px gray;
                align-content: center;
                margin-top: 20px;
                margin-left: 60px;
                font-family: monospace;
                font-size: 15px;
                transition: all 0.2s linear;
                outline: none;
                
                
            }
            
            #d_div1 a button:hover{
                
                background-color: seagreen;
                transition: all 0.2s linear;
            }
            
            
            #p1{
                font-weight: bold;
                font-size: 35px;
                font-family: Arial;
                
                color: #1E6649;
                
            }
            
            #shop_name{
                font-size: 30px;
                font-family: courier;
                font-weight: bold;
                
                
            }
            #additem{
                position: absolute;
                top: 300px;
                left: 400px;
                width: 250px;
                height: 300px;
                background-color: lightgoldenrodyellow;
                
                align-content: center;
                border: solid thin grey;
                border-radius: 3px;
                box-shadow: 2px 2px 3px grey;
                
                
            }
            #additem{
                display: none;
            }
            
            
            #additem form{
                margin-top: 50px;
                
            }
            
            #additem form span{
                font-size: 14px;
                font-family: Arial;
                margin-left: 35px;
                
            }
            #additem form input{
                border: solid thin black;
                height: 23px;
                margin-left: 35px;
                border-radius: 2px;
            }
            
          
            
            #pop_button{
                position: absolute;
                top: 5px;
                right: 5px;
                background-color: #F2342E;
                border: solid thin grey;
                opacity: 0.8
            }
            
            #pop_submit{
                position: absolute;
                margin-top: 40px;
                width: 85px;
                height: 40px;
                padding-top: 6px;
                padding-bottom: 20px;
            }
            
            
          /*  #enterprise{
                font-size: 30px;
                font-family: Arial;
                
            }
            
            */
            
            
            
            
        
        
        </style>
        
        <!--SCRIPT--->
        
        <script type="text/javascript">
        
            function abc(){
                
                var d = new Date();
                //document.getElementById("p_date").innerHTML = d.getDate()+"-" + d.getMonth()+"-" +d.getYear();
                
                var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                
                document.getElementById("p_date").innerHTML = months[d.getMonth()]+" " + d.getDate()+", "  + d.getFullYear() ;
                
                document.getElementById("p_time").innerHTML = d.getHours() +": "+ d.getMinutes()+": "+ d.getSeconds();
                
                
            }
            
            setInterval(abc, 1000);
            
            
           
            
        
        
        
        </script>
        
        
        
        
        
    </head>
    
    
<body onload="abc()">
    
    <p id="p1">Welcome to the Dashboard!</p>
    
    <div id="d_logout"> <a href="logout.php" id="a_exit"> Exit </a></div>
    
    <div id="date">
        <p id="p_date">date</p>
        <p id="p_time">date</p>
    
    </div>
    
    
    <div id="d_div0">
        <p id="p_user"><?php  echo "Hi! ",$username;  ?></p>
        
        <p id="d_uname">
            
        
            
        </p>
        
        <p id="shop_name"></p>
        <p id="enterprise">
        
           
        
        
    
    </div>
    
    
    
    
    
    <hr>
    
    <div id="d_div1">
    
        <a><button name="b1" id="d_b1" onclick="showing()">ADD ITEMS</button></a>
        <a href="invoicing.php"><button name="b2" id="d_b2">PURCHASE</button></a>
        <a href="sale.php"><button name="b3" id="d_b3">SELL </button></a>
        <a href="stock.php"><button name="b4" id="d_b4">STOCK</button></a>
        
    </div>
    <div id="additem"> <!-- div for adding item in the database-->
        <form method="post" action="addnew.php" >
            <span>Enter Product Name</span><br>
            <input type="text" name="itemname" required><br>
            <span>Enter Product Weight</span><br>
            <input type="text" name="itemweight" required><br>
            <input type="submit" name="sub" id="pop_submit">
            <button type="button" id="pop_button" onclick="hiding()">&times;</button>
        </form>
    </div>
    
    <script type="text/javascript">
        function showing(){
            
            document.getElementById('additem').style.display="block";
             document.getElementById('additem').style.transition = "all 0.9s ease-out";
         
        }
        function hiding(){
            
            document.getElementById('additem').style.display="none";
         
        }
        
    </script>
</body>
 
    
</html>

