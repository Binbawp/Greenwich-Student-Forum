<?php
$ActualPassword = "secret";
if ($_POST['password'] == $ActualPassword) {
    session_start();
    $_SESSION["Authorised"] = "Y";
    header("Location:../../admin/questions.php");
} else {
    header("Location:login.php?error=1");
}