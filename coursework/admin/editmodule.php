<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';

try {
    if (isset($_POST['moduleName'])) {
        // It's a submission
        if (empty($_POST['id'])) {
            insertModule($pdo, $_POST['moduleName']);
        } else {
            updateModule($pdo, $_POST['id'], $_POST['moduleName']);
        }
        header('location: module.php');
    } else {
        // It's a page load
        if (isset($_GET['id'])) {
            $module = getModule($pdo, $_GET['id']);
            $title = 'Edit Module';
        } else {
            $module = null; // Empty for new module
            $title = 'Add Module';
        }

        ob_start();
        include '../templates/admin_editmodule.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>