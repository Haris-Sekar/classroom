<?php
include('./conn.php');
session_start();
$email=$_SESSION['email'];

$sql_verify_teacher="SELECT * FROM users WHERE email='$email'";
$res_verify_teacher=mysqli_query($conn,$sql_verify_teacher);

while($row_verify=mysqli_fetch_array($res_verify_teacher)){
    $autho=$row_verify['roll_of_person'];
}
if (!isset($_SESSION['email'])) {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../index.php');
}
$couse_code=$_GET['course_code'];
$_SESSION['coursecode1']=$couse_code; 
$sql_course_fetch="SELECT * FROM staff_course_proposal WHERE  course_code='$couse_code'";
$res_course_fetch=mysqli_query($conn,$sql_course_fetch);
while($row=mysqli_fetch_array($res_course_fetch,MYSQLI_ASSOC)){
    $course_name=$row['course_name'];
}
$sql_course_assign_fetch="SELECT * FROM course_posts WHERE couse_code='$couse_code' ORDER BY timestamp";
$res_course_assign_fetch=mysqli_query($conn,$sql_course_assign_fetch);

$sql_person_tot_count1="SELECT count( * ) as no_persons FROM `join_course` WHERE `course_code`='$couse_code'";
    $res_person_tot_count1=mysqli_query($conn,$sql_person_tot_count1);
    while($row_count=mysqli_fetch_array($res_person_tot_count1,MYSQLI_ASSOC)){
    $no_persons=$row_count['no_persons'];
}



?>

<!DOCTYPE HTML>
<html>
	<head>
	<link rel="shortcut icon" href="../assets/images/classroom_icon.png" />

		<title><?php echo $course_name;?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
		<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid white;
  background-color: white;
  display: flex;
  justify-content: center;
}

/* Style the buttons inside the tab */
.tablinks {  
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 20px;
  color: black;
  box-shadow: inset 0 0 0 0px white;
  letter-spacing: .5px; 
}
@media screen and (max-width:530px)
{
	.tablinks{
		margin-top:30px;
		font-size:15px;
	}
}
@media screen and (max-width:400px)
{
	.tablinks{
		margin-top:30px;
		font-size:12px;
	}
}
@media screen and (max-width:430px)
{ 
	.title{
		font-size:13px;
       letter-spacing: .3px; 
	}
}

/* Change background color of buttons on hover */
.tablinks:hover {
  color: #ddbdfc;;
  box-shadow: inset 0 0 0 0px white;

}


</style>
	<link rel="shortcut icon" href="../assets/images/classroom_icon.png" />
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>


		<title><?php echo $course_name;?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>


	</head>
	<body class="is-preload">
	<div class="tab">
  <a href="./course_details_student.php?course_code=<?php echo $couse_code;?>"><button class="tablinks" style="color: #ddbdfc;">Course stream</button></a>
		<a href="./classroom_person_fetch_student.php?course_code=<?php echo $couse_code;?>"><button class="tablinks">People (<?php echo $no_persons;?>)</button></a>
	</div>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="student_home.php" class="logo">
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
						<div class="assignment_name"><a href="<?php echo $gmeet_link; ?>">Join GMeet Now</a></div>

                    </div>


	<div class="tab">
  <a href="./course_details_student.php?course_code=<?php echo $couse_code;?>"><button class="tablinks">Assignments</button></a>
		<a href="./course_details_posts_student.php?course_code=<?php echo $couse_code;?>"><button class="tablinks" style="color: #ddbdfc;">Materials</button></a>
	</div>
          <?php 
            while($row2=mysqli_fetch_array($res_course_assign_fetch,MYSQLI_ASSOC)){
          ?>
          <div class="course_display_box">
            <h2><?php echo $row2['post_name']; ?></h2>
            <h3><?php echo $row2['post_description']; ?></h3><br></a>
			<?php
			$files=explode("//",$row2['file_name']);
			$count=count($files);
			for ($i=0; $i < $count; $i++) { 
				$temp=explode(".",$files[$i]);
				$files1[$i]=$temp[0];
			}
			for ($i=0; $i < $count; $i++) {

				?>
					<a href="../assets/post_pdfs/<?php echo $files[$i]; ?>">
					<div class="pdf_view">
						<img src="https://img.icons8.com/nolan/96/folder-invoices.png" class="pdf_view_img" alt="" srcset="">
						<p>
						<?php echo "-".$files1[$i]; ?>
						</p>
					</div>
					</a>

<?php
			}
			?>
                        
          </div>
          <?php 
            } 
          ?>

			</div>
	
  </div>	


		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>

	</body>
</html>
