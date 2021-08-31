<?php
include('./conn.php');
session_start();
$email=$_SESSION['email'];

$sql_verify_teacher="SELECT * FROM users WHERE email='$email'";
$res_verify_teacher=mysqli_query($conn,$sql_verify_teacher);

while($row_verify=mysqli_fetch_array($res_verify_teacher)){
    $autho=$row_verify['roll_of_person'];
}
if($autho!='teacher'){
    session_destroy();
    header('location: ../index.php');

}
if (!isset($_SESSION['email'])) {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../index.php');
}
$post_id=$_GET['id'];

//sql to delete a assignment

?>
<head>
<link rel="shortcut icon" href="../assets/images/classroom_icon.png" />

    <style>
        .confirm_delte{
                border: 2px solid #dfe7fd;
                font-family: 'Cairo', sans-serif;
                margin: auto;
                width: 500px;
                text-align: center;
                margin-top: 50px;
                background-color: #dfe7fd;
                border-radius: 10px;

        }
        .button{
  border: none;
  font-family: 'Cairo', sans-serif;
  cursor: pointer;
  background-color: #6154fe;
  color: white;
  width: auto;
  height: 30px;
  border-radius: 5px;
  box-shadow: 0 3px #999;
  position: relative;

}
.button:hover{
  background-color: #4CAF50;
  color: black;
}
.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
    </style>
</head>
<div class="confirm_delte">
<form action="" method="POST">
<h2>Do you want to delete the Assignment</h2>
        <input type="submit" value="Yes" name="yes" class="button" style="width: 70px;">
        <input type="submit" value="No" name="no" class="button" style="width: 70px;">
</form>
</div>
<?php
if(isset($_POST['yes'])){
  $sql_delete_ass="DELETE FROM `course_posts` WHERE `post_id` = '$post_id'";

    $res_delete_ass=mysqli_query($conn,$sql_delete_ass);
    echo " Page will Refresh in<progress value='0' max='10' id='progressBar'></progress>";
    header('Refresh:5; url=teacher_home.php');
    
}else{
  echo " Page will Refresh in<progress value='0' max='10' id='progressBar'></progress>";

  header('Refresh:10; url=teacher_home.php');
  
}
?>


<script>
  var timeleft = 5;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
  }
  document.getElementById("progressBar").value = 5 - timeleft;
  timeleft -= 1;
}, 1000);
</script>