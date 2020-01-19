<?php session_start();?>
<?php require_once('connection/connection.php');?>
<?php
    $errors =array();
    if (isset($_POST['submit'])) {
       //checking required field
       if (empty($_POST['first_name'])) {
           $errors = "First name is required";
       }
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add new user</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <style>
    main{
        margin:100px auto;
        width:1000px;

    }
    .userform label{
        width:30%;
        float:left;
    }
    h1{
        font-size:60px;
    }
    .back{
        font-size:25px;
    }
    
    input{
        padding:5px;
        width:60%;
    
        
    } 
    button{
        width:200px;
        
    }
    


    </style>
</head>
<body>
<header>
    <div class="appname">User Management System</div>
	<div class="welcome-note">welcome <span style="color:red";><?php  echo $_SESSION['first_name']; ?></span> <a href="logout.php">Log out</a></div>
	

</header>
<main>
<h1>Add New User<span class="back"><a href="users.php">>Back to user list</a></span></h1>
<?php
    if (empty($errors)) {
        $errors = "There were some errors";
    }



?>
<form action="add-user.php" method="post" class="userform">
<p>
<label>First Name:</label>
<input type="text" name="first_name" required="">
</p>
<p>
<label>Last Name:</label>
<input type="text" name="last_name" required="">
</p>
<p>
<label>Email Address:</label>
<input type="text" name="email" required="">
</p>
<p>
<label>New Password:</label>
<input type="password" name="password" required="">
</p>
<p>
<button type="submit" name=>Save</button>
<span class="back"><a href="#">cancel</a></span>
</p>
</form>
</main>   
</body>
</html>