<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/inc/header.php';
require_once 'background.php';
?>
<div class="container add">
    <div class="well">
        <h2>List of Users</h2>        
        <?php 
        foreach (getAllUsers() as $user) {
            include __DIR__ . '/inc/user.php';
        }

        ?>
        
    </div>
</div>
<?php
require_once __DIR__ . '/inc/footer.php';