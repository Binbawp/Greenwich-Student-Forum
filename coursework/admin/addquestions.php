<?php
if (isset($_POST['text'])) {
    try {
        include '../includes/DatabaseConnection.php';
        include '../includes/DataBaseFunctions.php';

        insertQuestion($pdo, $_POST['text'], $_POST['authorid'], $_POST['moduleid'], $_POST['image']);
        header('location: questions.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunctions.php';
    $title = 'Add a new question';
    $authors = allAuthors($pdo);
    $modules = allModules($pdo);
    
    ob_start();
    include '../templates/admin_addquestions.html.php';
    $output = ob_get_clean();
}

include '../templates/admin_layout.html.php';

?>