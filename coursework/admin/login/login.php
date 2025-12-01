<?php
// 1. Initialize an empty error variable
$error_message = '';

// 2. Check if the form was submitted
if (isset($_POST['password'])) {
    
    // CHANGE THIS to your actual password or database check
    if ($_POST['password'] == 'secret') {
        // Success! Log them in (set session) and redirect
        header('Location: ../questions.php'); // Or wherever your dashboard is
        exit();
    } else {
        // Failure! Set the error message
        $error_message = 'Incorrect password. Please try again.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="../../questions.css">
</head>
<body>
    <header><h1>Greenwich Student Forum</h1></header>
    <nav>
        <ul>
            <a href="../../index.php">Home</a>
            <a href="../../questions.php">Questions List</a>
            <a href="../../addquestions.php">Add Question</a>
            <a href="../../contact.php">Contact Us</a>
            <a href="../../my_messages.php">Inbox</a>
            <a href="/COMP1841/coursework/admin/login/login.php">Admin Log in</a>
        </ul>
    </nav>
    <main>
        <div class="login-container">
            <h2>Admin Login</h2>
            <p>Please enter the password to access the Admin page.</p>

            <form action="" method="post" required>
                <label for="password">Password:</label>

                <?php if ($error_message != ''): ?>
                <div class="error-box">
                    <?= $error_message ?>
                </div>
                <?php endif; ?>
        
                <input type="password" name="password" required style="width: 100%; padding: 8px; margin: 10px 0;">
                <br>
                <button type="submit" id="login-btn">Log in</button>
            </form>
        </div>
    </main>
    <footer>&copy; 2025 Greenwich Student Forum</footer>
</body>
</html>