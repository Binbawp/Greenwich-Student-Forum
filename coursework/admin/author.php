<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';

try {
    // Check if a delete action was submitted
    if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        deleteAuthor($pdo, $_POST['id']);
        header('location: author.php');
        exit();
    }

    // Get all modules to display
    $authors = allAuthors($pdo);
    $title = 'Manage Users';

    ob_start();
    include '../templates/admin_author.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
?>