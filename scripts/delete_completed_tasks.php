<?php
include_once('../includes/db_connect.php');

// Query to delete all completed tasks
$query = "DELETE FROM tasks WHERE is_completed = 1 ";
mysqli_query($conn, $query);

// Log completion
echo "Completed tasks deleted.";
?>
