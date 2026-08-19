<?php 
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';
try{
    if (isset($_POST['text'])) {
        $imageToSave = $_POST['previous_image'];
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageToSave = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], '../image/' . $imageToSave);
        }
        updateQuestion($pdo, $_POST['id'], $_POST['text'], $_POST['authorid'], $_POST['moduleid'], $imageToSave);
        header ('location: questions.php');
    } else {
        $questions = getQuestion($pdo, $_GET['id']);
        $author = getAuthor($pdo, $questions['authorid']);
        $module = getModule($pdo, $questions['moduleid']);

        $authors = allAuthors($pdo);
        $modules = allModules($pdo);

        $title = 'Edit questions';

        ob_start();
        include '../templates/admin_editquestions.html.php';
        $output = ob_get_clean(); 
    }
} catch (PDOException $e){
    $title = 'error has occured';
    $output = 'Error editing questions: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';