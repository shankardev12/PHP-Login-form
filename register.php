<?php
	require 'dbconfig/confige.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color: #bdc3c7;">
	<div id="main-wrapper">
		<center>
			<h2>Registration Form</h2>
			<img src="img/profile.png" class="avatar" />
		</center>

		<form class="myform" action="register.php" method="post">
			<label><b>Full name :</b></label><br>
			<input name="fullname" type="text" class="inputvalues" placeholder="Type your Fullname" required><br>
			<label><b>Gender :</b></label>
			<input name="gender" type="radio" class="radiobtn" value="male" required>male
			<input name="gender" type="radio" class="radiobtn" value="female" required>female<br>
			<label><b>Qualification :</b></label>
			<select class="qualification" name="qualification">
				<option value="none" >none</option>
				<option value="BSC">BSC</option>
				<option value="BCA">BSA</option>
				<option value="MCA">MCA</option>
			</select><br>
			<label><b>Username :</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Type your username" required><br>
			<label><b>Password :</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Type your Password" required><br>
			<label><b>Conform Password :</b></label><br>
			<input name="cpassword" type="password" class="inputvalues" placeholder="conform password" required><br>
			<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"><br>
			<a href="index.php"><input name="" type="button" id="back_btn" value="<< Back"></a><br>
		</form>

		<?php
			if(isset($_POST['submit_btn'])){
				// echo '<script type="text/javascript">alert("signup is working")</script>';

				$fname = $_POST['fullname'];
				$gender = $_POST['gender'];
				$qual = $_POST['qualification'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				$cpassword = $_POST['cpassword'];

				if ($password == $cpassword) {
					$query = "select * from userinfotbl WHERE username = '$username'";
					$query_run = mysqli_query($con, $query);

					if (mysqli_num_rows($query_run)>0) {
						// there is already a user with the same username
						echo '<script type="text/javascript">alert("User already exists... try another one")</script>';
					}else
					{
						$query = "insert into userinfotbl values('', '$fname', '$gender', '$qual', '$username', '$password')";
					    $query_run = mysqli_query($con, $query);

					    if ($query_run) {
					    	echo '<script type="text/javascript">alert("User registered... Go to login page")</script>';
					    }
					    else{
					    	echo '<script type="text/javascript">alert("Error!")</script>';
					    }
					}
				}else{
					echo '<script type="text/javascript">alert("Password and Conform Password does not match")</script>';
				}
		}
		?>
	</div>
</body>
</html>
