<?php
    include('./conn.php');
    $couse_code=$_GET['course_code'];
    session_start();
    $email=$_SESSION['email'];

    $sql_verify_teacher="SELECT * FROM users WHERE email='$email'";
    $res_verify_teacher=mysqli_query($conn,$sql_verify_teacher);

    while($row_verify=mysqli_fetch_array($res_verify_teacher)){
        $autho=$row_verify['roll_of_person'];
    }
    if($autho=='teacher'){
        session_destroy();
        header('location: ../index.php');

    }
    if (!isset($_SESSION['email'])) {
        $_SESSION['msg'] = "You have to log in first";
        header('location: ../index.php');
    }
    $sql_course_fetch="SELECT * FROM staff_course_proposal WHERE  course_code='$couse_code'";
    $res_course_fetch=mysqli_query($conn,$sql_course_fetch);
    while($row=mysqli_fetch_array($res_course_fetch,MYSQLI_ASSOC)){
        $course_name=$row['course_name'];
    }
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


/* Create an active/current tablink class */

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
    <a href="./course_details_student.php?course_code=<?php echo $couse_code;?>"><button class="tablinks" >Course stream</button>
		<a href="./classroom_person_fetch_student.php?course_code=<?php echo $couse_code;?>"><button class="tablinks" style="color: #ddbdfc;">People (<?php echo $no_persons;?>)</button></a>
	</div>
	<div id="stream" class="tabcontent">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								

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
    
<?php
    //sql to fetch the persons
    $sql_person_fetch="SELECT * FROM join_course WHERE course_code='$couse_code'";
    $res_person_fetch=mysqli_query($conn,$sql_person_fetch);

      while($row_person_fetch=mysqli_fetch_array($res_person_fetch)){
        $email=$row_person_fetch['leaner_mail_id'];
        $sql_person1_fetch="SELECT * FROM users WHERE email='$email'";
        $res_person1_fetch=mysqli_query($conn,$sql_person1_fetch);
        
        while($row_person1_fetch=mysqli_fetch_array($res_person1_fetch,MYSQLI_ASSOC)){
            
    ?>
      <div class="people_display">
                <span><img src="../assets/images/user.png" alt="userimg" srcset=""></span>
                <span id="person_texts" class="person_name"><?php echo $row_person1_fetch['name'];?></span>
                <?php
                if($row_person1_fetch['roll_of_person']=='teacher'){
                    ?><span id="person_texts" class="roll">(Teacher as a student)</span>
                <?php }
                else if($row_person1_fetch['roll_of_person']=='student'){
                ?><span id="person_texts" class="person_roll_number"><?php echo $row_person1_fetch['roll_number'];?></span>
                <?php } ?>
      </div>
<?php  }

} ?>
		<!-- Scripts -->
        <script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>
            </div>
    </div>
</body>
</html>

