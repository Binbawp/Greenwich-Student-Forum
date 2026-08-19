<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $questions['id']; ?>">
    <input type="hidden" name="previous_image" value="<?= $questions['image']; ?>">
    <label for="text">Edit your question here:</label>
    <textarea name="text" rows="3" cols="40"><?= $questions['text'] ?></textarea>

    <label for='author'>Select an author:</label>
    <select id="author" name="authorid" required>
        <option value="<?=$author['id']?>">Current:<?=$author['name']?></option>
        <?php foreach ($authors as $author): ?>
            <option value="<?=htmlspecialchars($author['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?=htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
            <?php endforeach;?>
    </select>
    
    <label for='module'>Select a Module:</label>
    <select id="module" name="moduleid" required>
        <option value="<?=$module['id']?>">Current:<?=$module['moduleName']?></option>
        <?php foreach ($modules as $module): ?>
            <option value="<?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?=htmlspecialchars($module['moduleName'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
            <?php endforeach;?>
    </select> <br />

    <p>
        <label for="current-image">Current Image:</label>
        <?php if (!empty($questions['image'])): ?>
            <img id="current-image" src="../image/<?=htmlspecialchars($questions['image'], ENT_QUOTES, 'UTF-8')?>" alt="<?= $questions['image'] ?>" style="vertical-align:middle; height:100px; margin-left:10px;">
        <?php else: ?>
            <em>No image</em>
        <?php endif; ?>
    </p>

    <label for="text">Edit your image here:</label>
    <input type="file" name="image" id="image"> <br/>
    <input type="submit" name="submit" value="Save">
</form>
