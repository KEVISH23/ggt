<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "ggt";

$conn = mysqli_connect($localhost,$username,$password,$dbname);

if(!$conn){
    die("connection failed : ".mysqli_connect_error());
}


?>