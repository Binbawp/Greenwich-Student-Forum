<h2>Manage Users</h2>
<p><a href="editauthor.php">Add a new user</a></p>

<table>
    <thead>
        <tr>
            <th>Username</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($authors as $author): ?>
        <tr>
            <td><?=htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8')?></td>
            <td>
                <a href="editauthor.php?id=<?=$author['id']?>">Edit</a>
            </td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?=$author['id']?>">
                    <input type="hidden" name="action" value="delete">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>