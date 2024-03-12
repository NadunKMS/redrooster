<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $user_password = $_POST['password'];

    include_once('dbh.inc.php');
    include_once('functions.inc.php');

    if(emptyInputsLogin($email,$user_password !== false)){
        header("Location:../login.php?error=emptyinput");
        exit();
    }
    
    userLogin($conn,$email,$user_password);

}
else{
    header('Location:../login.php');
}
?>