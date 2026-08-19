<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../questions.css">
        <title><?=$title?></title>
    </head>
    <body class="admin-page">
        <header id="admin">
        <h1>Welcome to the Admin Dashboard!</h1></header>
        <nav>
            <ul>
                <a href="../admin/questions.php">Questions List</a>
                <a href="../admin/addquestions.php">Add Question</a>
                <a href="../admin/module.php">Manage Modules</a>
                <a href="../admin/author.php">Manage Users</a>
                <a href="../admin/inbox.php">Inbox</a>
                <a href="../admin/login/logout.php">Log out</a>
            </ul>
        </nav>
        <main>
            <?=$output?>
        </main>
        <footer id="admin">&copy; 2025 Greenwich Student Forum</footer>
    </body>
</html>