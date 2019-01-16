<?php
require_once __DIR__ . '/inc/header.php';
require_once __DIR__ . '/bootstrap.php';

$review = getReview(request()->get('review_ID'));
var_dump($review);
$gametitle = $review['gametitle'];
$review_description = $review['review_description'];
$overall_rating = $review['overall_rating'];
$buttonText = 'Update Review';
?>
<div class="container">
    <div class="well">
        <h2>Delete Review</h2>

            <h3> Are you sure you want to delete this Review: <br />
            <?php echo $gametitle; ?> - You gave it a <?php echo $overall_rating; ?>/10</h3>
        <form class="form-horizontal" method="post" action="/php_reflection/procedures/deleteReview.php">
            <input type="hidden" name="review_id" value="<?php echo $review['review_ID']; ?>" />
            <button>Yes</button>
            <button>No</button>
        </form>
        
    </div>
</div>
<?php
require_once __DIR__ . '/inc/footer.php';