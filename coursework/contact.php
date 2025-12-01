<?php
include 'includes/DatabaseConnection.php';
include 'includes/DataBaseFunctions.php';

if (isset($_POST['message'])) {
    addMessage($pdo, $_POST['email'], $_POST['message'], 'user');
    
    $title = "Message Sent";
    $output = "Thank you for your message, we will get back to you shortly";
} else{
    $title = "contact us";
    ob_start();
    include 'templates/mailform.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';