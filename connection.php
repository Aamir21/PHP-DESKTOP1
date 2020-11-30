<?php
    $host='localhost';
    $user='root';
    $password='';
    $database='quest';
    $connect=mysqli_connect($host,$user,$password,$database);
    if($connect)
    {
        $a=1;
    }
    else
    {
        echo"not connected";
    }
?>