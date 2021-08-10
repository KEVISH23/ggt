<?php
include('../connect.php');

$email = $_POST['email'];
$uname = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$phone = $_POST['phone'];
$gphone = $_POST['gphone'];
$gender = $_POST['gender'];

$plength = strlen($phone);
$gplength = strlen($gphone);

if($password==$cpassword){
    if($plenght==10 && $gplength==10){
        $sql = "INSERT INTO student(email,username,password,phone,gphone,gender) values('$email','$uname','$password','$phone','$gphone','$gender')";
        $conn->query($sql);
        echo "<script> alert('Account Created');
        window.location.href='index.php';
        </script>";
    }
    else{
        echo "<script> alert('Phone number length should be 10');
        window.location.href='index.php';
        </script>";
    }

        
}
else{
    echo "<script> alert('password did not match.');
        window.location.href='index.php';
        </script>";
}
?>