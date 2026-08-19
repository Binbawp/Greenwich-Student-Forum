<?php 
include 'includes/DatabaseConnection.php';
include 'includes/DataBaseFunctions.php';
try{
    if (isset($_POST['text'])) {
        updateQuestion($pdo, $_POST['id'], $_POST['text'], $_POST['image'], $_POST['authorid'], $_POST['moduleid']);
        header ('location: questions.php');
    } else {
        $questions = getQuestion($pdo, $_GET['id']);
        $author = getAuthor($pdo, $questions['authorid']);
        $module = getModule($pdo, $questions['moduleid']);

        $authors = allAuthors($pdo);
        $modules = allModules($pdo);

        $title = 'Edit questions';

        ob_start();
        include 'templates/admin_editquestions.html.php';
        $output = ob_get_clean(); 
    }
} catch (PDOException $e){
    $title = 'error has occured';
    $output = 'Error editing questions: ' . $e->getMessage();
}
include 'templates/admin_layout.html.php';