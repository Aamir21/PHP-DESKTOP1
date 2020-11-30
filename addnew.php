<?php
include 'connection.php';

if(isset($_POST['sub'])){
   $itemname= $_POST['itemname'];
   $itemweight= $_POST['itemweight']; 
   $ins21= "INSERT INTO product (p_name, p_weight) VALUES ('$itemname','$itemweight')"  ;  
   $pro21= mysqli_query($connect, $ins21);
    if($pro21){
        header("location: wellcome.php");
    }
}


?>