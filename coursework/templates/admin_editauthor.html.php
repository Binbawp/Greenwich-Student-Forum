<form action="" method="post">
    <input type="hidden" name="id" value="<?=$author['id'] ?? ''?>">
    
    <label for="name">Username:</label>
    <input type="text" id="name" name="name" value="<?=$author['name'] ?? ''?>" required>
    
    <input type="submit" name="submit" value="Save User">
</form>