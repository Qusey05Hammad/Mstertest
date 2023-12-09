<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

include "include.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    if (!isset($data['courseID'])) {
        echo json_encode(["error" => "Missing required parameter 'courseID'"]);
        exit;
    }

    $courseID = $data['courseID'];

    $sql = "SELECT COUNT(*) AS student_count FROM courses_users WHERE CoursesID = $courseID";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $studentCount = $row['student_count'];
        echo json_encode(["student_count" => $studentCount]);
    } else {
        echo json_encode(["error" => "Error: " . $sql . "<br>" . $conn->error]);
    }
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(["error" => "Only POST requests are allowed"]);
}
?>
