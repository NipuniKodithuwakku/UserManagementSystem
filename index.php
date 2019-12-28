<?php session_start();?>
<?php require_once("connection/connection.php");

//check if submit button was clicked
if (isset($_POST['submit'])) {
		
		$errors=array();
	//check if username and password were set
	if (!isset($_POST['username'])) {
		$errors[]="Invalid username";
	}
	if (!isset($_POST['password'])) {
		$errors[]="Invalid password";
	}

	//check if there any errors
	if (empty($errors)) {
		//save username and password into variables
		$email=$_POST['username'];
		$password= $_POST['password'];
		//$hashpassword=sha1($password);

		//prepare db query

			$query="SELECT * FROM user
					WHERE email='{$email}'AND password='{$password}' 
					LIMIT 1";

			$result=mysqli_query($con,$query);


		if ($result) {
			$user=mysqli_fetch_assoc($result);
			$_SESSION['user_id']=$user['id'];
			$_SESSION['first_name']=$user['first_name'];
			
			header('Location:users.php');
		}else{
			echo "error";
		}
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>User Management System</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="login">
	<form action="#" method="post">
		<fieldset><legend><h1>Login</h1></legend>
			<p>
				<label>Username</label>
				<input type="text" name="username" placeholder="username" required="">
			</p>
			<p>
				<label>Password</label>
				<input type="password" name="password" placeholder="password" required="">
			</p>
			<p>
				<button type="submit" name="submit">submit</button>
			</p>


		</fieldset>
	</form>
</div>

</body>
</html>
<?php mysqli_close($con);?>