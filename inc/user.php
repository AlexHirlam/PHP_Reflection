
<div class="media well">

            <div class="media-body">
              <h4 class="media-heading">
              
                <?php 
                echo $user['ID']; 
                echo "<br />";
                echo $user['username']; 
                echo "<br />";
                echo $user ['email']; 
                ?>
                

                    <p>
                    <span><a href="/php_reflection/edit.php?review_id=<?php echo $review['review_id']; ?>">Edit</a> | </span>
                    <span><a href="/php_reflection/delete.php?review_id=<?php echo $review['review_id']; ?>">Delete</a></span>
                    </p>
            </div>

        </div>