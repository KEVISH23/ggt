<?php
session_start();
if (!isset($_SESSION['id'])) {
    echo "<script>window.open('index.php','_self')</script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php
    include('../connect.php');
    global $conn;
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM student WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $final = mysqli_num_rows($result);
    if ($final > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $email = $row['email'];
            $username = $row['username'];
            $phone = $row['phone'];
            $gphone = $row['gphone'];
            $gender = $row['gender'];

            echo "
            <form action='update_profile.php' method='POST'>
        <div class='form-group'>
            <label for='email'>Email address</label>
            <input type='email' class='form-control' id='email' name='email' placeholder='$email' value='$email' aria-describedby='emailHelp'>

        </div>
        <div class='form-group'>
            <label for='phone'>Username</label>
            <input type='text' class='form-control' id='username' placeholder='$username' value='$username' name='username'>

        </div>
        <div class='form-group'>
            <label for='phone'>phone</label>
            <input type='text' class='form-control' id='phone' placeholder='$phone' value='$phone' name='phone'>

        </div>
        <div class='form-group'>
            <label for='gphone'>Gardien phone</label>
            <input type='text' class='form-control' id='gphone' placeholder='$gphone' value='$gphone' name='gphone'>

        </div>



        <button type='submit' class='btn btn-primary' name='save'>Save</button>
    </form>
            ";
        }
    }
    ?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>

<?php
include('../connect.php');
if (isset($_POST['save'])) {
    $id = $_SESSION['id'];
    $mail = $_POST['email'];
    $name = $_POST['username'];
    $phone = $_POST['phone'];
    $gphone = $_POST['gphone'];


    $plength = strlen($phone);
    $gplength = strlen($gphone);
    echo $plength;
    echo $gplength;

    if($plength==10 && $gplength==10){
        $sql = "UPDATE student SET email='$mail',username='$name',phone='$phone',gphone='$gphone' WHERE id='$id'";
        $conn->query($sql);
        echo "<script> alert('Account Updated');
        window.location.href='student_profile.php';
        </script>";
    }
    else{
        echo "<script> alert('Phone number length should be 10');
        window.location.href='update_profile.php';
        </script>";
    }
    

}

?>