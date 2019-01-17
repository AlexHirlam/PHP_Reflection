<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/inc/header.php';
require_once 'background.php';
?>
<div class="container add">
    <div class="well">
        <h1>Review List</h1>
        <a href="/php_reflection/add.php"><button class="btn btn-active">Add new Review</button></a> 
        
        <?php 
        foreach (getAllReviews() as $review) {
            include __DIR__ . '/inc/review.php';
        }
        

        ?>
        
    </div>
</div>
<?php
require_once __DIR__ . '/inc/footer.php';