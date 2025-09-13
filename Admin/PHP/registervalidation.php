<?php
        $username = "";
        $password = "";
        $email = "";
        $usernameError = "";
        $passwordError = "";
        $emailError = "";
        $successMsg = "";

        $validusername = "admin";
        $validpassword = "Admin@123";
        $validemail = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $username = isset($_POST["username"]) ? $_POST["username"] : "";
            $password = isset($_POST["password"]) ? $_POST["password"] : "";    
            $email = isset($_POST["email"]) ? $_POST["email"] : "";    
        
            if ($username === "") { 
                $usernameError = "Username is required";

            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                    $usernameError = "Only letters, numbers allowed";
            }
            if ($email === "") { 
                $emailError = "Email is required"; 

            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailError = "Invalid email format";
            }
            if ($password === "") { 
                $passwordError = "Password is required"; 

            } elseif(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)){
                    $passwordError = "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character, and be at least 8 characters long";
            }

            if ($usernameError === "" && $passwordError === "" && $emailError === "") {
                if ($username !== $validusername) {
                    $usernameError = "Invalid username.";
                } elseif ($password !== $validpassword) {
                    $passwordError = "Invalid password.";
                } elseif ($email !== $validemail) {
                    $emailError = "Invalid email.";
                } else {
                    $successMsg = "Registration successful!";
                    header("Location: ../VIEW/admindash.html");
                    exit;
                }
            }
        }

        ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="../CSS/style.css"> 
</head>
<body>

