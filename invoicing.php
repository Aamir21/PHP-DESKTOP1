<?php
include 'connection.php';

if(isset($_POST['submit'])){
    $s_name= $_POST['name'];
    $s_mobile= $_POST['mobile'];
    $bill_number= $_POST['bill'];
    $date= $_POST['date'];
    for($i=1;$i<=10;$i++){
        $d1= $_POST[$i.'t1'];
        $d2= $_POST[$i.'t2'];
        $d3= $_POST[$i.'t3'];
        $d4= $_POST[$i.'t4'];//Rate
        $d5= $_POST[$i.'t5'];//Unit
        $d6= $_POST[$i.'t6'];//Price
        if($d1==0){
            break;
        }
        
        
        $ins="INSERT INTO purchase_details (bill_number, p_id, p_name, P_weight , unite_price, qty, price) VALUES
        ('$bill_number','$d1', '$d2', '$d3', '$d4','$d5', '$d6')"; 
        mysqli_query($connect,$ins);
        $sel= "SELECT * FROM stock WHERE item_code='$d1'";
        $result= mysqli_query($connect,$sel);
        $myrow=mysqli_fetch_array($result);
        $data=$myrow['qty'];
        $data=$data+$d5;
        if($myrow!=null){
            $sql= "UPDATE stock SET qty='$data' WHERE item_code='$d1'";
            mysqli_query($connect, $sql);
        }
        else{
            $ins1= "INSERT INTO stock (item_code, item_name, weight, qty) VALUES ('$d1','$d2','$d3','$d5')";
            mysqli_query($connect, $ins1);
        }
        
        
        
    }
    
        
   
}

?>

<script type="text/javascript">

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
        <style>
            table, th, td {
              border: 1px solid black;
                            size:100px;
            }
        </style>
    </head>
    <body>
        <div>
            <div>
                <form method="post" action="#">
                    <span> Supplier Details</span><br><br>
                        <div>
                            <span>Supplier Name</span><input type="text" name="name">
                            <span>Mobile</span><input type="text" name="mobile">
                            <span>Bill Number</span><input type="text" name="bill">
                            <span>date</span><input type="text" name="date"/>
                            
                        </div>
                        <br><br> 
                        
                    <span> Billing details</span><br><br>
                        <table>
                          <tr>
                            <th style="width:65px">Item Code</th>
                            <th style="width:170px">Item Name</th>
                            <th style="width:170px">item weight</th>
                            <th style="width:172px">Rate</th>
                            <th style="width:171px">Quantity</th>
                            <th style="width:170px">Price</th>
                            
                          </tr>
                        </table>
                        
                        <input type="text" name="1t1" size="5"><input type="text" name="1t2"><input type="text" name="1t3"><input type="text" name="1t4" id="1t4"><input type="text" name="1t5" id="1t5"oninput="price1()"><input type="text"name="1t6" id="1t6"><br>
                    
                        <input type="text" name="2t1" size="5"><input type="text" name="2t2"><input type="text" name="2t3"><input type="text" name="2t4" id="2t4"><input type="text" name="2t5" id="2t5" oninput="price2()"><input type="text"name="2t6" id="2t6"><br>
                    
                        <input type="text" name="3t1" size="5"><input type="text" name="3t2"><input type="text" name="3t3"><input type="text" name="3t4" id="3t4"><input type="text" name="3t5" id="3t5"oninput="price3()"><input type="text"name="3t6" id="3t6"><br>
                    
                        <input type="text" name="4t1" size="5"><input type="text" name="4t2"><input type="text" name="4t3"><input type="text" name="4t4" id="4t4"><input type="text" name="4t5" id="4t5"oninput="price4()"><input type="text"name="4t6" id="4t6"><br>
                    
                        <input type="text" name="5t1" size="5"><input type="text" name="5t2"><input type="text" name="5t3"><input type="text" name="5t4" id="5t4"><input type="text" name="5t5" id="5t5"oninput="price5()"><input type="text"name="5t6" id="5t6"><br>
                    
                        <input type="text" name="6t1" size="5"><input type="text" name="6t2"><input type="text" name="6t3"><input type="text" name="6t4" id="6t4"><input type="text" name="6t5" id="6t5"oninput="price6()"><input type="text"name="6t6" id="6t6"><br>
                    
                        <input type="text" name="7t1" size="5"><input type="text" name="7t2"><input type="text" name="7t3"><input type="text" name="7t4" id="7t4"><input type="text" name="7t5" id="7t5"oninput="price7()"><input type="text"name="7t6" id="7t6"><br>
                    
                        <input type="text" name="8t1" size="5"><input type="text" name="8t2"><input type="text" name="8t3"><input type="text" name="8t4" id="8t4"><input type="text" name="8t5" id="8t5"oninput="price8()"><input type="text"name="8t6" id="8t6"><br>
                    
                        <input type="text" name="9t1" size="5"><input type="text" name="9t2"><input type="text" name="9t3"><input type="text" name="9t4" id="9t4"><input type="text" name="9t5" id="9t5"oninput="price9()"><input type="text"name="9t6" id="9t6"><br>
                    
                        <input type="text" name="10t1" size="5"><input type="text" name="10t2"><input type="text" name="10t3"><input type="text" name="10t4" id="10t4"><input type="text" name="10t5" id="10t5"oninput="price10()"><input type="text"name="10t6" id="10t6">
                        <br><br>
                    <span> GST details</span><br><br>
                    <div>
                        <span>Total Amount : </span><input type="text" name="total1" id="total1" disabled>  <span>GST 5% </span><input type="text" name="gst" id="gst">
                        <span>Bill Payable</span><input type="text" name="f_total"><br><br>
                    </div>
                    <input type="submit" name="submit"><a type="button" href="edite.php">Search</a>
                </form>
            </div>
        </div>
    </body>
</html>