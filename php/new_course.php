<?php
include('./conn.php');
session_start();
if (!isset($_SESSION['email'])) {
  $_SESSION['msg'] = "You have to log in first";
  header('location: login.php');
}
$email=$_SESSION['email'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Course</title>
    <link rel="stylesheet" href="../assets/css/create_course_style.css">
    
</head>
<body>
<div class="user">
    <header class="user__header">
        <h1 class="user__title">Create a Course</h1>
    </header>
    
    <form class="form" method="post" action="">
        <div class="form__group">
            <input type="text" placeholder="Course Name" class="form__input"  name="course_name"/>
        </div>
        
        <div class="form__group">
            <input type="text" placeholder="Course Discription" class="form__input"  name="couuse_decp"/>
        </div>
        
        <div class="form__group">
            <input type="text" placeholder="Class Name" class="form__input" name="classname" />
        </div>
        
        <input class="btn" type="submit" name="submit" value="Add Course">
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


<?php

if(isset($_POST['submit'])){
    function random_string($length) {
        $key = '';
        $keys = array_merge(range('A', 'Z'), range('a', 'z',),range(0,9));
    
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
    
        return $key;
    }
    
    $key1=random_string(8);

    $course_name=$_POST['course_name'];
    $course_decp=$_POST['couuse_decp'];
    $course_class=$_POST['classname'];

    $sql="INSERT INTO `staff_course_proposal`(`staff_mail_id`, `course_code`, `course_name`, `class_name`, `course_description`) VALUES ('$email','$key1','$course_name','$course_class','$course_decp')";
    $res=mysqli_query($conn,$sql);
    if(!mysqli_error($conn)){
        ?>
            <script>
                var txt;
                if (confirm("Your Class Code is: <?php echo $key1; ?>")) {
                    window.location.href='teacher_home.php';
                } 
            </script>
        <?php
    }

}


?>