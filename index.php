<?php
include('./php/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="./assets/images/classroom_icon.png" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/loign.js"></script>
    <title>Login</title>
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form action="" method="POST">
			<h1>Sign in</h1>
			<div class="social-container">
            <input type="submit" value="Google Login" >
			</div>
			<span>or use your account</span>
			<input type="email" placeholder="Email" name="email" require/>
			<input type="password" placeholder="Password" name="password" require />
			<input type="submit" value="Login" class="button" name="submit">
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			
			<div class="overlay-panel overlay-right">
                    <h1>Classroom</h1>
                    <p>Please login to exprience the Classroom we have designed</p>
				<a href="./php/signup.php" class="button" style="background-color: white; color:black ">Sign Up</a>
			</div>
		</div>
	</div>
</div>


</body>
</html>


<?php

if(isset($_POST['submit'])){
    $user=$_POST['email'];
    $pass1=$_POST['password'];
    $pass=md5($pass1);
    $query="SELECT * FROM users WHERE email='$user';";
    $res=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($res, MYSQLI_ASSOC))
    {
        if ($pass==$row['password'] ) 
        {
            if($row['roll_of_person']=="teacher")
            {
                session_start();
                $_SESSION['email']=$user;
                $_SESSION['success'] = "You have logged in!";
                header("location: php/teacher_home.php");
            }
            else{
                session_start();
                $_SESSION['email']=$user;
                $_SESSION['success'] = "You have logged in!";
                header("location: php/student_home.php");
            }
        }
        else
        {
           ?><script>
               alert('Incorrect Username or Password');
               </script>
        <?php
        }
}
}

?>