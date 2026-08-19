<h2>Manage Modules</h2>
<p><a href="editmodule.php">Add a new module</a></p>

<table>
    <thead>
        <tr>
            <th>Module Name</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($modules as $module): ?>
        <tr>
            <td><?=htmlspecialchars($module['moduleName'], ENT_QUOTES, 'UTF-8')?></td>
            <td>
                <a href="editmodule.php?id=<?=$module['id']?>">Edit</a>
            </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?=$module['id']?>">
                    <input type="hidden" name="action" value="delete">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>