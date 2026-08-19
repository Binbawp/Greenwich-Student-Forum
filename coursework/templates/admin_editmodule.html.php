<form action="" method="post">
    <input type="hidden" name="id" value="<?=$module['id'] ?? ''?>">
    
    <label for="moduleName">Module Name:</label>
    <input type="text" id="moduleName" name="moduleName" value="<?=$module['moduleName'] ?? ''?>" required>
    
    <input type="submit" name="submit" value="Save Module">
</form>