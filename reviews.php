<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/inc/header.php';
?>
<div class="container">
    <div class="well">
        <h2>Review List</h2>
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