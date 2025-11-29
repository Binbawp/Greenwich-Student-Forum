<h2>Questions List</h2>

<p><?=$totalQuestions?> questions have been submitted to the Question Database.</p>

<?php foreach ($questions as $question): ?>
    <blockquote>
        <p>
            <?php // Use htmlspecialchars to prevent XSS attacks ?>
            <?=htmlspecialchars($question['text'], ENT_QUOTES, 'UTF-8')?>
            <br /><?=htmlspecialchars($question['moduleName'], ENT_QUOTES, 'UTF-8')?>

            <form action="deletequestions.php" method="post" class="delete-form">
                <input type="hidden" name="id" value="<?=$question['id']?>">
                <input type="submit" value="Delete">
            </form>

            <img height="100px" alt="image" src="../images/<?=htmlspecialchars($question['image'], ENT_QUOTES, 'UTF-8'); ?>" />
            <br>

            (by <a href = "mailto:<?=htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8');?>">
            <?=htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8'); ?></a>)

            <a href="editquestions.php?id=<?=$question['id']?>">Edit</a>
            
            (Posted on: <?=(new DateTime($question['date']))->format('jS M Y')?>)
            <br>    
        </p>
    </blockquote>
<?php endforeach; ?>