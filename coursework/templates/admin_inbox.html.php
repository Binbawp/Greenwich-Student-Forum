<h2>Admin Inbox</h2>

<?php if (empty($senders)): ?>
    <p>You have no messages yet.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Sender Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($senders as $sender): ?>
            <tr>
                <td><?=htmlspecialchars($sender['user_email'], ENT_QUOTES, 'UTF-8')?></td>
                <td>
                    <a href="../admin/view_conversation.php?email=<?=urlencode($sender['user_email'])?>">View</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>