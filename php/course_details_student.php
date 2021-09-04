<?php
include('./conn.php');
session_start();
if (!isset($_SESSION['email'])) {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../index.php');
}
$email=$_SESSION['email'];
$couse_code=$_GET['course_code'];
$sql_course_fetch="SELECT * FROM staff_course_proposal WHERE course_code='$couse_code'";
$res_course_fetch=mysqli_query($conn,$sql_course_fetch);
while($row=mysqli_fetch_array($res_course_fetch,MYSQLI_ASSOC)){
    $course_name=$row['course_name'];
	$gmeet_link=$row['gmeet_link'];
}
$sql_course_assign_fetch="SELECT * FROM course_assingments WHERE couse_code='$couse_code'";
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
					<div class="assout">
						<div class="course_name_box">
							<img src="../assets/images/course_display images.jpg" alt="img" class="img-course_name_box">
							<div class="course_name_text"><?php echo $course_name;?></div>
							<div class="assignment_name"><a href="<?php echo $gmeet_link; ?>">GMeet Now</a></div>

						</div>
					</div>
                   
					<div class="tab">
						<a href="./course_details_student.php?course_code=<?php echo $couse_code;?>"><button class="tablinks" style="color: #ddbdfc;">Assignments</button></a>
						<a href="./course_details_posts_student.php?course_code=<?php echo $couse_code;?>"><button class="tablinks">Materials</button></a>
					</div>
                    <?php 
                    while($row2=mysqli_fetch_array($res_course_assign_fetch)){
                        ?>
					<a href="assignment_details_stud.php?assignment_id=<?php echo $row2['assignment_id'] ?>">
						<div class="course_display_box" style="height: 120px;">
							<p class="posed_by"><?php echo $row2['staff_mail_id']; ?></p>
							<h2><?php echo $row2['assignment_name']; ?></h2>
							<h3><?php echo $row2['assingment_description']; ?></h3><br>		
						</div>
					</a>
<?php } ?>

			</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>

	</body>
</html>