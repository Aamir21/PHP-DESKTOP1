<?php
include 'connection.php';
$sel12 = "SELECT * FROM product";
$query12= mysqli_query($connect,$sel12);
 

if(isset($_POST['submit'])){
    $s_name= $_POST['name'];
    $s_mobile= $_POST['mobile'];
    $bill_number= $_POST['bill'];
    $date= $_POST['date'];
    $total1 = $_POST['t1'];
    $gst = $_POST['gst'];
    $g_total = $_POST['f_total'];
    for($i=1;$i<=10;$i++){
        $d1= $_POST[$i.'t1'];
        $d2= $_POST[$i.'t2'];
        $d3= $_POST[$i.'t3'];
        $d4= $_POST[$i.'t4'];//Rate
        $d5= $_POST[$i.'t5'];//Unit
        $d6= $_POST[$i.'t6'];//Price
        if($d6==0){
            break;
        }
        $sel11= "SELECT * FROM product WHERE p_name='$d2'&& p_weight='$d3'";
    $query11= mysqli_query($connect,$sel11);
    $result11= mysqli_fetch_array($query11);
        $numrow=mysqli_num_rows($query11);
    $id= $result11['p_id'];
        echo $id;
        if($numrow==0){
             header("location: wellcome.php");
            exit;
        }
        
        
        $ins="INSERT INTO purchase_details (bill_number, p_id, p_name, P_weight , unite_price, qty, price) VALUES
        ('$bill_number','$id', '$d2', '$d3', '$d4','$d5', '$d6')"; 
        mysqli_query($connect,$ins);
        $sel= "SELECT * FROM stock WHERE item_code='$id'";
        $result= mysqli_query($connect,$sel);
        $myrow=mysqli_fetch_array($result);
        $data=$myrow['qty'];
        $data=$data+$d5;
        if($myrow!=null){
            $sql= "UPDATE stock SET qty='$data' WHERE item_code='$id'";
            mysqli_query($connect, $sql);
        }
        else{
            $ins1= "INSERT INTO stock (item_code, item_name, weight, qty) VALUES ('$id','$d2','$d3','$d5')";
            mysqli_query($connect, $ins1);
        }
        
        
        
    }
    
        echo $total1;
    echo $gst;
   
}

?>

<script type="text/javascript">
    
    document.addEventListener("Load",function(){
        document.getElementById('d').value="helloo";
    });
    
    
    
    


    function price1(){
        var x1 = parseInt(document.getElementById('1t4').value);
        var y1 = parseInt(document.getElementById('1t5').value);
        
        document.getElementById('1t6').value=x1*y1;
            
        var z1 = parseInt(document.getElementById('1t6').value);
        
            
        document.getElementById('total1').value=z1;
        
        
    }
        
    function price2(){
        var x2 = parseInt(document.getElementById('2t4').value);
        var y2 = parseInt(document.getElementById('2t5').value);
        document.getElementById('2t6').value=x2*y2;
        var z2 = parseInt(document.getElementById('2t6').value);
        var ti2= parseInt(document.getElementById('total1').value);
        
        document.getElementById('total1').value=z2+ti2;
        
    }
        
    function price3(){
        var x3 = parseInt(document.getElementById('3t4').value);
        var y3 = parseInt(document.getElementById('3t5').value);
        document.getElementById('3t6').value=x3*y3;
        
        var z3 = parseInt(document.getElementById('3t6').value);
        var ti3= parseInt(document.getElementById('total1').value);
        
        document.getElementById('total1').value=z3+ti3;
        
    }
    
    function price4(){
        var x4 = parseInt(document.getElementById('4t4').value);
        var y4 = parseInt(document.getElementById('4t5').value);
        document.getElementById('4t6').value=x4*y4;
        
        var z4 = parseInt(document.getElementById('4t6').value);
        var ti4= parseInt(document.getElementById('total1').value);
        
        document.getElementById('total1').value=z4+ti4;
    }
    
    function price5(){
        var x5 = parseInt(document.getElementById('5t4').value);
        var y5 = parseInt(document.getElementById('5t5').value);
        document.getElementById('5t6').value=x5*y5;
        
        var z5 = parseInt(document.getElementById('5t6').value);
        var ti5= parseInt(document.getElementById('total1').value);
        
        document.getElementById('total1').value=z5+ti5;
    }
    
        
    function price6(){
        var x6 = parseInt(document.getElementById('6t4').value);
        var y6 = parseInt(document.getElementById('6t5').value);
        document.getElementById('6t6').value=x6*y6;
        
        var z6 = parseInt(document.getElementById('6t6').value);
        var ti6= parseInt(document.getElementById('total1').value);
        
        document.getElementById('total1').value=z6+ti6;
        
    }
        
    function price7(){
        var x7 = parseInt(document.getElementById('7t4').value);
        var y7 = parseInt(document.getElementById('7t5').value);
        document.getElementById('7t6').value=x7*y7;
        
        var z7 = parseInt(document.getElementById('7t6').value);
        var ti7= parseInt(document.getElementById('total1').value);
        
        document.getElementById('total1').value=z7+ti7;
        
    }
        
    function price8(){
        var x8 = parseInt(document.getElementById('8t4').value);
        var y8 = parseInt(document.getElementById('8t5').value);
        document.getElementById('8t6').value=x8*y8;
        
        var z8 = parseInt(document.getElementById('8t6').value);
        var ti8= parseInt(document.getElementById('total1').value);
        
        document.getElementById('total1').value=z8+ti8;
        
    }
    function price9(){
        
        var x9 = parseInt(document.getElementById('9t4').value);
        var y9 = parseInt(document.getElementById('9t5').value); 
        document.getElementById('9t6').value=x9*y9;
        
        var z9 = parseInt(document.getElementById('9t6').value);
        var ti9= parseInt(document.getElementById('total1').value);
        
        document.getElementById('total1').value=z9+ti9;
    }
        
    function price10(){
        
        var x10 = parseInt(document.getElementById('10t4').value);
        var y10 = parseInt(document.getElementById('10t5').value); 
        document.getElementById('10t6').value=x10*y10;
        
        var z10 = parseInt(document.getElementById('10t6').value);
        var ti10= parseInt(document.getElementById('total1').value);
        
        document.getElementById('total1').value=z10+ti10;
        
    }
        
      
    
    
    
    
    
    
    
    //TOTAL
  
    
        
    
    
    
    
    
    
    

</script>

<!doctype html>
<html>
    <head>
        <style type="text/css">
            table, th, td {
              border: 1px solid black;
                            size:100px;
            }
            
            body{
                background-color: #FCFCE7;
            }
            
            
            #pro_purchase{
                font-size: 42px;
                font-family: Times New Roman;
                position: absolute;
                margin-left: 480px;
                margin-top: 15px;
            }
            
            
            #1t3{
                position: absolute;
                width: 280px;
                margin-left: 100px;
                color: red;
            }
            
            select {
                width: 170px;
                background-color: white;
                color: black
                align-content: center;
        
            }
            
            #s_supplier_frame{
                font-family: Arial;
                font-size: 18px;
                position: absolute;
                margin-top: 76px;
                background-color: #FCFCE7;
                margin-left: 20px;
            }
            
            #supplier_frame{
                width: auto;
                height: 50px;
                background-color: #FCFCE7;
                border: dashed thin black;
                border-radius: 5px;
                margin-top: 50px;
                padding-top: 40px;
                padding-bottom: 10px;
                padding-left: 20px;
            }
            
            
            #supplier_frame span{
                font-family: Arial;
                font-weight: bold;
            }
            
            #s_name{
                
            }
            #s_mobile{
                margin-left: 40px;
            
            }
            #s_bill{
                margin-left: 40px;
            }
            #s_d{
                margin-left: 60px;
            }
            
            
            #c_name{
                margin-left: 20px;
                
                border: solid thin black;
                height: 23px;
            }
            #c_mobile{
                margin-left: 20px;
                width: 120px;
                 border: solid thin black;
                height: 23px;
            }
            #c_bill{
                margin-left: 20px;
                width: 120px;
                border: solid thin black;
                height: 23px;
            }
            
            #d{
               margin-left: 20px;
                width: 90px;
                 border: solid thin black;
                height: 23px;
                outline: none;
                background-color: gainsboro;
                border: solid thin grey;
                
            }
            
            #s_billing_frame{
                position: absolute;
                font-size: 18px;
                font-family: Arial;
                margin-top: -24px;
                margin-left: 20px;
                background-color: #FCFCE7; 
            }
            
            
            #billing_frame{
                width: auto;
                height: auto;
                background-color: #FCFCE7;
                border: dashed thin black;
                border-radius: 5px;
                padding-top: 20px;
                padding-left: 20px;
                margin-top: -50px;
                
                
            }
            
           
            #s_total1{
                font-family: Arial;
                font-weight: bold;
            }
            
            #s_gst{
                margin-left: 30px;
                 font-family: Arial;
                font-weight: bold;
            }
            #s_payable{
                 margin-left: 30px;
                 font-family: Arial;
                font-weight: bold;
            }
            
            #total1{
                border: solid thin grey;
                height:23px;
                margin-left: 10px;
                outline: none;
                background-color: gainsboro;
            }
            
            #gst{
                 border: solid thin black;
                height:23px;
                margin-left: 10px;
                width: 120px;
            }
            #payable{
                 border: solid thin grey;
                height:23px;
                margin-left: 10px;
                width: 160px;
                outline: none;
                background-color: gainsboro;
            }
            
            
            #submit_data{
                width: 120px;
                height: 30px;
                background-color: darkkhaki;
                border: solid thin grey;
                border-radius: 15px;
                box-shadow: 0 0 2px grey;
                outline: none;
                position: absolute;
                right: 370px;
                
                margin-top: -45px;
            }
            #submit_data:hover{
                box-shadow: 0 0 3px grey;
            }
            
            
            #a_search{
                width: 120px;
                height: 24px;
                background-color: crimson;
                border: solid thin grey;
                border-radius: 16px;
                position: absolute;
                box-shadow: 0 0 2px grey;
                text-decoration: none;
                text-align: center;
                color: black;
                padding-top: 5px;
                font-family: Arial;
                right: 230px;
                margin-top: -45px;
             
                
            }
            
            #back{
                width: 30px;
                height: 30px;
                position: absolute;
                top: 10px;
                left: 10px;
                background-color: darkkhaki;
                border: dashed thin black;
                border-radius: 27px;
                padding-left: 13px;
                padding-top: 10px;
                padding-bottom: 10px;
                padding-right: 8px;
                font-size: 22px;
                text-decoration: none;
                color: black;
                box-shadow: 0 0 2px grey;
                
            }
            
            
            
            
            
            
        </style>
    </head>
    <body>
        <div>
            <div>
                <p id="pro_purchase">PRODUCT LOADING</p>
                
                <form method="post" action="#">
                    <span id="s_supplier_frame"> Supplier Details</span><br><br>
                        <div id="supplier_frame">
                            <span id="s_name">Supplier Name :</span><input type="text" name="name" id="c_name">
                            <span id="s_mobile">Mobile :</span><input type="text" name="mobile" id="c_mobile">
                            <span id="s_bill">Bill Number :</span><input type="text" name="bill" id="c_bill">
                            <span id="s_d">Date :</span><input type="text" id="d" name="date" readonly value="<?php echo date('d.m.y')  ?> "/>
                            
                        </div>
                         <hr>
                        <br><br> 
                    
                   
                        
                    <span id="s_billing_frame"> Billing details</span><br><br>
                    
                <div id="billing_frame">
                        <table>
                          <tr>
                            <th style="width:65px">S.N</th>
                            <th style="width:170px">Item Name</th>
                            <th style="width:170px">Item weight</th>
                            <th style="width:172px">Rate</th>
                            <th style="width:171px">Quantity</th>
                            <th style="width:170px">Price</th>
                            
                          </tr>
                        </table>
                  
                        <input type="text" name="1t1" size="5">
                        <select name="1t2" id="it2">
                        <option>----Select----</option>    
                        <?php
                        $sel12 = "SELECT DISTINCT p_name FROM product";
                        $query12= mysqli_query($connect,$sel12);
                        while($row12= mysqli_fetch_array($query12)){
                        echo "<option>".$row12['p_name']."</option>";
                        }
                        ?>
                        </select>
                    
                        <select name="1t3" id="1t3">
                            <option>--Select--</option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                         <input type="text" name="1t4" id="1t4"><input type="text" name="1t5" id="1t5"oninput="price1()"><input type="text"name="1t6" id="1t6"><br>
                    
                    
                        <input type="text" name="2t1" size="5">
                        <select name="2t2" id="it2">
                        <option>----Select----</option>    
                        <?php
                        $sel13 = "SELECT DISTINCT p_name FROM product";
                        $query13= mysqli_query($connect,$sel13);
                        while($row13= mysqli_fetch_array($query13)){
                        echo "<option>".$row13['p_name']."</option>";
                        }
                        ?>
                        </select>
                        <select name="2t3">
                            <option>--Select--</option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                        <input type="text" name="2t4" id="2t4"><input type="text" name="2t5" id="2t5" oninput="price2()"><input type="text"name="2t6" id="2t6"><br>
                    
                    
                        <input type="text" name="3t1" size="5">
                        
                        <select name="3t2" id="it2">
                        <option>----Select----</option>    
                        <?php
                        $sel14 = "SELECT DISTINCT p_name FROM product";
                        $query14= mysqli_query($connect,$sel14);
                        while($row14= mysqli_fetch_array($query14)){
                        echo "<option>".$row14['p_name']."</option>";
                        }
                        ?>
                        </select>
                        <select name="3t3">
                            <option>--Select--</option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                    
                        <input type="text" name="3t4" id="3t4"><input type="text" name="3t5" id="3t5"oninput="price3()"><input type="text"name="3t6" id="3t6"><br>
                    
                    
                        <input type="text" name="4t1" size="5">
                    
                        <select name="4t2" id="it2">
                        <option>----Select----</option>    
                        <?php
                        $sel15 = "SELECT DISTINCT p_name FROM product";
                        $query15= mysqli_query($connect,$sel15);
                        while($row15= mysqli_fetch_array($query15)){
                        echo "<option>".$row15['p_name']."</option>";
                        }
                        ?>
                        </select>
                        
                        <select name="4t3">
                            <option>--Select--</option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                        <input type="text" name="4t4" id="4t4"><input type="text" name="4t5" id="4t5"oninput="price4()"><input type="text"name="4t6" id="4t6"><br>
                    
                    
                        <input type="text" name="5t1" size="5">
                        <select name="5t2" id="it2">
                        <option>----Select----</option>
                        <?php
                        $sel16 = "SELECT DISTINCT p_name FROM product";
                        $query16= mysqli_query($connect,$sel16);
                        while($row16= mysqli_fetch_array($query16)){
                        echo "<option>".$row16['p_name']."</option>";
                        }
                        ?>
                        </select>
                        
                        <select name="5t3">
                            <option>--Select--</option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                        <input type="text" name="5t4" id="5t4"><input type="text" name="5t5" id="5t5"oninput="price5()"><input type="text"name="5t6" id="5t6"><br>
                    
                    
                        <input type="text" name="6t1" size="5">
                        <select name="6t2" id="it2">
                        <option>----Select----</option>
                        <?php
                        $sel17 = "SELECT DISTINCT p_name FROM product";
                        $query17= mysqli_query($connect,$sel17);
                        while($row17= mysqli_fetch_array($query17)){
                        echo "<option>".$row17['p_name']."</option>";
                        }
                        ?>
                        </select>
                        <select name="6t3">
                            <option>--Select--</option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                        <input type="text" name="6t4" id="6t4"><input type="text" name="6t5" id="6t5"oninput="price6()"><input type="text"name="6t6" id="6t6"><br>
                    
                    
                        <input type="text" name="7t1" size="5">
                        <select name="7t2" id="it2">
                        <option>----Select----</option>    
                        <?php
                        $sel18 = "SELECT DISTINCT p_name FROM product";
                        $query18= mysqli_query($connect,$sel18);
                        while($row18= mysqli_fetch_array($query18)){
                        echo "<option>".$row18['p_name']."</option>";
                        }
                        ?>
                        </select>
                        <select name="7t3">
                            <option>--Select--</option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                        <input type="text" name="7t4" id="7t4"><input type="text" name="7t5" id="7t5"oninput="price7()"><input type="text"name="7t6" id="7t6"><br>
                    
                    
                        <input type="text" name="8t1" size="5">
                        <select name="8t2" id="it2">
                        <option>----Select----</option>    
                        <?php
                        $sel19 = "SELECT DISTINCT p_name FROM product";
                        $query19= mysqli_query($connect,$sel19);
                        while($row19= mysqli_fetch_array($query19)){
                        echo "<option>".$row19['p_name']."</option>";
                        }
                        ?>
                        </select>
                        <select name="8t3">
                            <option>--Select--</option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                        <input type="text" name="8t4" id="8t4"><input type="text" name="8t5" id="8t5"oninput="price8()"><input type="text"name="8t6" id="8t6"><br>
                    
                    
                        <input type="text" name="9t1" size="5">
                        <select name="9t2" id="it2">
                        <option>----Select----</option>    
                        <?php
                        $sel20 = "SELECT DISTINCT p_name FROM product";
                        $query20= mysqli_query($connect,$sel20);
                        while($row20= mysqli_fetch_array($query20)){
                        echo "<option>".$row20['p_name']."</option>";
                        }
                        ?>
                        </select>
                        <select name="9t3">
                            <option>--Select--</option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select> 
                        <input type="text" name="9t4" id="9t4"><input type="text" name="9t5" id="9t5"oninput="price9()"><input type="text"name="9t6" id="9t6"><br>
                    
                    
                        <input type="text" name="10t1" size="5">
                        <select name="10t2" id="it2">
                        <option>----Select----</option>    
                        <?php
                        $sel21 = "SELECT DISTINCT p_name FROM product";
                        $query21= mysqli_query($connect,$sel21);
                        while($row21= mysqli_fetch_array($query21)){
                        echo "<option>".$row21['p_name']."</option>";
                        }
                        ?>
                        </select>
                        <select name="10t3">
                            <option>--Select--</option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                        <input type="text" name="10t4" id="10t4"><input type="text" name="10t5" id="10t5"oninput="price10()"><input type="text"name="10t6" id="10t6">
                        <br><br>
                    
                    </div>
                    
                    <span> </span><br><br>
                    <div>
                        
                        <span id="s_total1">Total Amount : </span><input type="text" name="t1" id="total1" readonly/> 
                        <span id="s_gst">GST % :</span><input type="text" name="gst" id="gst">
                        <span id="s_payable">Bill Payable :</span><input type="text" name="f_total" id="payable" readonly/><br><br>
                    </div>
                    <input type="submit" name="submit" id="submit_data">
                    <a type="button" href="edite.php" id="a_search">Search</a>
                    <a href="wellcome.php" id="back">&#x1F519;</a>
                </form>
            </div>
        </div>
        <hr>
    </body>
</html>