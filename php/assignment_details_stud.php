<?php
include('./conn.php');
session_start();
if (!isset($_SESSION['email'])) {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../index.php');
}
$email=$_SESSION['email'];
$sql_verify_teacher="SELECT * FROM users WHERE email='$email'";
$res_verify_teacher=mysqli_query($conn,$sql_verify_teacher);

while($row_verify=mysqli_fetch_array($res_verify_teacher)){
    $autho=$row_verify['roll_of_person'];
}
$home='student';
$mark="Yet to Reward";
if($autho=='teacher'){
	$home='teacher';

}
$assignment_id=$_GET['assignment_id'];
$sql_course_assign_fetch="SELECT * FROM course_assingments WHERE assignment_id='$assignment_id'";
$res_course_assign_fetch=mysqli_query($conn,$sql_course_assign_fetch);
while($row1=mysqli_fetch_array($res_course_assign_fetch,MYSQLI_ASSOC)){
    $assignment_name=$row1['assignment_name'];
    $assignment_description=$row1['assingment_description'];
    $file_name=$row1['file_name'];
    $course_code=$row1['couse_code'];
	$due_date=$row1['due_date'];
	$max_mark=$row1['max_mark'];
	$due_date_disp=date("d-m-Y", strtotime($due_date));
}
$sql_course_fetch="SELECT * FROM staff_course_proposal WHERE course_code='$course_code'";
$res_course_fetch=mysqli_query($conn,$sql_course_fetch);
while($row=mysqli_fetch_array($res_course_fetch,MYSQLI_ASSOC)){
    $course_name=$row['course_name'];
}
date_default_timezone_set('Asia/Kolkata');
$timestrap=date("Y-m-d h:i:s");
$today_date=date("Y-m-d");
$sts_from_db=NULL;
$sql_check_assignment_submit="SELECT * FROM `student_assignment_details` WHERE 	assignment_id='$assignment_id' AND student_mail_id='$email';";
$res_check_assignment_submit=mysqli_query($conn,$sql_check_assignment_submit);
while($get_sts=mysqli_fetch_array($res_check_assignment_submit)){
	$mark=$get_sts['mark'];
	$sts_from_db=$get_sts['status'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="../assets/images/classroom_icon.png" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>    <title><?php echo $assignment_name; ?></title>
</head>
<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="<?php echo $home;?>_home.php" class="logo">
									<span class="symbol"><img src="../assets/images/classroom_icon.png" alt="" /></span><span class="title">Classroom Assignment area</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
				<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="./logout.php">Logout</a></li>

                            <?php
                            
                            $sql_course_fetch="SELECT * FROM join_course WHERE leaner_mail_id='$email'";
                            $res_course_fetch=mysqli_query($conn,$sql_course_fetch);
                            while($row=mysqli_fetch_array($res_course_fetch,MYSQLI_ASSOC)){
                              $code=$row['course_code'];
                              $sql_course_fetch1="SELECT * FROM staff_course_proposal WHERE course_code='$code'";
                              $res_course_fetch1=mysqli_query($conn,$sql_course_fetch1);
                              $row2=mysqli_fetch_array($res_course_fetch1,MYSQLI_ASSOC);
                           ?>
							<li><a href="course_details_student.php?course_code=<?php echo $row['course_code'];?>"><?php echo $row2['course_name'].'-'.$row2['class_name'] ?></a></li>
							<?php } ?>
						</ul>
					</nav>
                    <div class="course_name_box">
                        <img src="../assets/images/course_display images.jpg" alt="img" class="img-course_name_box">
                        <div class="course_name_text"><?php echo $course_name;?></div>
                        <div class="assignment_name">Assignment Name: <?php echo $assignment_name; ?></div>
                        <div class="assignment_descrp">Assignment Description: <?php echo $assignment_description; ?></div>
                        <div class="assignment_descrp">Due: <?php echo $due_date_disp; ?></div>
                        <div class="assignment_descrp">Marks obtained: <?php echo $mark."/".$max_mark; ?></div>
                    </div>
					<div class="assignment_pdf">
					<a href="../assets/assignment_pdfs/<?php echo $file_name; ?>"><div class="pdf_view"><img src="https://img.icons8.com/nolan/96/folder-invoices.png" class="pdf_view_img" alt="" srcset=""><p><?php echo "-".$file_name; ?></p></div></a>
					</div>



					<div class="work_upload">
					<div id="missing"></div>
					<?php
					if($today_date>$due_date){
						$status="Done in late";
						?>
						<script>
							document.getElementById('missing').innerHTML='Missing';
						</script>
						<?php
					}
					else{
						$status="Done in due";
						//echo 'ho';
					}
					?>
					<form class="box" method="post" action="" enctype="multipart/form-data">
					<div class="inputWrapper" id="flie_upload">
    					Upload Your Work<input class="fileInput" id="fileInput" type="file" name="file1" required/>
						
						
					</div>
					<div id="item_selec"></div>
					<script>
							document.getElementById('fileInput').onchange = function () {
								var file_name=this.value;
								document.getElementById('item_selec').innerHTML=file_name.replace(/^.*[\\\/]/, '');
							};
						</script>
						<input type="submit" value="Hand In" class="hand_in" name="submit" id="btn_submit_handin">
					</form>
					</div>
					
			</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>
			<script src="../assets/js/drop.js"></script>
	</body>
</html>


<?php

if(isset($_POST['submit'])){     
    #file name with a random number so that similar dont get replaced
     $pname = rand(1000,10000)."-".$_FILES["file1"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["file1"]["tmp_name"];
   
     #upload directory path
    $uploads_dir = '../assets/student_assignment_pdfs';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
 
    #sql query to insert into database
    $sql = "INSERT INTO `student_assignment_details`( `student_mail_id`, `course_code`, `assignment_id`, `student_assignment_file`,`status`) VALUES ('$email','$course_code','$assignment_id','$pname','$status');";
    $result=mysqli_query($conn,$sql);
    if($result){
		if($today_date>$due_date){
			?>
			<script>
				document.getElementById('btn_submit_handin').value='Done in late';
			</script>

			<?php
					header("Refresh:0");

		}
		else{
			$status="Done in due";
			header("Refresh:0");

			//echo 'ho';
		}
		?>
		
<?php
    }
    else{
        echo mysqli_error($conn);
		header("Refresh:0");
    }
}

?>



<?php
if($sts_from_db=='Done in late'){
	?>
	<script>
		document.getElementById('btn_submit_handin').value='Handed late';
		document.getElementById('missing').innerHTML='Handed in late';
		document.getElementById('missing').style.color='black';
		document.getElementById('btn_submit_handin').style.marginLeft='30px';
		document.getElementById('btn_submit_handin').style.marginTop='60px';
		document.getElementById('btn_submit_handin').disabled='true';


		document.getElementById('flie_upload').hidden='true';

	</script>

<?php
}else if($sts_from_db=='Done in due'){
	?>
	<script>
		document.getElementById('btn_submit_handin').value='Handed in';
		
		document.getElementById('missing').style.color='black';
		document.getElementById('btn_submit_handin').style.marginLeft='50px';
		document.getElementById('btn_submit_handin').style.marginTop='60px';
		document.getElementById('btn_submit_handin').disabled='true';


		document.getElementById('flie_upload').hidden='true';

	</script>

<?php
}
?>