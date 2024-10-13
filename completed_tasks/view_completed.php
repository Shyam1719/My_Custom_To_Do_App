<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Tasks</title>
    
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        
        <?php
    include __DIR__ . '/../includes/db_connect.php';

    // Fetch completed tasks
    $sql = "SELECT * FROM tasks WHERE is_completed = 1 ORDER BY completed_at DESC";
    $result = $conn->query($sql);

    echo "<div class='container mt-5'>";
    echo "<h2 class='text-center mb-4'>Completed Tasks</h2>";

    if ($result->num_rows > 0) {
        // Table to display completed tasks
        echo "<table class='table table-bordered table-striped table-hover'>";
        echo "<thead class='table-dark'>
                <tr>
                    <th>Task</th>
                    <th>Completion Date</th>
                </tr>
              </thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['task_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['completed_at']) . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        // Print button and back button
        echo "<div class='text-center mt-4'>";
        echo "<button onclick='window.print()' class='btn btn-primary me-2'><i class='bi bi-printer'></i> Print Completed Tasks</button>";
        echo "<a href='../index.php' class='btn btn-secondary'><i class='bi bi-arrow-left'></i> Back to Tasks</a>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-info text-center' role='alert'>";
        echo "No completed tasks yet!";
        echo "</div>";
        echo "<div class='text-center'><a href='../index.php' class='btn btn-secondary'><i class='bi bi-arrow-left'></i> Back to Tasks</a></div>";
    }

    echo "</div>"; // Close container
    ?>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
