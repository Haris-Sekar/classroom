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
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Classroom</title>
		<link rel="shortcut icon" href="../assets/images/classroom_icon.png" />

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
		<style>

.tab {
  overflow: hidden;
  border: 1px solid white;
  background-color: white;
  display: flex;
  justify-content: center;
}

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
	</head>
	<body class="is-preload">
	<a href="./calender.html" class="logo">
		<span class="symbol"><img src="../assets/images/calender.png" alt=""style="width:50px;height:50px;margin:5px;" /></span><span class="title"></span>
	</a>
	<div class="tab">
	<a href="./teacher_home.php"><button class="tablinks" style="color: #ddbdfc;">Course Proposed</button></a>
		<a href="./teacher_classroom_det.php"><button class="tablinks" >Course Joined</button></a>
	</div>
		<!-- Wrapper -->
			<div id="wrapper" >

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="teacher_home.php" class="logo">
									<span class="symbol"><img src="../assets/images/classroom_icon.png" alt="" /></span><span class="title">Classroom teachers area</span>
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
							<li><a href="./join_course_techer.php">Join a class</a></li>

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
								<article class="style<?php echo $temp;?>">
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
                                if($temp>=6){
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