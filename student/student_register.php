<?php
include('../connect.php');

$email = $_POST['email'];
$uname = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$phone = $_POST['phone'];
$gphone = $_POST['gphone'];
$gender = $_POST['gender'];

if($password == $cpassword){
    $sql = "INSERT INTO student(email,username,password,phone,gphone,gender) values('$email','$uname','$password','$phone','$gphone','$gender')";
    $conn->query($sql);
    echo "<script> alert('Account Created');
        window.location.href='index.php';
        </script>";
}
else{
    echo "<script> alert('password did not match.');
        window.location.href='index.php';
        </script>";
}
?>