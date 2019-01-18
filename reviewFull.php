
<?php

require_once __DIR__ . '/inc/header.php';
require_once __DIR__ . '/bootstrap.php';
require_once 'background.php';

$review = getReview(request()->get('review_ID'));
$gametitle = $review['gametitle'];
$review_description = $review['review_description'];

$user = findUserByName(request()->get('username'));
$username = $user['username'];

?> 

<div class="add well container full-review">
<a href="/php_reflection/reviews.php"><button class="btn btn-info">View All Reviews</button></a>
    <?php 
    echo "<h2 class='media-title'>";
    echo $review['gametitle']; 
    echo "</h2>";
    echo "<h3>";
    echo "    - Written By: ";
    echo $user['usename'];
    echo "</h3>";

    echo "<br />";

    echo "<div class='description-full container'>";
        echo "<h4>Review:</h4>";
        echo $review['review_description']; 


    echo "</div>";

    echo "<br />";

    echo "<h2 class='rating-number'>";
        echo $review ['overall_rating']; 
        echo "/10";
    echo "</h2>";

    echo 'id ' .  $review ['review_ID']; ?>

</div>

    <?php
    require_once __DIR__ . '/footer.php';

