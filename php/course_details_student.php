<?php
include('./conn.php');
session_start();
if (!isset($_SESSION['email'])) {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../index.php');
}
$email=$_SESSION['email'];
$couse_code=$_GET['course_code'];
$sql_course_fetch="SELECT * FROM staff_course_proposal WHERE  course_code='$couse_code'";
$res_course_fetch=mysqli_query($conn,$sql_course_fetch);
while($row=mysqli_fetch_array($res_course_fetch,MYSQLI_ASSOC)){
    $course_name=$row['course_name'];
}
$sql_course_assign_fetch="SELECT * FROM course_assingments WHERE couse_code='$couse_code'";
$res_course_assign_fetch=mysqli_query($conn,$sql_course_assign_fetch);

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $course_name;?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>

	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="teacher_home.php" class="logo">
									<span class="symbol"><img src="../images/logo.svg" alt="" /></span><span class="title">Classroom Assignment area</span>
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
							<li><a href="./new_course.php">Add New Course</a></li>

                            <?php
                            
                            $sql_course_fetch="SELECT * FROM staff_course_proposal WHERE staff_mail_id='$email'";
                            $res_course_fetch=mysqli_query($conn,$sql_course_fetch);
                            while($row=mysqli_fetch_array($res_course_fetch,MYSQLI_ASSOC)){
                           ?>
							<li><a href="course_details.php?course_code=<?php echo $row['course_code'];?>"><?php echo $row['course_code']."-".$row['course_name'].'-'.$row['class_name'] ?></a></li>
							<?php } ?>
						</ul>
					</nav>
                    <div class="course_name_box">
                        <img src="../assets/images/course_display images.jpg" alt="img" class="img-course_name_box">
                        <div class="course_name_text"><?php echo $course_name;?></div>
                    </div>
                    <a href="./course_new_assignment.php?course_det=<?php echo $couse_code; ?>">
                    <div class="course_assign_box">
                        Annonce a Assignment To the class
                    </div>
                    </a>
                    <?php 
                    while($row2=mysqli_fetch_array($res_course_assign_fetch)){
                        ?>
                    <div class="course_display_box">
                        <h2><?php echo $row2['assignment_name']; ?></h2>
                        <h3><?php echo $row2['assingment_description']; ?></h3><br>
                    <a href="../assets/assignment_pdfs/<?php echo $row2['file_name']; ?>"><div class="pdf_view"><img src="https://img.icons8.com/nolan/96/folder-invoices.png" class="pdf_view_img" alt="" srcset=""><p><?php echo "-".$row2['file_name']; ?></p></div></a>
                        
                    </div>
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