<?php



$user = findUserByName(request()->get('username'));
$username = $user['username'];
?>

<div class="media well">

<!-- <div class="media-left">
                <div class="btn-group-vertical" role="group">
                    <a href="/procedures/vote.php?vote=up&review_id=<?php echo $review['review_id']; ?>">
                    <span class="glyphicon glyphicon-triangle-top"></span></a>
                    <span><?php if (isset($review['score'])) echo $review['score']; else echo '0'; ?></span>
                    <a href="/procedures/vote.php?vote=down&review_id=<?php echo $review['review_id']; ?>">
                    <span class="glyphicon glyphicon-triangle-bottom"></span></a>
                </div>
            </div> -->


            <div class="media-body">

                <?php 
                echo "<h2 class='media-title'>";
                echo $review['gametitle']; 
                echo "</h2>";
                echo "<h4>";
                echo "    - Written By: ";
                echo $user['usename'];
                echo "</h4>";

                echo "<br />";

                echo "<div class='description container'>";
                    echo "<h4>Review:</h4>";
                    echo $review['review_description']; 

                            // $review = getReview(request()->get('review_ID'));
                            // var_dump($review);
                            // $gametitle = $review['gametitle'];
                            // $review_description = $review['review_description'];
                            // $buttonText = 'Update Review';
                    

                echo "</div>";

                echo "<a class='read-more' href='/php_reflection/reviewFull.php?review_ID=";
                echo $review['review_ID'];
                echo "'>Read More</a>";

                echo "<br />";

                echo "<h2 class='rating-number'>";
                    echo $review ['overall_rating']; 
                    echo "/10";
                echo "</h2>";
                
                echo 'id ' .  $review ['review_ID']; ?>

                    <p>
                    <span><a href="/php_reflection/edit.php?review_ID=<?php echo $review['review_ID']; ?>">Edit</a> | </span>
                    <span><a class="delete" href="/php_reflection/procedures/deleteReview.php?review_ID=<?php echo $review['review_ID']; ?>">Delete</a></span>
                    </p>
            </div>
        </div>