<?php
include '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_name = $_POST['task_name'];
    $deadline = $_POST['deadline'];
    $created_at = date('Y-m-d H:i:s');
    
    // Insert the task into the database
    $sql = "INSERT INTO tasks (task_name, created_at, deadline, is_completed) VALUES ('$task_name', '$created_at', '$deadline', 0)";
    if ($conn->query($sql) === TRUE) {
        header('Location: ../index.php');
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
