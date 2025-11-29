<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="questions.css">
        <title><?=$title?></title>
    </head>
    <body>
        <header><h1>Student Forum</h1></header>
        <nav>
            <ul>
                <a href="index.php">Home</a>
                <a href="questions.php">Questions List</a>
                <a href="addquestions.php">Add Question</a>
                <a href="contact.php">Contact Us</a>
                <a href="my_messages.php">Inbox</a>
                <a href="admin/login/login.html">Admin Log in</a>
            </ul>
        </nav>
        <main>
            <?=$output?>
        </main>
        <footer>&copy; 2025 Greenwich Student Forum</footer>
    </body>
</html>