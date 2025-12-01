<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';

if (isset($_POST['reply_text'])) {
    // Save Admin's reply
    addMessage($pdo, $_POST['email'], $_POST['reply_text'], 'admin');
}

$email = $_GET['email'] ?? $_POST['email'];
$messages = getMessagesByEmail($pdo, $email);
$title = 'Conversation';

ob_start();
?>

<h2>Chat with <?=$email?></h2>

<div style="border:1px solid #ccc; padding:10px; height:300px; overflow-y:scroll; background:#fff;">
    <?php foreach ($messages as $msg): ?>
        <p>
            <strong><?= ($msg['sender_type'] == 'admin') ? 'YOU' : 'USER' ?>:</strong>
            <?= htmlspecialchars($msg['message_text']) ?>
            <br>
            <small><?= $msg['created_at'] ?></small>
        </p>
        <hr>
    <?php endforeach; ?>
</div>

<h3>Send Reply</h3>
<form action="" method="post">
    <input type="hidden" name="email" value="<?=$email?>">
    <textarea name="reply_text" rows="3" cols="50" required></textarea><br>
    <input type="submit" value="Reply">
</form>

<?php
$output = ob_get_clean();
include '../templates/admin_layout.html.php';
?>