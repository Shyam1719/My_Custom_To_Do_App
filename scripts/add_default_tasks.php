<?php
include __DIR__ . '/../includes/db_connect.php';

// Define the default tasks
$default_tasks = [
    "Task 1: Daily Exercise",
    "Task 2: Read a Book",
    "Task 3: Review Programming Concepts"
];

// Insert each default task into the database
foreach ($default_tasks as $task_name) {
    $sql = "INSERT INTO tasks (task_name, is_completed, created_at) VALUES ('$task_name', 0, NOW())";
    $conn->query($sql);
}

$conn->close();
?>
