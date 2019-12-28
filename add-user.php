<?php session_start();?>
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
        width:1000px;
        margin:30px auto;
    } 
    
    input{
        padding:5px;
        width:80%;
        float:right;
        margin-bottom:10px;
        
    } 
    button{
        width:25%;
        margin-top:20px;
        margin-left:65px;
        padding:6px;
    }
    


    </style>
</head>
<body>
<header>
    <div class="appname">User Management System</div>
	<div class="welcome-note">welcome <span style="color:red";><?php  echo $_SESSION['first_name']; ?></span> <a href="logout.php">Log out</a></div>
	

</header>
<main>
<form action=" " method="post">
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
</p>
</form>


</main>

    
</body>
</html>