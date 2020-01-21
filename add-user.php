<?php session_start();?>
<?php require_once("connection/connection.php")?>

<?php
    $errors =array();

    $first_name = "";
    $last_name = "";
    $email = "";

    if (isset($_POST['submit'])) {
    //    //checking required field
    //    if (empty(trim($_POST['first_name']))) {
    //        $errors[] = "First name is required";
    //    }

    //    if (empty(trim($_POST['last_name']))) {
    //     $errors[] = "last name is required";
    //     }

    //     if (empty(trim($_POST['email']))) {
    //         $errors[] = "email is required";
    //     }

    //     if (empty(trim($_POST['password']))) {
    //         $errors[] = "password is required";
    //     }

    //asign post values to variables
   $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    

    //checking required fields

    $req_fields = array('first_name','last_name', 'email' ,'password');

    foreach ($req_fields as  $field) {
        if (empty(trim($_POST[$field]))) {
            $errors[] = $field . "is required";
        }
    }

    //checking max width

    $max_length_fields = array('first_name' => 50, 'last_name' => 100, 'email' => 100, 'password' => 40);

    foreach ($max_length_fields as  $field=> $max_length) {
        if (strlen(trim($_POST[$field]))) {
            $errors[] = $field . "should be less than"." ".$max_length." "."characters";
        }
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
    .errmsg{
        margin:20px 0;
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
    if (!empty($errors)) {

        echo '<div class="errmsg">';
        echo "<b>There were some errors</b> <br>";
        
        foreach ($errors as $error) {
          echo $error.'<br>';
        }

        echo "</div>";
        
    }



?>
<form action="add-user.php" method="post" class="userform">
<p>
<label>First Name:</label>
<input type="text" name="first_name" <?php echo 'value = "' .$first_name.'"' ?> >
</p>
<p>
<label>Last Name:</label>
<input type="text" name="last_name" <?php echo 'value = "' .$last_name.'"' ?> >
</p>
<p>
<label>Email Address:</label>
<input type="text" name="email" <?php echo 'value = "' .$email.'"' ?> >
</p>
<p>
<label>New Password:</label>
<input type="password" name="password" >
</p>
<p>
<button type="submit" name="submit">Save</button>
<span class="back"><a href="#">cancel</a></span>
</p>
</form>




</main>   
</body>
</html>