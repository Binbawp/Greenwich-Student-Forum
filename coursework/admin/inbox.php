<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';

try {
    // 1. Get the list of unique emails from the database
    // (Make sure you added the getAllUniqueSenders function to DataBaseFunctions.php)
    $senders = getAllUniqueSenders($pdo);
    
    $title = 'Admin Inbox';

    // 2. Load the template we just created
    ob_start();
    include '../templates/admin_inbox.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage();
}

// 3. Load the main layout
include '../templates/admin_layout.html.php';
?>