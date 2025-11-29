<h2>Add Question</h2>

<form action="" method="post">
    <label for="text">Type your question here:</label>
    <textarea id="text" name="text" rows="5" cols="40"></textarea>

    <select name="authorid">
        <option value="">Select an author</option>
        <?php  foreach ($authors as $author):?>
            <option value="<?=htmlspecialchars($author['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?= htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <select name="moduleid">
        <option value="">Select a module</option>
        <?php  foreach ($modules as $module):?>
            <option value="<?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?= htmlspecialchars($module['moduleName'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="image">Upload image (Optional):</label>
    <input type="file" name="image" id="image">
    
    <input type="submit" value="Add Question">
</form>