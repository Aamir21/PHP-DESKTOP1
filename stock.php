<?php
include 'connection.php';
$sel= "SELECT * FROM stock";
$query= mysqli_query($connect, $sel);



?>
<!doctype html>
<html>
    <head>
        <style type="text/css">
            table,th,td{
                border: 1px solid black;
            }
            
            body{
                background-color: #FCFCE7;
            }
            
            
            #main_div{
                width: 600px;
                height: 500px;
                background-color: #FCFCE7;
                margin-top: 100px;
                margin-left: 325px;
                overflow-y: scroll;
                
                
            }
            
           table{
               
                padding-top: 50px;
             
                
                
            }
   
            
            #stock_text{
                font-size: 35px;
                font-family: Times New Roman;
                position: absolute;
                top: -20px;
                left: 600px;
            }
            
            #frame_text{
                
                position: absolute;
                margin-top: -10px;
                margin-left: 20px;
                font-family: Arial;
                font-size: 17px;
                background-color:#FCFCE7; 
                
                
            }
            
            #back1{
                position: absolute;
                top: 20px;
                left: 20px;
                width: 32px;
                height: 32px;
                border: dashed 1px black;
                background-color: seagreen;
                border-radius: 25px;
                padding-left: 13px;
                padding-top: 10px;
                padding-bottom: 3px;
                font-size: 19px;
                color: black;
                text-decoration: none;
                
            }
            
            
            
        </style>
    </head>
    <body>
        
        <p id="stock_text">STOCK</p>
        
        <div id="main_div">
            <p id="frame_text">Data List</p>
            
        <table>
                          <tr>
                            <th style="width:65px">Item Code</th>
                            <th style="width:170px">Item Name</th>
                            <th style="width:170px">item weight</th>
                            <th style="width:171px">Quantity</th>    
                          </tr>
                        <?php
                            while($row=mysqli_fetch_array($query)){
                            echo "<tr>"."<td>".$row['item_code']."</td>"
                                ."<td>".$row['item_name']."</td>"
                                ."<td>".$row['weight']."</td>"
                                ."<td>".$row['qty']."</td>"
                                ."</tr>";
                            }
            
            
                        ?>
                          
                            
        </table>   
        </div>
        <div>  <a href="wellcome.php" id="back1">&#x1F519;</a></div>
    </body>
        
</html>