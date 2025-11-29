<?php
include 'includes/DatabaseConnection.php';
include 'includes/DataBaseFunctions.php';

$title = "My Inbox";

if (isset($_POST['check_email'])) {
    $email = $_POST['check_email'];
    $messages = getMessagesByEmail($pdo, $email);
    
    ob_start();
    ?>
    <h2>Messages for <?=$email?></h2>
    <div style="background: white; padding: 20px; border: 1px solid #ddd;">
        <?php foreach ($messages as $msg): ?>
            <p style="color: <?= ($msg['sender_type'] == 'admin') ? '#666fd2' : '#005a9c' ?>;">
                <strong><?= strtoupper($msg['sender_type'] == 'user') ? 'You' : 'Admin' ?>:</strong>
                <?= htmlspecialchars($msg['message_text']) ?>
            </p>
        <?php endforeach; ?>
    </div>
    <a href="my_messages.php">Check another email</a>
    <?php
    $output = ob_get_clean();
} else {
    // Show form to enter email
    ob_start();
    ?>
    <h2>Check your Inbox</h2>
    <form action="" method="post">
        <label>Enter your email to view your messages:</label><br>
        <input type="email" name="check_email" required>
        <input type="submit" value="View Messages">
    </form>
    <?php
    $output = ob_get_clean();
}

include 'templates/layout.html.php';
?>