<?php

require_once 'database.php'; // copy the contents of db.php come here

if(isset($_POST['submit_button'])){ // if some values dey there or if somebody press the submit button 

    // get all values from form submitted using their names
    $first_name = $_POST['first_name'];// getting data from submitted form
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];// not compulsory for the names to add up


    // insert into database now
    $add_user = mysqli_query($connectionString,"INSERT INTO `docs` (`user_id`, `first_name`, `last_name`, `username`, `email`, `password`, `timestamp`) VALUES (NULL, '{$first_name}', '{$last_name}', '{$username}', '{$email}', '{$password}', current_timestamp())") or die(mysqli_error($connectionString));//or die throws an error when there is an error in the connection string
//get something or put something into the database
//connection string ties appllication to the application to the database
//tick is advisable to use instead of the single quotation
//them for add to each other
    if($add_user) {
        echo "<script>alert('Sign Up Successful');window.location.href='Login.php';</script>";//if sign up is succesful
    }else{
        echo "<script>alert('Sorry, Error Occured')"; //else this occurs
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

    <title>OGB SIGN UP</title>
</head>
<body>

<div class= "Sign-upbox">
        <img src = "logo.png" class = "avatar">
             <h1>Fill form to sign-up</h1>
             <form method="post">
             
                 <p>First Name</p>
                 <input type="text" name="first_name" placeholder="Enter First Name" required="required">
                 
                 <p>Last Name</p>
                 <input type="text" name="last_name" placeholder="Enter Last Name" required="required">

                 <p>Username</p>
                 <input type="text" name="username" placeholder="Enter Username" required="required">

                 <p> Email</p>
                 <input type="email" name="email" placeholder="Enter email" required="required">

                 <p>Password</p>
                 <input type="password" name="password" placeholder="Enter Password" required="required">

                 <button  type="submit" name="submit_button">Sign Up</button><br> 

                 
                </form>
</div>               

                

</body>
</html>