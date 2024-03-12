<?php

if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname =$_POST['lname'];
    $email = $_POST['email'];
    $user_password = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT);

    include_once('dbh.inc.php');
    include_once('functions.inc.php');

    if(emptyInputsSignup($email,$user_password !== false)){
        header("Location:../signup.php?error=emptyinput");
        exit();
    }

    if(pwCheck($user_password,$conpassword) !== false){
        header("Location:../signup.php?error=pwdontmatch");
        exit();
    }

    if(emailExists($conn,$email) !== false){
        header("Location:../signup.php?error=emailexists");
        exit();
    }

 

    $sql = "INSERT INTO customers (fname, lname, email, password)
    VALUES ('$fname', '$lname', '$email' ,'$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // Start a session
        session_start();

        // Set session variables
        $_SESSION['email'] = $email;
        $_SESSION['fname'] = $fname;            
        $_SESSION['lname'] = $lname;
        header('Location:../home.php?error=none_newuser');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
else{
    header('Location:../signup.php');
}
?>