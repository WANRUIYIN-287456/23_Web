<?php
if (!isset($_POST)) {
    $response = array('status' => 'failed', 'data' => null);
    sendJsonResponse($response);
    die();
}

include_once("dbconnect.php");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = sha1($_POST['password']);

$sqlinsert = "INSERT INTO tbl_users (user_email, user_name, user_phone, user_password) VALUES ('$email','$name','$phone','$password')";

// Perform the SQL query to insert data into the database

$response = array('status' => 'success', 'data' => null);
sendJsonResponse($response);

function sendJsonResponse($sentArray){
    header('Content-Type: application/json'); // Fix typo in header syntax
    echo json_encode($sentArray);
}
?>
