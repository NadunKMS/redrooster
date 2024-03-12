<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $user_password = $_POST['password'];

    include_once('../public/includes/dbh.inc.php');
  
    $query = "SELECT * FROM staff WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        die("Error in SQL query: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Error getting result: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $hashed_password = $row['password'];
        if (password_verify($user_password, $hashed_password)) {
            // Start a session
            session_start();
            // Set session variables
            $_SESSION['email'] = $row['email'];            
            $_SESSION['username'] = $row['username'];            
            $_SESSION['role'] = $row['role'];
            
            if ($_SESSION['role'] == 'admin') {
                header('Location:admin.php');
            }
            elseif ($_SESSION['role'] == 'emp') {
                header('Location:employee/employee.php');
            }
            elseif ($_SESSION['role'] == 'outlet') {
                header('Location:outlet.php');
            }
            else{
                header('Location:cod.php');

            }

        } else {
            header('Location:index.php?error=invalidpw');
        }
    } else {
        header('Location:index.php?error=emailnull');
        }
        
        mysqli_stmt_close($stmt);
    }

else{
    header('Location:index.php?error=null');
}
?>