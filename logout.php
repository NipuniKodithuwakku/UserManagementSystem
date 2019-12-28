<?php
 session_start();

 $_SESSION=array();
 if (isset($_COOKIE[session_name()])) {
 	//remove saved cookie
 	setcookie(session_name(),'',time()-86400,'/');
 }
 session_destroy();
 header("Location:index.php");

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>
<body>
<?php?>

</body>
</html>