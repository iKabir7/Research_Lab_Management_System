<?php 

        $username = "";
        $password = "";
        $usernameError = "";
        $passwordError = "";
        $successMsg = "";

        $validusername = "admin";
        $validpassword = "Admin@123";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $username = isset($_POST["username"]) ? $_POST["username"] : "";
            $password = isset($_POST["password"]) ? $_POST["password"] : "";    
        
            if ($username === "") { 
                $usernameError = "Username is required";

            } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                    $usernameError = "Only letters, numbers allowed";
            } 


            if ($password === "") { 
                $passwordError = "Password is required"; 

            } elseif(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)){
                    $passwordError = "Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character, and be at least 8 characters long";
            }

            if ($usernameError === "" && $passwordError === "") {
                if ($username !== $validusername) {
                    $usernameError = "Invalid username.";
                } elseif ($password !== $validpassword) {
                    $passwordError = "Invalid password.";
            
                } else {
                    $successMsg = "Login successful!";
                    header("Location: ../VIEW/admindash.html");
                    exit;
                }
            }

        }

        ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<center> 
 
        <h1>Login</h1>
        <?php if ($successMsg): ?>
            <p style="color: green;"><?php echo $successmsg; ?></p>
        <?php endif; ?>

        <form method = "POST" action = "">
        
        <p>
        <input type = "text" name = "username" placeholder = "Username" value="<?php echo htmlspecialchars($username); ?>">
        <br>
        <span id="usernameError" style = "color: red;"><?php echo $usernameError; ?></span>
        </p>    
 
        <p>
        <input type = "password" name = "password" placeholder = "Password" >
        <br>
        <span id="passwordError" style = "color: red;"><?php echo $passwordError; ?></span>
        </p>
 
        <button type = "submit">Submit</button>
        
        </form>


</center>
</body>
</html>