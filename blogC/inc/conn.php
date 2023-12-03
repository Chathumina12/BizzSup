<?php
$servername="localhost";
$username="root";
$password="";
$dbname="bizzsup";

$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die("connection failed ".mysqli_error($conn));
}



?>