<!DOCTYPE html>
<html>
    <head>
        <title>user registration</title>
        <link rel="stylesheet" href="../CSS/style.css">
    </head>
    <body>
   

    <?php
    include 'config.php';
    $success = $error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($username) || empty($email) || empty($password)) {
            $error = "All fields are required.";
        } else {

            $hash_Pass = password_hash($password, PASSWORD_DEFAULT);
            $sql  = "INSERT INTO register (username, email, password) VALUES ('$username', '$email', '$hash_Pass')";
            if ($conn->query($sql) == TRUE) {
                $success = "Registration successful. You can now <a href='login.html'>login</a>.";
            } else {
                $error = "Error: " . $conn->error;
            }
        }
    }
    ?>

 </body>
</html>