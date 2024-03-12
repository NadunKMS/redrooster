<?php

function emptyInputsSignup($email, $user_password) {
    if (empty($email) || empty($user_password)) {
        return true; // At least one string is empty
    } else {
        return false; // Both strings have content
    }
}

function emptyInputsLogin($email, $user_password) {
    if (empty($email) || empty($user_password)) {
        return true; // At least one string is empty
    } else {
        return false; // Both strings have content
    }
}

function pwCheck($user_password, $conpassword) {
    if ($user_password !== $conpassword) {
        return true; // At least one string is empty
    } else {
        return false; // Both strings have content
    }
}

function emailExists($conn, $email) {
    $query = "SELECT COUNT(*) FROM customers WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    
$row = mysqli_fetch_row($result);

    if ($row[0] > 0) {
        return true; // Email exists
    } else {
        return false; // Email doesn't exist
    }

}

function userLogin($conn, $email, $user_password) {
    $query = "SELECT * FROM customers WHERE email = ?";
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
            $_SESSION['fname'] = $row['fname'];            
            $_SESSION['lname'] = $row['lname'];
            header('Location:../home.php?error=none_existinguser');

        } else {
            header('Location:../login.php?alert=invalidpw');
        }
    } else {
        header('Location:../login.php?alert=emailnull');
        }
        
        mysqli_stmt_close($stmt);
    }
        

?>