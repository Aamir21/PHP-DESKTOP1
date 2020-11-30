<?php
session_start();
$username=$_SESSION['user'];

include 'connection.php';
$sel30 = "SELECT * FROM saleinvoice ORDER BY bill_number DESC LIMIT 1";
$query30 = mysqli_query($connect, $sel30);
$row30 = mysqli_fetch_array($query30);
$get_bill= $row30['bill_number']+1;
//echo $get_bill;

if(isset($_POST['submit'])){
    $s_name= $_POST['name'];
    $s_mobile= $_POST['mobile'];
    $bill_number= $_POST['bill'];
    $date= $_POST['date'];
    $n_total= $_POST['t1'];
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
        //-------------code to check only added item can be mentioned in the invoice---------
        $sel11= "SELECT * FROM product WHERE p_name='$d2'&& p_weight='$d3'";
    $query11= mysqli_query($connect,$sel11);
    $result11= mysqli_fetch_array($query11);
        $numrow=mysqli_num_rows($query11);
    $id= $result11['p_id'];
       // echo $id;
        if($numrow==0){
             header("location: wellcome.php");
            exit;
        }
        //-----------------------------------------------------------------------------------
        //-----section for stock cheackimg before ypdare transaction -------------------------
        $sel40 = "SELECT * FROM stock WHERE item_name='$d2' && weight='$d3'";
        $pro40 = mysqli_query($connect, $sel40);
        $row40 = mysqli_fetch_array($pro40);
        if($row40['qty']<$d5){
            $error_message="stock not available for the item!";
            $_SESSION['stock']= $error_message ;
            $_SESSION['item']= $d2;
            header("location: sale.php");
            exit;
        }
        //--------------------------------------------------------------------------------------
        //------ inserting invoice in table and reducing stock accordingly----------------------
        
        $ins="INSERT INTO sale_details (bill_number, p_id, p_name, P_weight , unite_price, qty, price) VALUES
        ('$bill_number','$id', '$d2', '$d3', '$d4','$d5', '$d6')"; 
        mysqli_query($connect,$ins);
        $sel= "SELECT * FROM stock WHERE item_code='$id'";
        $result= mysqli_query($connect,$sel);
        $myrow=mysqli_fetch_array($result);
        $data=$myrow['qty'];
        $data=$data-$d5;
        if($myrow!=null){
            $sql= "UPDATE stock SET qty='$data' WHERE item_code='$id'";
            mysqli_query($connect, $sql);
        }
        else{
           $error='';
        }
        //--------------------------------------------------------------------------------------
        // pdf generation-----------------------------------------------------------------------
        
        
        
        
    }
    // -------------insertion into sale_invoice table-------------------------------------------
    
    
   $sale = "INSERT INTO saleinvoice (bill_number, customer_name, mobile, date, total, gst, grand_total)
    VALUES ('$bill_number','$s_name','$s_mobile','$date','$n_total','$gst','$g_total')";
    $s_i_p = mysqli_query($connect,$sale);
        
   //------------------------------------------------------------------------------------------
    //--------- automatic loading bill number after submition of an invice---------------------
    $sel30 = "SELECT * FROM saleinvoice ORDER BY bill_number DESC LIMIT 1";
    $query30 = mysqli_query($connect, $sel30);
    $row30 = mysqli_fetch_array($query30);
    $get_bill= $row30['bill_number']+1;
   // echo $get_bill;
//-----------------------------------------------------------------------------------------------    
}

?>

<script type="text/javascript">
    
    
    //GST FUNCTIONS
    
    function tax_counter(){
        
        var tax = parseInt(document.getElementById('gst').value);
        var gst1=parseInt(document.getElementById('total1').value);
        
        var net_payable = gst1 + gst1*tax/100;
        
        document.getElementById('payable').value=net_payable;
        
    }
    
    
    
    
    

    function price1(){
        var x1 = parseInt(document.getElementById('1t4').value);
        var y1 = parseInt(document.getElementById('1t5').value);
        
        document.getElementById('1t6').value=x1*y1;
            
        var z1 = parseInt(document.getElementById('1t6').value);
        
        document.getElementById('total1').value=z1;
        
        
        //var tax = document.getElementById('gst').value;
        //var gst1=document.getElementById('total1').value=z1;
        
        //var net_payable = gst1 + gst1*tax/100;
        
        //document.getElementById('payable').value=net_payable;
        
        
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
        
        //var net_payable = gst1 + gst1*5/100;
        
        
        //document.getElementById('payable').value=net_payable;
        
    }
    
    //TOTAL
    
    //Generate Bill
    
    function preview(){
        
        
        //var x1=document.getElementsByClassName('select1').selectedIndex;
        var x1=document.getElementById('item1').value;
        var x2=document.getElementById('item2').value;
        var x3=document.getElementById('item3').value;
        var x4=document.getElementById('item4').value;
        var x5=document.getElementById('item5').value;
        var x6=document.getElementById('item6').value;
        var x7=document.getElementById('item7').value;
        var x8=document.getElementById('item8').value;
        var x9=document.getElementById('item9').value;
        var x10=document.getElementById('item10').value;
        //document.getElementById('p1').innerHTML=x1;
        
        var w1=document.getElementById('1t3').value;
        var w2=document.getElementById('2t3').value;
        var w3=document.getElementById('3t3').value;
        var w4=document.getElementById('4t3').value;
        var w5=document.getElementById('5t3').value;
        var w6=document.getElementById('6t3').value;
        var w7=document.getElementById('7t3').value;
        var w8=document.getElementById('8t3').value;
        var w9=document.getElementById('9t3').value;
        var w10=document.getElementById('10t3').value;
        
        var q1=document.getElementById('1t4').value;
        var q2=document.getElementById('2t4').value;
        var q3=document.getElementById('3t4').value;
        var q4=document.getElementById('4t4').value;
        var q5=document.getElementById('5t4').value;
        var q6=document.getElementById('6t4').value;
        var q7=document.getElementById('7t4').value;
        var q8=document.getElementById('8t4').value;
        var q9=document.getElementById('9t4').value;
        var q10=document.getElementById('10t4').value;
        
        var r1=document.getElementById('1t5').value;
        var r2=document.getElementById('2t5').value;
        var r3=document.getElementById('3t5').value;
        var r4=document.getElementById('4t5').value;
        var r5=document.getElementById('5t5').value;
        var r6=document.getElementById('6t5').value;
        var r7=document.getElementById('7t5').value;
        var r8=document.getElementById('8t5').value;
        var r9=document.getElementById('9t5').value;
        var r10=document.getElementById('10t5').value;
        
        var price1= document.getElementById('1t6').value;
        var price2= document.getElementById('2t6').value;
        var price3= document.getElementById('3t6').value;
        var price4= document.getElementById('4t6').value;
        var price5= document.getElementById('5t6').value;
        var price6= document.getElementById('6t6').value;
        var price7= document.getElementById('7t6').value;
        var price8= document.getElementById('8t6').value;
        var price9= document.getElementById('9t6').value;
        var price10= document.getElementById('10t6').value;
        
        
        
        
       
        
        document.getElementById('p1').innerHTML=x1;
        document.getElementById('p2').innerHTML=x2;
        document.getElementById('p3').innerHTML=x3;
        document.getElementById('p4').innerHTML=x4;
        document.getElementById('p5').innerHTML=x5;
        document.getElementById('p6').innerHTML=x6;
        document.getElementById('p7').innerHTML=x7;
        document.getElementById('p8').innerHTML=x8;
        document.getElementById('p9').innerHTML=x9;
        document.getElementById('p10').innerHTML=x10;
        
        document.getElementById('w1').innerHTML=w1;
        document.getElementById('w2').innerHTML=w2;
        document.getElementById('w3').innerHTML=w3;
        document.getElementById('w4').innerHTML=w4;
        document.getElementById('w5').innerHTML=w5;
        document.getElementById('w6').innerHTML=w6;
        document.getElementById('w7').innerHTML=w7;
        document.getElementById('w8').innerHTML=w8;
        document.getElementById('w9').innerHTML=w9;
        document.getElementById('w10').innerHTML=w10;
        
        document.getElementById('q1').innerHTML=q1;
        document.getElementById('q2').innerHTML=q2;
        document.getElementById('q3').innerHTML=q3;
        document.getElementById('q4').innerHTML=q4;
        document.getElementById('q5').innerHTML=q5;
        document.getElementById('q6').innerHTML=q6;
        document.getElementById('q7').innerHTML=q7;
        document.getElementById('q8').innerHTML=q8;
        document.getElementById('q9').innerHTML=q9;
        document.getElementById('q10').innerHTML=q10;
        
        document.getElementById('r1').innerHTML=r1;
        document.getElementById('r2').innerHTML=r2;
        document.getElementById('r3').innerHTML=r3;
        document.getElementById('r4').innerHTML=r4;
        document.getElementById('r5').innerHTML=r5;
        document.getElementById('r6').innerHTML=r6;
        document.getElementById('r7').innerHTML=r7;
        document.getElementById('r8').innerHTML=r8;
        document.getElementById('r9').innerHTML=r9;
        document.getElementById('r10').innerHTML=r10;
        
        document.getElementById('price1').innerHTML=price1;
        document.getElementById('price2').innerHTML=price2;
        document.getElementById('price3').innerHTML=price3;
        document.getElementById('price4').innerHTML=price4;
        document.getElementById('price5').innerHTML=price5;
        document.getElementById('price6').innerHTML=price6;
        document.getElementById('price7').innerHTML=price7;
        document.getElementById('price8').innerHTML=price8;
        document.getElementById('price9').innerHTML=price9;
        document.getElementById('price10').innerHTML=price10;
        
        
        
        
            
        window.print();
        
    }
            
        
        
        
       
        
    
        
    
    
     
</script>

<!doctype html>
<html>
    <head>
        
        
        
        <style type="text/css">
            
            body{
                background-color: #FCFCE7;
                overflow-x: hidden;
            }
          
       /*     svg{
                
                
                
                position: relative;
                width: 40%;
                height: 40%;
                right: -150px;
                top: 210px;
                opacity: 0.7;
            }
        */
            
            
            
            table, th, td {
              border: 1px solid black;
                            size:100px;
            }
            
            #sell_form{
                display: block;
                font-size: 42px;
                font-family: Times New Roman;
                position: absolute;
                left: 500px;
                top: -20px;
            }
            
            
            #shopinfo{
                display: none;
            }
            
            #s_cdetails{
                font-family: Arial;
                background-color: #FCFCE7;
                position: absolute;
                margin-top: 68px;
                margin-left: 20px;
            }
            
            #customer_entry{
                width: auto;
                height: 50px;
                background-color:#FCFCE7; 
                border: solid thin grey;
                border-radius: 5px;
                padding-top: 36px;
                margin-top: 40px;
                
                
            }
            
            #hr1{
                margin-top: -20px;
            }
            
            
            #s_cname{
                font-family: Arial;
                font-size: 14px;
                font-weight: bold;
                margin-left: 20px;
            }
            #s_cmobile{
                margin-left: 30px;
                font-size: 14px;
                font-family: Arial;
                font-weight: bold;
            }
            #s_cbill{
                margin-left: 30px;
                font-size: 14px;
                font-family: Arial;
                font-weight: bold;
            }
            #s_cdate{
                margin-left: 30px;
                font-size: 14px;
                font-family: Arial;
                font-weight: bold;
            }
            
            #c_name{
                margin-left: 30px;
                border: solid thin black;
                border-radius: 0px;
                height: 23px;
            }
            #c_mobile{
                margin-left: 20px;
                border: solid thin black;
                border-radius: 0px;
                height: 23px;
                width: 120px;
            }
            #c_bill{
                margin-left: 20px;
                 border: solid thin gainsboro;
                border-radius: 0px;
                height: 23px;
                 background-color: #F5F5EE ;
                width: 140px;
                outline: none;
            }
            #c_date{
                margin-left: 20px;
                border: solid thin gainsboro;
                border-radius: 0px;
                height: 23px;
                outline: none;
                background-color: #F5F5EE ;
                width: 100px;
                
            }
            
            #table1{
                width: auto;
                height: auto;
                background-color: antiquewhite;
                margin-top: -20px;
                
            }
            
            #table1 tr th{
                font-family: Arial;
            }
            
            #bill_frame{
                width: auto;
                height: auto;
                background-color: #FCFCE7;
                border: solid thin grey;
                border-radius: 5px;
                padding-top: 40px;
                padding-left: 20px;
                padding-right: 20px;
                margin-top: -27px;
                
            }
            
            #s_billframetext{
                font-family: Arial;
                font-size: 16px;
                background-color: #FCFCE7;
                margin-left: 20px;
                
                
            }
            
            #s_total1{
                font-family: Arial;
                font-weight: bold;
            }
            #s_gst{
                font-family: Arial;
                font-weight: bold;
                margin-left: 40px;
            }
            #s_payable{
                font-family: Arial;
                font-weight: bold;
                margin-left: 40px;
            }
            
            #total1{
                border: solid thin gainsboro;
                background-color: #F5F5EE;
                border-radius: 0px;
                height: 23px;
                width: 160px;
                font-size: 16px;
                font-weight: bold;
                outline: none;
            }
            #gst{
                 border: solid thin grey;
                border-radius: 0px;
                width: 90px;
                height: 23px; 
            }
            #payable{
                border: solid thin gainsboro;
                border-radius: 0px;
                width: 160px;
                height: 23px;
                margin-left: 20px;
                background-color: #F5F5EE;
                outline: none;
                font-size: 16px;
                font-weight: bold;
            }
            
            #b_submit{
                width: 120px;
                height: 58px;
                background-color: #D5D599;
                border-radius: 30px;
                border: solid thin grey;
                font-family: Arial;
                font-size: 16px;
                box-shadow: 0 0 1px grey;
                transition: all 0.2s ease-out;
                margin-left: 1010px;
                position: absolute;
                margin-top: -60px;
                outline: none;
                box-shadow: 0 0 2px;
            }
            
            #b_submit:hover{
                box-shadow: 0 0 3px grey;
                transition: all 0.7s ease-out;
            }
            
            #bill_print{
                width: 120px;
                height: 30px;
                border: solid 2px black;
                background-color: white;
                border-radius: 16px;
                position: absolute;
                margin-left: 870px;
                margin-top: -60px;
                outline: none;
                box-shadow: 0 0 3px;
                
            }
            
            #bill_print:hover{
                box-shadow: 0 0 2px gray;
                transition: all 0.4s linear;
            }
            
            
            #a_search{
                 width: 120px;
                height: 23px;
                background-color: darkseagreen;
                text-align: center;
                right: 50px;
                top: 130px;
                border: dashed 1px black;
                border-radius: 16px;
                padding-top: 4px;
                position: absolute;
                text-decoration: none;
                font-family: Arial;
                filter: blur(0.2px);
                color: black;
            }
            #a_search:hover{
                box-shadow: 0 0 3px gray;
            }
            
            #back{
                width: 38px;
                height: 40px;
                background-color: darkseagreen;
                border:dashed thin black;
                border-radius: 35px;
                padding-top: 5px;
                padding-left: 10px;
                padding-bottom: 3px;
                font-size: 25px;
                text-decoration: none;
                position: absolute;
                top: 10px;
                color: black;
            }
            
            
            #logo_ad{
                position: absolute;
                font-weight: bold;
                font-size: 35px;
                right: 80px;
                margin-top: 4px;
                color: darkkhaki;
                opacity: 0.4;
            }
            
            #products{
                width: 550px;
                height: 250px;
                position: absolute;
                right: 50px;
                top: 250px;
                background-color: crimson;
                
            }
            
            #products div{
                float: left;
            }
            
            #item_display{
                width: 140px;
                height: 220px;
                background-color: burlywood;
               
                
            }
            #item_display p{
                margin-top: 3px;
                padding-top: 0px;
                line-height: 2px;
            }
            
            #weight_display{
                width: 100px;
                height: 220px;
                background-color: chocolate;
                
            }
            
            #weight_display p{
                margin-top: 3px;
                padding-top: 0px;
                line-height: 2px;
                
            }
            
            #quantity_display{
                width: 100px;
                height: 220px;
                background-color:cornflowerblue;
            }
            #quantity_display p{
                margin-top: 3px;
                padding-top: 0px;
                line-height: 2px;
            }
            
            
            
            #rate_display{
                width: 100px;
                height: 220px;
                background-color:gold;
            }
            #rate_display p{
                margin-top: 3px;
                padding-top: 0px;
                line-height: 2px;
            }
            
            
            #price_display{
                width: 100px;
                height: 220px;
                background-color:deeppink;
            }
            #price_display p{
                margin-top: 3px;
                padding-top: 0px;
                line-height: 2px;
            }
            
            
            
            
            
            
            
            
            
            #1t3{
                position: absolute;
                width: 280px;
                margin-left: 100px;
                color: red;
            }
            select {
                width: 170px;
                
                color: black;
                align-content: center;
        
            }
            
            #invoice{
                display: none;
            }
            
            #owner_sign{
                display: none;
            }
            
            
            
            
            
            
            
            
            /*preview*/
            
            @page{
                  size : portrait ;
                margin-left: 0.2cm;
                margin-right: 0.2cm;
                
               
            }
           
           
            
            
            @media print{
                
                body{
                     border: dotted 1px black;
                    margin-top: 200px;
                    
                }
                
                #shopinfo{
                    display: block;
                    position: absolute;
                    top: -35px;
                }
                #shopinfo p:nth-child(1){
                    font-size: 40px;
                    font-family: Arial;
                }
                #shopinfo p:nth-child(2){
                    font-size: 18px;
                    margin-top: -20px;
                }
                
                
                svg{
                    display: none;
                }
                
                
                #sell_form{
                    display: none;
                }
                
                
                #invoice{
                    display: block;
                    position: absolute;
                    font-size: 35px;
                    font-family: Arial;
                    
                    top: 120px;
                    left:320px; 
                    
                }
                
                #hr1{
                    display: none;
                }
                
                #bill_frame{
                    display: none;
                }
                
                
                select{
                    
                    display:none;
                    float: left;
                    border: none;
                    
                    color: black;
                    
                    
                }
                
                select option{
                    border: none;
                    
                }
                
                
                #products{
                    width: 550px;
                    position: absolute;
                    margin-top: 346px;
                    right: 420px;
                    
                }
                
                
                
                input{
                    width: 100px;
                    display:block;
                    float: left;
                    border: none;
                    
                    
                }
                
                
                #s_cdetails{
                    
                    position: absolute;
                    margin-top: -45px;
                    left: 20px;
                    font-size: 20px;
                    text-decoration: underline;
                    font-family: Arial;
                }
                
                
                #customer_entry{
                    border: none;
                }
                
                
                #s_cname{
                    position: absolute;
                    left: 5px;
                    display: block;
                    margin-top: -20px;
                    font-weight: bold;
                }
                
                #s_cmobile{
                    font-weight: bold;
                    position: absolute;
                    left: 300px;
                    margin-top: -20px;
                    
                }
                #s_cbill{
                    position: absolute;
                    right: 160px;
                    margin-top: -20px;
                    font-weight: bold;
                    
                }
                #s_cdate{
                    position: absolute;
                    display: none;
                }
                
                #bill_frame{
                    display: block;
                    background-color: transparent;
                    border: none;
                    
                    
                }
                
                #bill_frame input{
                    
                }
                
                
                
                
                
                
                #c_name{
                    position: absolute;
                    margin-left: 135px; 
                    margin-top: -20px;
                    width: 160px;
                    border: none;
                }
                
                #c_mobile{
                    position: absolute;
                    left: 370px;
                    margin-top: -20px;
                    border: none;
                    
                }
                #c_bill{
                    position: absolute;
                    right: 15px;
                    margin-top: -20px;
                    width: 130px;
                    border: none;
                    
                }
                
                #c_date{
                    position: absolute;
                    top: 210px;
                    right: 50px;
                    
                    display: block;
                    border: none;
                }
                
                
                
                #s_total1{
                    
                    position: absolute;
                    left: 50px;
                    font-weight: bold;
                    
                }
                
                #total1{
                    position: absolute;
                    left: 190px;
                    font-weight: bold;
                    border: none;
                    
                }
                
                
                #s_gst{
                    position: absolute;
                    left: 20px;
                    margin-top: 20px;
                     font-weight: bold;
                    
                }
                #s_payable{
                    position: absolute;
                    left: 20px;
                    margin-top: 40px;
                     font-weight: bold;
                }
                
                #payable{
                     position: absolute;
                    left: 170px;
                    margin-top: 40px;
                     font-weight: bold;
                    border: none;
                }
                #gst{
                    position: absolute;
                    left: 190px;
                    margin-top: 20px;
                    border: none;
                     
                }
                
                
                
                
                #b_submit{
                    display: none;
                    
                }
                
                #bill_print{
                    display: none;
                    
                }
                
                
                
                #gst_details{
                    display: none;
                }
                #a_search{
                    display: none;
                }
                
                #owner_sign{
                    
                    display: block;
                    position: absolute;
                    right: 70px;
                    margin-top: 100px;
                }
                
                
                #a_search{
                   display: none;
                } 
                #back{
                    display: none;
                }
                
                #logo_ad{
                    display: none;
                }
               
                #hr2{
                    display: none;
                }
                
                
                /*
                
                input:nth-child(4n-3){
                    width: 40px;
                }
                
                input:nth-child(4n-2){
                    width: 110px;
                }
                input:nth-child(4n-1){
                    width: 100px;
                }
                input:nth-child(4n){
                    width: 100px;
                }
                
                selct:nth-child(2n-1){
                    width: 150px;
                    
                }
                selct:nth-child(2n){
                    width: 150px;
                    
                }
                
                */
                
                
                
               
            
                
                
               
                
             /*    40, 150,150,100,100,100
                
                
                #1t1{
                    width: 40px;
                     float: left;
                    
                }
                 #2t1{
                    width: 40px;
                      float: left;
                    
                }
                 #3t1{
                    width: 40px;
                     float: left;
                }
                 #4t1{
                    width: 40px;
                     float: left;
                }
                 #5t1{
                    width: 40px;
                     float: left;
                }
                 #6t1{
                    width: 40px;
                     float: left;
                }
                 #7t1{
                    width: 40px;
                     float: left;
                }
                 #8t1{
                    width: 40px;
                     float: left;
                }
                 #9t1{
                    width: 40px;
                     float: left;
                }
                 #10t1{
                    width: 40px;
                     float: left;
                }
                
                
            */    
                
                /* Rate dimension */
                
              
                
                
                
                
             
                
                
            }
            
          
            
           
            
            
            
            
            
            
        </style>
    </head>
    <body>
        
        <div id="shopinfo">
            <p>PRINCE ENTERPRISES</p>
            <p>+91-8757982286, +91-8340447718</p>
        
        </div>
        
        <p id="sell_form">SELLING ENTRY</p>
        
        <label id="invoice"><u>Invoice</u></label>
        
        <div id="invoice1">
            <div>
                <form method="post" action="#">
                    <span id="s_cdetails"> Customer Details</span><br><br>
                        <div id="customer_entry">
                            <span id="s_cname">Customer Name :</span><input type="text" name="name" id="c_name" required>
                            <span id="s_cmobile">Mobile :</span><input type="text" name="mobile" maxlength="10" id="c_mobile" required>
                            <span id="s_cbill">Bill Number :</span><input type="text" name="bill" id="c_bill" value="<?php echo $get_bill  ?> " readonly>
                            <span id="s_cdate">Date :</span><input type="text" name="date" id="c_date" value="<?php echo date('d.m.yy')  ?> " readonly/>
                            
                        </div>
                        <br><br> 
                        <hr id="hr1">
                        
                    <span id="s_billframetext"> Billing Details</span><br><br>
                    <div id="bill_frame">                               <!----Div Added by Mintu--->
                        <table id="table1">
                          <tr>
                            <th style="width:65px" id="th1">S.N</th>
                            <th style="width:170px" id="th2">Item Name</th>
                            <th style="width:170px" id="th3">Item Weight</th>
                            <th style="width:172px" id="th4">Rate</th>
                            <th style="width:171px" id="th5">Quantity</th>
                            <th style="width:170px" id="th6">Price</th>
                            
                          </tr>
                        </table>
                        
                        <input type="text" name="1t1" size="5" value="01" readonly>
                        <select name="1t2" id="item1">
                        <option></option>    
                        <?php
                        $sel12 = "SELECT DISTINCT p_name FROM product";
                        $query12= mysqli_query($connect,$sel12);
                        while($row12= mysqli_fetch_array($query12)){
                        echo "<option>".$row12['p_name']."</option>";
                        }
                        ?>
                        </select>
                    
                        <select name="1t3" id="1t3">
                            
                            
                            <option></option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                        
                        <input type="text" name="1t4" id="1t4"><input type="text" name="1t5" id="1t5"oninput="price1()"><input type="text"name="1t6" id="1t6"><br>
                        
                    
                        <input type="text" name="2t1" size="5" value="02" readonly>
                        <select name="2t2" id="item2" class="select2">
                        <option></option>    
                        <?php
                        $sel13 = "SELECT DISTINCT p_name FROM product";
                        $query13= mysqli_query($connect,$sel13);
                        while($row13= mysqli_fetch_array($query13)){
                        echo "<option>".$row13['p_name']."</option>";
                        }
                        ?>
                        </select>
                        <select name="2t3" id="2t3">
                            <option></option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                        <input type="text" name="2t4" id="2t4"><input type="text" name="2t5" id="2t5" oninput="price2()"><input type="text"name="2t6" id="2t6"><br>
                    
                    
                        <input type="text" name="3t1" size="5" value="03" readonly>
                        
                        <select name="3t2" id="item3">
                        <option></option>    
                        <?php
                        $sel14 = "SELECT DISTINCT p_name FROM product";
                        $query14= mysqli_query($connect,$sel14);
                        while($row14= mysqli_fetch_array($query14)){
                        echo "<option>".$row14['p_name']."</option>";
                        }
                        ?>
                        </select>
                        <select name="3t3" id="3t3">
                            <option></option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                    
                        <input type="text" name="3t4" id="3t4"><input type="text" name="3t5" id="3t5"oninput="price3()"><input type="text"name="3t6" id="3t6"><br>
                    
                    
                        <input type="text" name="4t1" size="5" value="04" readonly>
                    
                        <select name="4t2" id="item4">
                        <option></option>    
                        <?php
                        $sel15 = "SELECT DISTINCT p_name FROM product";
                        $query15= mysqli_query($connect,$sel15);
                        while($row15= mysqli_fetch_array($query15)){
                        echo "<option>".$row15['p_name']."</option>";
                        }
                        ?>
                        </select>
                        
                        <select name="4t3" id="4t3">
                            <option></option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                        <input type="text" name="4t4" id="4t4"><input type="text" name="4t5" id="4t5"oninput="price4()"><input type="text"name="4t6" id="4t6"><br>
                    
                    
                        <input type="text" name="5t1" size="5" value="05" readonly>
                        <select name="5t2" id="item5">
                        <option></option>
                        <?php
                        $sel16 = "SELECT DISTINCT p_name FROM product";
                        $query16= mysqli_query($connect,$sel16);
                        while($row16= mysqli_fetch_array($query16)){
                        echo "<option>".$row16['p_name']."</option>";
                        }
                        ?>
                        </select>
                        
                        <select name="5t3" id="5t3">
                            <option></option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                        <input type="text" name="5t4" id="5t4"><input type="text" name="5t5" id="5t5"oninput="price5()"><input type="text"name="5t6" id="5t6"><br>
                    
                    
                        <input type="text" name="6t1" size="5" value="06" readonly>
                        <select name="6t2" id="item6">
                        <option></option>
                        <?php
                        $sel17 = "SELECT DISTINCT p_name FROM product";
                        $query17= mysqli_query($connect,$sel17);
                        while($row17= mysqli_fetch_array($query17)){
                        echo "<option>".$row17['p_name']."</option>";
                        }
                        ?>
                        </select>
                        <select name="6t3" id="6t3">
                            <option></option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                        <input type="text" name="6t4" id="6t4"><input type="text" name="6t5" id="6t5"oninput="price6()"><input type="text"name="6t6" id="6t6"><br>
                    
                    
                        <input type="text" name="7t1" size="5" value="07" readonly>
                        <select name="7t2" id="item7">
                        <option></option>    
                        <?php
                        $sel18 = "SELECT DISTINCT p_name FROM product";
                        $query18= mysqli_query($connect,$sel18);
                        while($row18= mysqli_fetch_array($query18)){
                        echo "<option>".$row18['p_name']."</option>";
                        }
                        ?>
                        </select>
                        <select name="7t3" id="7t3">
                            <option></option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                        <input type="text" name="7t4" id="7t4"><input type="text" name="7t5" id="7t5"oninput="price7()"><input type="text"name="7t6" id="7t6"><br>
                    
                    
                        <input type="text" name="8t1" size="5" value="08" readonly>
                        <select name="8t2" id="item8">
                        <option></option>    
                        <?php
                        $sel19 = "SELECT DISTINCT p_name FROM product";
                        $query19= mysqli_query($connect,$sel19);
                        while($row19= mysqli_fetch_array($query19)){
                        echo "<option>".$row19['p_name']."</option>";
                        }
                        ?>
                        </select>
                        <select name="8t3" id="8t3">
                            <option></option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                        <input type="text" name="8t4" id="8t4"><input type="text" name="8t5" id="8t5"oninput="price8()"><input type="text"name="8t6" id="8t6"><br>
                    
                    
                        <input type="text" name="9t1" size="5" value="09" readonly>
                        <select name="9t2" id="item9">
                        <option></option>    
                        <?php
                        $sel20 = "SELECT DISTINCT p_name FROM product";
                        $query20= mysqli_query($connect,$sel20);
                        while($row20= mysqli_fetch_array($query20)){
                        echo "<option>".$row20['p_name']."</option>";
                        }
                        ?>
                        </select>
                        <select name="9t3" id="9t3">
                            <option></option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select> 
                        <input type="text" name="9t4" id="9t4"><input type="text" name="9t5" id="9t5"oninput="price9()"><input type="text"name="9t6" id="9t6"><br>
                    
                    
                        <input type="text" name="10t1" size="5" value="10" readonly>
                        <select name="10t2" id="item10">
                        <option></option>    
                        <?php
                        $sel21 = "SELECT DISTINCT p_name FROM product";
                        $query21= mysqli_query($connect,$sel21);
                        while($row21= mysqli_fetch_array($query21)){
                        echo "<option>".$row21['p_name']."</option>";
                        }
                        ?>
                        </select>
                        <select name="10t3" id="10t3">
                            <option></option>
                            <option>1kilogram</option>
                            <option>500gram</option>
                            <option>250gram</option>
                            <option>100gram</option>
                            <option>50gram</option>
                        </select>
                        <input type="text" name="10t4" id="10t4"><input type="text" name="10t5" id="10t5"oninput="price10()"><input type="text"name="10t6" id="10t6">
                        <br><br>
                        
                    </div>
                    <span id="gst_details"></span><br><br>
                    
                    
                    <div id="products">
                        <div id="item_display">                 <!--ITEM BILL Display-->
                        
                            <p id="p1">h1</p>
                            <p id="p2">h1</p>
                            <p id="p3">h1</p>
                            <p id="p4">h1</p>
                            <p id="p5">h1</p>
                            <p id="p6">h1</p>
                            <p id="p7">h1</p>
                            <p id="p8">h1</p>
                            <p id="p9">h1</p>
                            <p id="p10">h1</p>
                    
                        
                        </div>
                        
                        <div id="weight_display">
                            <p id="w1">w1</p>
                            <p id="w2">w1</p>
                            <p id="w3">w1</p>
                            <p id="w4">w1</p>
                            <p id="w5">w1</p>
                            <p id="w6">w1</p>
                            <p id="w7">w1</p>
                            <p id="w8">w1</p>
                            <p id="w9">w1</p>
                            <p id="w10">w1</p>
                        
                        
                        </div>
                        <div id="quantity_display">
                            <p id="q1">q1</p>
                            <p id="q2">q1</p>
                            <p id="q3">q1</p>
                            <p id="q4">q1</p>
                            <p id="q5">q1</p>
                            <p id="q6">q1</p>
                            <p id="q7">q1</p>
                            <p id="q8">q1</p>
                            <p id="q9">q1</p>
                            <p id="q10">q1</p>
                        
                        </div>
                        <div id="rate_display">
                            <p id="r1">r1</p>
                            <p id="r2">r1</p>
                            <p id="r3">r1</p>
                            <p id="r4">r1</p>
                            <p id="r5">r1</p>
                            <p id="r6">r1</p>
                            <p id="r7">r1</p>
                            <p id="r8">r1</p>
                            <p id="r9">r1</p>
                            <p id="r10">r1</p>
                        
                        </div>
                        <div id="price_display">
                            <p id="price1">price1</p>
                            <p id="price2">price1</p>
                            <p id="price3">price1</p>
                            <p id="price4">price1</p>
                            <p id="price5">price1</p>
                            <p id="price6">price1</p>
                            <p id="price7">price1</p>
                            <p id="price8">price1</p>
                            <p id="price9">price1</p>
                            <p id="price10">price1</p>
                        
                        </div>
                        
                        
                    </div>
                    
                    <div>
                        
                        <span id="s_total1">Total Amount : </span><input type="text" name="t1" id="total1" readonly> 
                        <span id="s_gst">GST(in %):  </span><input type="text" name="gst" id="gst" oninput="tax_counter()">
                        <span id="s_payable">Bill Payable :</span><input type="text" name="f_total" id="payable" readonly><br><br>
                    </div>
                    <input type="submit" name="submit" id="b_submit"><a type="button" id="a_search" href="edite.php">Search</a>
                    
                </form>
                
                
                <button id="bill_print" onclick= "preview()">Generate Bill</button>
                
                <label id="owner_sign">Sign:</label>
                <a href="wellcome.php" id="back">&#x1F519;</a>
                
                <hr id="hr2">
                
                <p id="logo_ad">Cyberovate.in</p>
            </div>
        </div>
    </body>
</html>