<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = getenv('GMAIL_USERNAME');
    $mail->Password = getenv('GMAIL_PASSWORD');
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('mrhacker11583@gmail.com', 'To-Do List');
    $mail->addAddress('sirapurapushyam@gmail.com');

    // Fetch completed tasks for the month
    include_once('../includes/db_connect.php');
    $query = "SELECT * FROM tasks WHERE is_completed = 1";
    $result = mysqli_query($conn, $query);

    $tasks = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $tasks[] = $row;
    }

    // Prepare email body
    $body = "<h3>Here are your completed tasks for the month:</h3><ul>";
    foreach ($tasks as $task) {
        $body .= "<li>Task: " . $task['task_name'] . " (Completed: " . $task['completed_at'] . ")</li>";
    }
    $body .= "</ul>";

    $mail->Body = $body;
    $mail->send();

    echo 'Monthly report sent.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
