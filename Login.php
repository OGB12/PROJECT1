<?php

require_once 'database.php';

if(isset($_POST['submit_button'])){

    // get all values from form submitted using their names
    $username_or_email = $_POST['username']; // sends the data to the database to be checked
    $password = $_POST['password']; 


    // check if user exists in database
    $get_user_details = mysqli_query($connectionString,"SELECT * FROM `docs` WHERE `username`='{$username_or_email}'  AND `password` = '{$password}' LIMIT 1")or die(mysqli_error($connectionString));

    if(mysqli_num_rows($get_user_details) > 0){ //counts the number of rows in the database to see if any of them matches
        // user exists in the database

        $get_details = mysqli_fetch_array($get_user_details); // gets the users details takes the info from the database then put it in an array form
        $users_id = $get_details['user_id']; //array get keys...what should i use to seelect this

        setcookie("users_id",$users_id, time() + (86400 * 30), '/');// setcookie

        echo "<script>alert('Login Success');window.location.href='Home page.html'</script>"; // takes you in if succcefful
    }else{
        // user does not exist in the database
        echo "<script>alert('Login Failed');</script>";
    }
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type="text/css" href="style.css">
     
    <title>OGB LOG IN</title>
</head>
<body>
    
<div class= "loginbox">
        <img src = "logo.png" class = "avatar">
             <h1>Login here</h1>

             
             <form method = "post">
                 <p>Username</p>
                 <input type="text" name="username" placeholder="Enter Username">
                 <p>Password</p>
                 <input type="password" name="password" placeholder="Enter Password">

                 <button type="submit" name="submit_button">Sign In</button><br>

                 <a href="signup.php">Don't have an account?</a>
            


             </form>
                 
    </div> 
</body>
</html>
