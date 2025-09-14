<?php

session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 1;
}
$user_id = (int)$_SESSION['username'];

function json_out($data, int $code = 200) {
    header('Content-Type: application/json');
    http_response_code($code);
    echo json_encode($data);
    exit();
}

?>

<?php include_once 'DATABASE/configdb.php'; ?>

<?php
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    json_out($row);
} else {
    json_out(['error' => 'User not found'], 404);
}

$conn->close();

?>

<?php 
session_start();
session_destroy();
header("Location: ../SigIn/login.html");
exit();

?>

