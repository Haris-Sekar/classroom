<?php
include('./conn.php');
session_start();
if (!isset($_SESSION['email'])) {
  $_SESSION['msg'] = "You have to log in first";
  header('location: login.php');
}
$email=$_SESSION['email'];
$course_det=$_GET['course_det'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Course</title>
    <link rel="stylesheet" href="../assets/css/create_course_style.css">
    <style>
        label 
        {
            border: 2px solid transparent;
            width: 200px;
            background-color: indigo;
            color: white;
            padding: 0.5rem;
            font-family: sans-serif;
            border-radius: 0.3rem;
            cursor: pointer;
            margin-top: 1rem;
        }

        #file-chosen{
            margin-left: 0.3rem;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
<div class="user">
    <header class="user__header">
        <h1 class="user__title">Create a Assignment</h1>
    </header>
    
    <form class="form" method="POST" action="" enctype="multipart/form-data">
        <div class="form__group">
            <input type="text" placeholder="Assignment Name" class="form__input"  name="ass_name"/>
        </div>
        
        <div class="form__group">
            <input type="text" placeholder="Assignment Description" class="form__input"  name="ass_decp"/>
        </div>
        
        <div class="form__group1">
            <input type="file" id="actual-btn" name="ass"/>
        </div>
        
        <input class="btn" type="submit" name="submit" value="Add Course" style="cursor: pointer;">
    </form>
    <a href="../php/teacher_home.php" style="text-align: center; text-decoration:none;"  class="btn">Home</a>
</div>
</body>
</html>
<script>
    const actualBtn = document.getElementById('actual-btn');

const fileChosen = document.getElementById('file-chosen');

actualBtn.addEventListener('change', function(){
  fileChosen.textContent = this.files[0].name
})
</script>
<?php

if (isset($_POST["submit"]))

 {
     $assig_dec=$_POST['ass_decp'];
     $ass_name=$_POST['ass_name'];
     #retrieve file title
        $title = $ass_name;
     
    #file name with a random number so that similar dont get replaced
     $pname = rand(1000,10000)."-".$_FILES["ass"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["ass"]["tmp_name"];
   
     #upload directory path
    $uploads_dir = '../assets/assignment_pdfs';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
 
    #sql query to insert into database
    $sql = "INSERT INTO course_assingments(`couse_code`, `assingment_description`,`assignment_name`, `file_name`, `staff_mail_id`) VALUES ('$course_det','$assig_dec','$ass_name','$pname','$email');";
    $result=mysqli_query($conn,$sql);
    if($result){
 
    echo "File Sucessfully uploaded";
    }
    else{
        echo "Error";
    }
    
}
 
 ?>