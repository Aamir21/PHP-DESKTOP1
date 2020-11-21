<?php
    $host='localhost';
    $user='root';
    $password='';
    $database='quest';
    $connect=mysqli_connect($host,$user,$password,$database);
    if($connect)
    {
    echo"connected";
    }
    else
    {
        echo"not connected";
    }
?>