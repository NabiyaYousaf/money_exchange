<?php

$username="root";
$password="";
$server="localhost";
$database="money_exchange";

$conn=mysqli_connect($server,$username,$password,$database);

if(!$conn){
    echo "<script>alert('Connection Failed')</script>";
}

$app_url="http://localhost/money_exchange/";


?>