<?php
include __DIR__ . '/../includes/db_connect.php';

// Mark task as completed
if (isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];
    $completion_date = date("Y-m-d H:i:s");  // Get the current date and time
    
    // Update the task in the database as completed with the completion date
    $sql = "UPDATE tasks SET is_completed = 1, completed_at = '$completion_date' WHERE id = $task_id";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the index page after the task is marked completed
        header("Location: ../index.php?message=Task%20Marked%20as%20Completed");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid Request.";
}
?>
