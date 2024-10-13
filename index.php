<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To-Do List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
<?php
if (isset($_GET['message'])) {
    echo "<div class='alert alert-success'>" . $_GET['message'] . "</div>";
}
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">My To-Do List</h1>
    
    <!-- Task Listing -->
    <div class="card mb-5">
        <div class="card-header">
            <h2 class="text-center">Tasks</h2>
        </div>
        <div class="card-body">
            <?php include 'tasks/view_tasks.php'; ?>
        </div>
    </div>
    
    <!-- Add Task Form -->
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Add New Task</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="tasks/add_task.php">
                <div class="mb-3">
                    <label for="task_name" class="form-label">Task:</label>
                    <input type="text" class="form-control" id="task_name" name="task_name" required>
                </div>
                <div class="mb-3">
                    <label for="deadline" class="form-label">Deadline:</label>
                    <input type="datetime-local" class="form-control" id="deadline" name="deadline" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Add Task</button>
            </form>
        </div>
    </div>

    <div class="mt-4 text-center">
        <a href="completed_tasks/view_completed.php" class="btn btn-info">View Completed Tasks</a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Bundle with Popper (JS) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

</body>
</html>
