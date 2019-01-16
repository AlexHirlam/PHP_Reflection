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
              <h4 class="media-heading">
              
                <?php 
                echo $review['gametitle']; 
                echo "<br />";
                echo $review['review_description']; 
                echo "<br />";
                echo $review ['overall_rating']; ?>/10</h4>
                <?php echo $review ['review_ID']; ?>

                    <p>
                    <span><a href="/php_reflection/edit.php?review_ID=<?php echo $review['review_ID']; ?>">Edit</a> | </span>
                    <span><a href="/php_reflection/procedures/deleteReview.php?review_ID=<?php echo $review['review_ID']; ?>">Delete</a></span>
                    </p>
            </div>
        </div>