<?php session_start()?>
<?php require_once("connection/connection.php")?>
<?php
	//checking if a user is logged in
	$user_id='';
	if(!isset($_SESSION['user_id'])){
		header('Location:index.php');
	}

    $user_list='';
	$query="SELECT * FROM user WHERE is_deleted=0 ORDER BY first_name";
	$result=mysqli_query($con,$query);



	if($result){
		while($user=mysqli_fetch_assoc($result)){
			$user_list.="<tr>";
			$user_list.="<td>{$user['first_name']}</td>";
			$user_list.="<td>{$user['last_name']}</td>";
			$user_list.="<td>{$user['last_login']}</td>";
			$user_list.="<td><a href=\"modify-user.php?$user_id={$user['id']}\">Edit</a></td>";
			$user_list.="<td><a href=\"delete-user.php?$user_id={$user['id']}\">Delete</a></td>";
			$user_list .= "</tr>";
		} 


	}
	else{
		echo "Database query failed";
	}



?>
<!DOCTYPE html>
<html>
<head>
	<title>users</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		main{
			width:1000px;
			margin:100px auto;
		}
		main h1{
			margin-bottom:20px;
			font-size:50px;
		}
		main h1 span{
			font-size:20px;
		}
		.masterlist{
			width:100%;
			border-collapse:collapse;
		}
		.masterlist th{
			background-color:#aaa;
			text-align:left;
		}
		.masterlist th,.masterlist td{
			padding:10px;
			border-bottom:1px solid #aaa;
		}
		
		
	</style>
</head>
<body>
	<header>
		<div class="appname">User Management System</div>
		<div class="welcome-note">welcome <span style="color:red";><?php  echo $_SESSION['first_name']; ?></span> <a href="logout.php">Log out</a></div>
	</header>
	<main>
		<h1>User<span><a href='add-user.php'>+ Add New user</a></span></h1>
		<table class="masterlist">
		<tr>
			<th>First name</th>
			<th>Last name </th>
			<th>Last login</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php echo $user_list;?>
		
		
		
		</table>
		


	</main>
	

</body>
</html>
