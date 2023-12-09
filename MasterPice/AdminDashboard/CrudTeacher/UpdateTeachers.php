<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

include "../include.php";

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(["error" => "Only PUT requests are allowed"]);
    exit;
}

$input_data = file_get_contents("php://input");

$put_data = json_decode($input_data, true);

if (!isset($put_data['TeacherID']) || !isset($put_data['user_id']) || !isset($put_data['course_id'])) {
    echo json_encode(["error" => "Missing required parameters"]);
    exit;
}

$teacher_id = $put_data['TeacherID'];
$user_id = $put_data['user_id'];
$course_id = $put_data['course_id'];


$sql = "UPDATE teacher SET user_id='$user_id', course_id='$course_id' WHERE TeacherID='$teacher_id'";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Teacher updated successfully"]);
} else {
    echo json_encode(["error" => $conn->error]);
}

$conn->close();

?>
