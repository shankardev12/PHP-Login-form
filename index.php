<?php 
	session_start();
	require 'dbconfig/confige.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color: #7f8c8d;">
	<div id="main-wrapper">
		<center>
			<h2>Loging Form</h2>
			<img src="img/profile.png" class="avatar" />
		</center>

		<form class="myform" action="index.php" method="post">
			<label><b>Username :</b></label><br>
			<input name="username" type="text" class="inputvalues" placeholder="Type your username" required><br>
			<label><b>Password :</b></label><br>
			<input name="password" type="password" class="inputvalues" placeholder="Type your Password" required><br>
			<input name="Login_btn" type="submit" id="input_btn" value="Login"><br>
			<a href="register.php"><input type="button" id="register_btn" value="Register"></a><br>
		</form>

		<?php 
			if(isset($_POST['Login_btn'])){
				$username = $_POST['username'];
				$password = $_POST['password'];

				$query = "select * from userinfotbl WHERE username = '$username' AND password='$password'";
				$query_run = mysqli_query($con, $query);

				if (mysqli_num_rows($query_run)>0){
					// valid
					$_SESSION['username'] = $username;
					header('location: homepage.php');
				}else{
					// invalid
					echo '<script type="text/javascript">alert("Invalid Credentials")</script>';
				}
			}
	    ?>
	</div>
</body>
</html>