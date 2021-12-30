<?php

include('./conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../assets/images/classroom_icon.png" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../assets/css/signup_style.css">
</head>
<body>
    <form action="" method="post">
    <div class="container">
        <p class="heading">Sign Up</p>
        <div class="box">
            <p>Name</p>
            <div>
                <input type="text" name="name" id="" placeholder="Enter Your Name">
            </div>
        </div>
        <div class="box">
            <p>Email</p>
            <div>
                <input type="email" name="email" id="" placeholder="Enter Your Email">
            </div>
        </div>
        <div class="box">
            <p>Phone Number</p>
            <div>
                <input type="number" name="phone" id="" placeholder="Enter Your Phone Number">
            </div>
        </div>
        <div class="box">
            <p>Password</p>
            <div>
                <input type="password" name="password" id="" placeholder="Enter Your password">
            </div>
        </div>
        <div class="box">
            <p>Date of Birth</p>
            <div>
                <input type="date" name="dob" id="" placeholder="Enter Your Password">
            </div>
        </div> 
            <p>You are:</p>
            <div>
                <input type="radio" name="roll" id="" value="teacher">Teacher
                <input type="radio" name="roll" id="" value="student">Student

            </div>
        <div class="box">
            <p>Roll Number(if student)</p>
            <div>
                <input type="text" name="roll_number" id="" placeholder="Enter Your Roll Number">
            </div>
        </div> 
        <input type="submit" class="loginBtn" name="submit" value="Sign Up">
    </div>
    </form>
</body>
</html>

<?php 

if(isset($_POST['submit'])){
    date_default_timezone_set('Asia/Kolkata');
    $timestrap=date("Y-m-d h:i:s");
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=md5($_POST['password']);
    $roll=$_POST['roll'];
    $dob=$_POST['dob'];
    $roll_number=$_POST['roll_number'];
    $sql_reg="INSERT INTO users(`email`, `name`, `phone number`, `password`, `date of birth`, `roll_of_person`, `roll_number`) VALUES ('$email','$name','$phone','$password','$dob','$roll','$roll_number')";
    $res_reg=mysqli_query($conn,$sql_reg);
    if(mysqli_error($conn)){
        echo mysqli_error($conn);
    }
    else{
        header('location:../index.php');
    }
}

?>