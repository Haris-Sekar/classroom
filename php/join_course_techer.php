<?php
include('./conn.php');
session_start();
if (!isset($_SESSION['email'])) {
  $_SESSION['msg'] = "You have to log in first";
  header('location: login.php');
}
$email=$_SESSION['email'];
date_default_timezone_set('Asia/Kolkata');
$timestrap=date("Y-m-d h:i:s");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../assets/images/classroom_icon.png" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Course</title>
    <link rel="stylesheet" href="../assets/css/create_course_style.css">
    
</head>
<body>
<div class="user">
    <header class="user__header">
        <h1 class="user__title">Join a Course</h1>
    </header>
    
    <form class="form" method="post" action="">
        <div class="form__group">
            <input type="text" placeholder="Enter the Course code" class="form__input"  name="course_code" autocomplete="off"/>
        </div>
    
        <input class="btn" type="submit" name="submit" value="Join Course" >
    </form><br>
    <a href="../php/teacher_home.php" style="text-align: center; text-decoration:none;"  class="btn">Home</a>
</div>
</body>
</html>
<script>
    const button = document.querySelector('.btn')
const form   = document.querySelector('.form')

button.addEventListener('click', function() {
   form.classList.add('form--no') 
});
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

<?php

if(isset($_POST['submit'])){
    

    $course_code=$_POST['course_code'];
    $sql_course_exist="SELECT * FROM join_course WHERE `leaner_mail_id`='$email' AND `course_code`='$course_code'";
    $res_course_exist=mysqli_query($conn,$sql_course_exist);
    if(mysqli_num_rows($res_course_exist)>=1){
        echo '<script>Swal.fire("Already Joined");</script>';
    }else{
        $sql_course_check="SELECT * FROM staff_course_proposal WHERE course_code ='$course_code'";
        $res_course_check=mysqli_query($conn,$sql_course_check);
        if(mysqli_affected_rows($conn)==1){
            $sql_join_course="INSERT INTO `join_course`(`leaner_mail_id`, `course_code`) VALUES ('$email','$course_code')" ;
            $res_join_course=mysqli_query($conn,$sql_join_course);
            if(!mysqli_error($conn)){
                ?>
                    <script>
                            window.location.href='teacher_home.php';
                    </script>
                <?php
            }
        }else{
            echo "<script>alert('no such code');</script>";
        }
    }
}

?>
