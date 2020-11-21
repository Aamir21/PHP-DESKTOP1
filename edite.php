<?php
include 'connection.php';
$v=1;
if(isset($_POST['find'])){
    $key= $_POST['search'];
    $query_s= "SELECT * FROM purchase_details WHERE bill_number='$key'";
    $pro_s= mysqli_query($connect, $query_s);
    $num=mysqli_num_rows($pro_s);
    echo "<br>";
    echo $num; echo "<br>";
    $i=0;
    while($row= mysqli_fetch_array($pro_s)){
        $data[$i][0]= $row['p_id'];
        $data[$i][1]= $row['p_name'];
        $data[$i][2]= $row['p_weight'];
        $data[$i][3]= $row['unite_price'];
        $data[$i][4]= $row['qty'];
        $data[$i][5]= $row['price'];
        $i++;
        echo "<input type='text' name='1t1' size='5' value="."<?php echo $data[$i][1] ?>".">"."<input type='text' name='1t2'>"."<input type='text' name='1t3'>"."<input type='text' name='1t4' id='1t4'>"."<input type='text' name='1t5' id='1t5'oninput='price1()'>"."<input type='text'name='1t6' id='1t6'>"."<br>";
    }
    echo $data[0][0]; echo "<br>";
    echo $data[0][1]; echo "<br>";
    echo $data[0][2]; echo "<br>";
    echo $data[0][3]; echo "<br>";
    echo $data[0][4]; echo "<br>";
    echo $data[0][5]; echo "<br>";
    
    echo $data[1][0]; echo "<br>";
    echo $data[1][1]; echo "<br>";
    echo $data[1][2]; echo "<br>";
    echo $data[1][3]; echo "<br>";
    echo $data[1][4]; echo "<br>";
    echo $data[1][5]; echo "<br>";
    
    
}

   
?>
<!doctype html>
<html>
    <head>
        
    </head>
    <body>
        <form method="post" action="#">
            <input type="text" name="search">
            <input type="submit" name="find">
        </form>
        
    </body>
</html>