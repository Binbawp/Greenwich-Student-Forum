<?php
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    deleteQuestion($pdo, $_POST['id']);
    header('location: questions.php');
} catch(PDOException $e) {
    $title = 'An error has occured';
    $output = 'Unable to connect to delete questions: ' . $e->getMessage();
}
include '../templates/admin_layouts.html.php';