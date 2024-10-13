<?php
include __DIR__ . '/../includes/db_connect.php';

// Fetch incomplete tasks from the database
$sql = "SELECT * FROM tasks WHERE is_completed = 0";
$result = $conn->query($sql);

// Function to calculate days remaining until deadline
function calculate_days_remaining($deadline) {
    $current_date = new DateTime();  // Get current date
    $deadline_date = new DateTime($deadline);  // Convert deadline to DateTime object
    
    if ($current_date > $deadline_date) {
        return "Overdue";
    } else {
        $interval = $current_date->diff($deadline_date);
        return $interval->days . " day(s) remaining";
    }
}

if ($result->num_rows > 0) {
    echo "<div class='container mt-5'>";
    echo "<h2 class='text-center mb-4'>Tasks to Complete</h2>";
    
    // Table to display tasks
    echo "<table class='table table-bordered'>";
    echo "<thead class='table-dark'>
            <tr>
                <th>Task</th>
                <th>Deadline</th>
                <th>Days Remaining</th>
                <th>Action</th>
            </tr>
          </thead>";
    echo "<tbody>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['task_name'] . "</td>";
        echo "<td>" . $row['deadline'] . "</td>";
        echo "<td>" . calculate_days_remaining($row['deadline']) . "</td>";
        
        // Add a "Completed" button for each task
        echo "<td>
                <form method='POST' action='tasks/complete_task.php' class='d-inline-block'>
                    <input type='hidden' name='task_id' value='" . $row['id'] . "'>
                    <button type='submit' class='btn btn-primary btn-sm'>Mark as Completed</button>
                </form>
              </td>";
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    echo "<div class='container mt-5'>";
    echo "<p class='alert alert-info text-center'>No tasks to complete!</p>";
    echo "</div>";
}
?>
