<?php
session_start(); // Start the session if it hasn't already been started

if (isset($_SESSION)) { // Check if any session variables are set
    session_destroy(); // Destroy the session if it exists
    unset($_SESSION); // Clear the $_SESSION array
}

header('Location:admin/index,php')

?>
