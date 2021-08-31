<?php
include('./conn.php');
session_start();
$email=$_SESSION['email'];
$course_code=$_GET['course_code'];
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

$assignment_id=$_GET['ass_id'];
$sql_ass_tot_count="SELECT count( * ) as ass_in_due_count FROM `student_assignment_details` WHERE `assignment_id`='$assignment_id' AND `status`='Done in due'";
$res_ass_tot_count=mysqli_query($conn,$sql_ass_tot_count);
while($row_count_in=mysqli_fetch_array($res_ass_tot_count,MYSQLI_ASSOC)){
    $ass_in_due_count=$row_count_in['ass_in_due_count'];
}
$sql_ass_tot_count1="SELECT count( * ) as ass_in_late_count FROM `student_assignment_details` WHERE `assignment_id`='$assignment_id' AND `status`='Done in late'";
$res_ass_tot_count1=mysqli_query($conn,$sql_ass_tot_count1);
while($row_count_out=mysqli_fetch_array($res_ass_tot_count1,MYSQLI_ASSOC)){
    $ass_in_late_count=$row_count_out['ass_in_late_count'];
}
$sql_person_tot_count1="SELECT count( * ) as no_persons FROM `join_course` WHERE `course_code`='$course_code'";
    $res_person_tot_count1=mysqli_query($conn,$sql_person_tot_count1);
    while($row_count=mysqli_fetch_array($res_person_tot_count1,MYSQLI_ASSOC)){
    $no_persons=$row_count['no_persons'];
}
$turned_in=$ass_in_due_count+$ass_in_late_count;
$assinged=$no_persons-$turned_in;



//sql to fetch student assignment details
$sql_student_fetch="SELECT * FROM student_assignment_details WHERE assignment_id='$assignment_id'";
$res_student_fetch=mysqli_query($conn,$sql_student_fetch);


//sql to fetch max mark

$sql_max_mark="SELECT * FROM course_assingments WHERE assignment_id='$assignment_id'";
$res_max_mark=mysqli_query($conn,$sql_max_mark);

while($row_max=mysqli_fetch_array($res_max_mark,MYSQLI_ASSOC)){
    $max_mark=$row_max['max_mark'];
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
    </head>
    <body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper" >

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="teacher_home.php" class="logo">
									<span class="symbol"><img src="../assets/images/classroom_icon.png" alt="" /></span><span class="title">Student works</span>
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


                    <div class="turned_in_dashbord">
                        <div class="turned_in_count" onclick="turnedIn()"><?php echo $turned_in;?><div class="turndedintext">Turned in </div></div>
                        <div class="assigned_count" onclick="assigned()"><?php echo $assinged;?><div class="turndedintext">Assigned</div></div>
                    </div>

                    <div class="turned_display" id="turned">
                        <?php
                            while($row_assignment_id=mysqli_fetch_array($res_student_fetch,MYSQLI_ASSOC)){
                                $email=$row_assignment_id['student_mail_id'];
                                $file_name=$row_assignment_id['student_assignment_file'];
                                $arry_file=explode('-',$file_name);
                                $file_name1=$arry_file[1];
                                $sql_person1_fetch="SELECT * FROM users WHERE email='$email'";
                                $res_person1_fetch=mysqli_query($conn,$sql_person1_fetch);
                                $time_date=$row_assignment_id['timestamp'];
                                $array_date=explode(" ",$time_date);
                                $date=$array_date[0];
                                $time=$array_date[1];
                                $newTime=date('h:i:s a',strtotime($time));
                                $newDate = date("d-m-Y", strtotime($date));  
                                
                                while($row_person1_fetch=mysqli_fetch_array($res_person1_fetch,MYSQLI_ASSOC)){
                                    
                            ?>
                            <div class="student_det_display">
                                <?php echo $row_person1_fetch['name']; ?>
                                <?php echo $row_person1_fetch['roll_number']; ?>
                                <div class="marks"><form action="" method="post"><input type="number" name="marks" id="marks" value="<?php echo $row_assignment_id['mark'];?>" placeholder="<?php echo $row_assignment_id['mark'];?>">/<?php echo $max_mark;?><br><input type="submit" value="update" name="update_marks"></form></div><br><br><br>
                                <div class="img_text"><a href="../assets/student_assignment_pdfs/<?php echo $file_name;?>"><img src="https://img.icons8.com/nolan/96/folder-invoices.png" class="pdf_view_img" alt="" srcset=""></a><a href="../assets/student_assignment_pdfs/<?php echo $file_name;?>" class="std_file"><?php echo $file_name1;?></a></div>
                                <div class="timestap">Handed on <?php echo $newDate.' at '.$newTime?></div>
                            </div>
                            <?php } } ?>
                    </div>
                    <div class="assigned_display" id="assigned">
                        <?php
                        $sql_assigned="SELECT * FROM join_course WHERE course_code='$course_code'";
                        $res_assigned=mysqli_query($conn,$sql_assigned);
                        while($row_ass=mysqli_fetch_array($res_assigned,MYSQLI_ASSOC) ){
                            $sql_assigned_ass="SELECT * FROM student_assignment_details WHERE course_code='$course_code'";
                            $res_assigned_ass=mysqli_query($conn,$sql_assigned_ass);
                             while($row1=mysqli_fetch_array($res_assigned_ass)){
                                 $ass_mail=$row_ass['leaner_mail_id'];
                                 $assigned_mail=$row1['student_mail_id'];
                                 if($ass_mail!=$assigned_mail){    
                                    $sql_person1_fetch="SELECT * FROM users WHERE email='$ass_mail'";
                                    $res_person1_fetch=mysqli_query($conn,$sql_person1_fetch);
                                    while($row_person1_fetch=mysqli_fetch_array($res_person1_fetch,MYSQLI_ASSOC)){                                                   
                                    ?>
                                <div class="student_det_display">
                                    <?php echo $row_person1_fetch['name']; ?>
                                    <?php echo $row_person1_fetch['roll_number']; ?>
                                    Missing
                                </div>
                    <?php } }  } }?>
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



<?php
    if(isset($_POST['update_marks'])){
        $marks=$_POST['marks'];
        $sql_update="UPDATE `student_assignment_details` SET `mark`='$marks' WHERE assignment_id=$assignment_id;";
        $res_update=mysqli_query($conn,$sql_update);
        if(!mysqli_error($conn)){
            header('Refresh: 0');
        }
    }
?>



<script>
    function turnedIn(){
        document.getElementById('turned').style.visibility='visible';
        document.getElementById('assigned').style.visibility='hidden';
    }
    function assigned(){
        document.getElementById('turned').style.visibility='hidden';
        document.getElementById('assigned').style.visibility='visible';
        document.getElementById('assigned').style.marginTop="-150px";
    }

</script>