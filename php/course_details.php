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
$couse_code=$_GET['course_code'];
$_SESSION['coursecode1']=$couse_code; 
$sql_course_fetch="SELECT * FROM staff_course_proposal WHERE  course_code='$couse_code'";
$res_course_fetch=mysqli_query($conn,$sql_course_fetch);
while($row=mysqli_fetch_array($res_course_fetch,MYSQLI_ASSOC)){
    $course_name=$row['course_name'];
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
  background-color: inherit;
  float: left;
  border: none;

  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 20px;
  color: black;
  box-shadow: inset 0 0 0 0px white;
  letter-spacing: 1px;



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
  <a href="./course_details.php?course_code=<?php echo $couse_code;?>"><button class="tablinks" style="color: #ddbdfc;">Course stream</button></a>
		<a href="./classroom_person_fetch.php?course_code=<?php echo $couse_code;?>"><button class="tablinks">People (<?php echo $no_persons;?>)</button></a>
	</div>
	<div id="stream" class="tabcontent">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="teacher_home.php" class="logo">
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
						<div class="settings">
              <img src="../assets/images/settings.png" alt="" srcset="" class="setting-img-course_name_box">
            </div>
            <div class="course_name_text">
              <?php echo $course_name;?>
            </div>
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
            <div class="delete"><a href="delete_assignmet.php?id=<?php echo $row2['assignment_id'];?>"><img src="../assets/images/delete.png" alt="dete icon" /></a></div>
            <a href="sudent_works_staff_disp.php?ass_id=<?php echo $row2['assignment_id'];?>&course_code=<?php echo $couse_code; ?>"><h2><?php echo $row2['assignment_name']; ?></h2>
            <h3><?php echo $row2['assingment_description']; ?></h3><br></a>
            <a href="../assets/assignment_pdfs/<?php echo $row2['file_name']; ?>">
              <div class="pdf_view">
                <img src="https://img.icons8.com/nolan/96/folder-invoices.png" class="pdf_view_img" alt="" srcset="">
                <p>
                  <?php echo "-".$row2['file_name']; ?>
                </p>
              </div>
            </a>
                        
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
