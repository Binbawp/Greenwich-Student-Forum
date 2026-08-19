<?php
function query ($pdo, $sql, $parameters = []){
    $query = $pdo -> prepare($sql);
    $query-> execute($parameters);
    return $query;
}

function totalQuestions($pdo){
    $query = query ($pdo, 'SELECT COUNT(*) FROM question');
    $row = $query->fetch();
    return $row[0];
}

function getQuestion($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM question WHERE id = :id', $parameters);
    return $query->fetch();
}

function getAuthor($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM author WHERE id = :id', $parameters);
    return $query->fetch();
}

function getModule($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM module WHERE id = :id', $parameters);
    return $query->fetch();
}

function updateQuestion($pdo, $id, $text, $authorid, $moduleid, $image){
    $query = 'UPDATE question SET text = :text, authorid = :author, moduleid = :module, image = :img WHERE id = :id';
    $parameters = [':text' => $text, ':id' => $id, ':author' => $authorid, ':module' => $moduleid, ':img' => $image];
    query($pdo, $query, $parameters);
}

function deleteQuestion($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM question WHERE id = :id', $parameters);
}

function insertQuestion($pdo, $text, $authorid, $moduleid, $image){
    $query = 'INSERT INTO question (text, date, authorid, moduleid, image)
    VALUES (:text, CURDATE(), :authorid, :moduleid, :img)';
    $parameters = [':text' => $text, ':authorid' => $authorid, ':moduleid' => $moduleid, ':img' => $image];
    query($pdo, $query, $parameters);
}

function allAuthors ($pdo){
    $authors = query ($pdo, 'SELECT id, name FROM author');
    return $authors->fetchAll();
}

function allModules ($pdo){
    $modules = query ($pdo, 'SELECT id, moduleName FROM module');
    return $modules->fetchAll();
}

function allQuestion($pdo){
    $question = query($pdo, 'SELECT question.id, text, date, image, `name`, email, moduleName FROM question
    INNER JOIN author ON authorid = author.id
    INNER JOIN module ON moduleid = module.id ORDER BY id DESC');
    return $question->fetchAll();
}

/* === MODULE FUNCTIONS === */

function insertModule($pdo, $name) {
    $query = 'INSERT INTO module (modulename) VALUES (:modulename)';
    $parameters = [':modulename' => $name];
    query($pdo, $query, $parameters);
}

function updateModule($pdo, $id, $name) {
    $query = 'UPDATE module SET modulename = :modulename WHERE id = :id';
    $parameters = [':modulename' => $name, ':id' => $id];
    query($pdo, $query, $parameters);
}

function deleteModule($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM module WHERE id = :id', $parameters);
}

function insertAuthor($pdo, $name) {
    $query = 'INSERT INTO author (name) VALUES (:name)';
    $parameters = [':name' => $name];
    query($pdo, $query, $parameters);
}

function updateAuthor($pdo, $id, $name) {
    $query = 'UPDATE author SET name = :name WHERE id = :id';
    $parameters = [':name' => $name, ':id' => $id];
    query($pdo, $query, $parameters);
}

function deleteAuthor($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM author WHERE id = :id', $parameters);
}

function addMessage($pdo, $email, $text, $type) {
    $query = 'INSERT INTO messages (user_email, message_text, sender_type) 
              VALUES (:email, :text, :type)';
    $parameters = [':email' => $email, ':text' => $text, ':type' => $type];
    query($pdo, $query, $parameters);
}

function getMessagesByEmail($pdo, $email) {
    $query = 'SELECT * FROM messages WHERE user_email = :email ORDER BY created_at DESC';
    $parameters = [':email' => $email];
    return query($pdo, $query, $parameters)->fetchAll();
}

function getAllUniqueSenders($pdo) {
    // This gets a list of everyone who has contacted you
    return query($pdo, 'SELECT DISTINCT user_email FROM messages')->fetchAll();
}
?>
