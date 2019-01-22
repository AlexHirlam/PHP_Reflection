
<?php

require_once __DIR__ . '/inc/header.php';
require_once __DIR__ . '/bootstrap.php';
require_once 'background.php';
requireAuth();
// requireAdmin();

$user = findUserByAccessToken();
$createdBy = $user['username'];



$review = getReview(request()->get('review_ID'));



if ($user['username'] == $review['createdBy'] || $user['role_id'] == 1 ) {

} else {
    redirect('/php_reflection/reviews.php');
}


$gametitle = $review['gametitle'];
$review_description = $review['review_description'];
$buttonText = 'Update Review';
?>
<div class="container add">
    <div class="well">
        <h2>Update Review</h2>
        
        <form class="form-horizontal" method="post" action="/php_reflection/procedures/editReview.php">
            <input type="hidden" name="review_ID" value="<?php echo $review['review_ID']; ?>" />
            <?php include_once __DIR__ .'/inc/reviewForm.php'; ?>
        </form>
        
    </div>
</div>