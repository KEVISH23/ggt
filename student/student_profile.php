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
    <link rel="stylesheet" href="student.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Student Profile</title>
</head>

<body style="background-color: linear-gradient(to bottom, #66ff99 0%, #000066 100%);">
    <?php
    include('../partials/sidebar.php');
    ?>
    <div>
        <?php
        include('../connect.php');


        $id = $_SESSION['id'];
        $sql = "SELECT * FROM student WHERE id='$id'";

        $results = mysqli_query($conn, $sql);

        if ($results) {
            $rowcount = mysqli_num_rows($results);
            if ($rowcount > 0) {
                while ($row = mysqli_fetch_array($results)) {
                    $mail = $row['email'];
                    $name = $row['username'];
                    $phone = $row['phone'];
                    $gphone = $row['gphone'];
                    $gender = $row['gender'];
                    
                    /*echo "<h3><label>Mail</label> : $mail</h3><hr>";
                    echo "<h3><label>Username</label> : $name</h3><hr>";
                    echo "<h3><label>Phone No</label> : $phone</h3><hr>";
                    echo "<h3><label>Gardien Phone No</label> : $gphone</h3><hr>";
                    echo "<h3><label>Gender</label> : $gender</h3><hr>";*/
                }
            }
        }
        ?>
        <div class="content" style="text-align: left;">
        <div class="w-auto p-3" style="height: 100px; background-color: #F0F8FF;"><b>Mail: </b><?php echo $mail;?></div>
        <div class="w-auto p-3" style="height: 100px; background-color: #FAEBD7;"><b>Username: </b><?php echo $name;?></div>
        <div class="w-auto p-3" style="height: 100px; background-color: #00FFFF;"><b>Phone No: </b><?php echo $phone;?></div>
        <div class="w-auto p-3" style="height: 100px; background-color: #DEB887;"><b>Gardien Phone No: </b><?php echo $gphone;?></div>
        <div class="w-auto p-3" style="height: 100px; background-color: #5F9EA0;"><b>Gender: </b><?php echo $gender;?></div>
        <form action="update_profile.php">
        <button type="submit" class="btn btn-success btn-lg ml-1 mt-4">Edit Profile</button>
        </form>
        </div>
    </div>
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