<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';

try {
    if (isset($_POST['name'])) {
        // It's a submission
        if (empty($_POST['id'])) {
            insertAuthor($pdo, $_POST['name']);
        } else {
            updateAuthor($pdo, $_POST['id'], $_POST['name']);
        }
        header('location: author.php');
    } else {
        // It's a page load
        if (isset($_GET['id'])) {
            $author = getAuthor($pdo, $_GET['id']);
            $title = 'Edit User';
        } else {
            $author = null; // Empty for new module
            $title = 'Add New User';
        }

        ob_start();
        include '../templates/admin_editauthor.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>