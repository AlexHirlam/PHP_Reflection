<?php
require_once __DIR__ . '/inc/header.php';
require_once 'background.php';
require_once __DIR__ . '/bootstrap.php';


requireAdmin();

?>
<div class="container add">
    <div class="well">
        <h2>Admin</h2>
        <?php echo display_errors(); ?>
        <?php echo display_success(); ?>
        <div class="panel">
            <h4>Users</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Promote/Demote</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach (getAllUsers() as $user): ?>
                    <tr>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['owner_id']; ?></td>
                        <td>
                        <?php if (!isOwner($user['ID'])): ?>
                            <?php if ($user['role_id'] == 1): ?>
                            <a href="/php_reflection/procedures/adjustRole.php?role=demote&userId=<?php echo $user['ID']; ?>" class="bt btn-xs btn-warning">Demote from Admin</a>
                            <?php elseif ($user['role_id'] == 2): ?>
                            <a href="/php_reflection/procedures/adjustRole.php?role=promote&userId=<?php echo $user['ID']; ?>" class="bt btn-xs btn-success">Promote to Admin</a>
                            <?php endif; ?>
                        <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>
