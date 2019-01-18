<?php
require_once __DIR__ . '/inc/header.php';
require_once 'background.php';
require_once __DIR__ . '/bootstrap.php';
?>
<div class="container add">
    <div class="well">
        <h2>Add a review</h2>
        
        <form class="form-horizontal" method="post" action="/php_reflection/procedures/addReview.php">
        <?php include_once __DIR__ .'/inc/reviewForm.php'; ?>
        </form>
        
    </div>
</div>

