<?php
session_start();
if(isset($_POST['login'])){
    include('../connect.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM student WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    $final = $result->fetch_assoc();

    if($email==$final['email'] AND $password==$final['password']){
        $_SESSION['id'] = $final['id'];
        $_SESSION['email'] = $final['email'];
        $_SESSION['password'] = $final['password'];

        header('location: home.php');
    }
    else{
        echo "<script> alert('Invalid Cradentials');
        window.location.href='index.php';
        </script>";
    }
}
