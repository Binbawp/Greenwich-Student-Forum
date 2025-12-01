<?php
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunctions.php';
    
    $questions = allQuestion($pdo);
    $title = 'questions list';
    $totalQuestions = totalQuestions($pdo);

    ob_start();
    include '../templates/admin_questions.html.php';
    $output = ob_get_clean();
} catch (PDOException $e){
    $title = 'An error has occured';
    $output = 'Database error: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
?>