<?php

                session_start();
                $username=$_SESSION['user'];
                
?>
<!doctype html>
<html>
    
    
    <head>
        
        
        <style type="text/css">
            
            #d_div0{
                
                width: auto;
                height: 180px;
                background-color: whitesmoke;
                border: solid thin gray;
                box-shadow: 0 0 2px gray;
                border-radius: 4px;
                
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
                margin-left: 20px;
                
            }
            
            #d_div1 a button{
                width: 130px;
                height: 60px;
                background: linear-gradient(90deg, orange, gold);
                border: solid thin gray;
                border-radius: 30px;
                box-shadow: 0 0 2px gray;
                align-content: center;
                margin-top: 20px;
                margin-left: 60px;
                font-family: monospace;
                font-size: 15px;
                
                
                
            }
        
        
        </style>
        
        
        
        
    </head>
    
    
<body>
    
    
    <div id="d_div0">
        <p id="d_uname">
            <?php  echo $username;  ?>
        
            
        </p>
    
    </div>
    
    <div id="d_div1">
    
        <a><button name="b1" id="d_b1">ADD</button></a>
        <a href="invoicing.php"><button name="b2" id="d_b2">PURCHASE</button></a>
        <a><button name="b3" id="d_b3">SELL </button></a>
        <a><button name="b4" id="d_b4">STOCK</button></a>
        
    </div>
    
</body>
 wellcome to the page
</html>

