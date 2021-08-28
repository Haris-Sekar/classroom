<?php
include('./conn.php');
session_start();
if (!isset($_SESSION['email'])) {
  $_SESSION['msg'] = "You have to log in first";
  header('location: ../index.php');
}
$email=$_SESSION['email'];
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Classroom</title>
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
									<span class="symbol"><img src="../images/logo.svg" alt="" /></span><span class="title">Classroom teachers area</span>
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

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<section class="tiles">
                            <?php
                            
                            $sql_course_fetch="SELECT * FROM staff_course_proposal WHERE staff_mail_id='$email'";
                            $res_course_fetch=mysqli_query($conn,$sql_course_fetch);
                            $temp=1;
                            $temp1=1;
                            while($row=mysqli_fetch_array($res_course_fetch,MYSQLI_ASSOC)){
                           ?>
								<article class="style<?php echo $temp1;?>">
									<span class="image">
										<img src="../images/pic0<?php echo $temp;?>.jpg" alt="" />
									</span>
									<a href="course_details.php?course_code=<?php echo $row['course_code'];?>">
										<h2><?php  echo $row['course_name'].' - '.$row['class_name']?></h2>
										<div class="content">
											<p><?php echo $row['course_description'];?></p>
										</div>
									</a>
								</article>
                                <?php
                                if($temp>=15){
                                    $temp=1;
                                }else{
                                    $temp=$temp+1;
                                }
                                if($temp>=10){
                                    $temp=1;
                                }else{
                                    $temp=$temp+1;
                                }
                            
                            } ?>
							</section>
						</div>
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