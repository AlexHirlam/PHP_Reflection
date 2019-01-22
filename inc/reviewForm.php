
<div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="gametitle" name="gametitle" maxlength="60" placeholder="Game Title" value="<?php if (isset($gametitle)) echo $gametitle; ?>">
    </div>
</div>
<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        <textarea name="review_description" class="form-control" rows="5" maxlength="100000" placeholder="Your Review of the game"><?php if (isset($review_description)) echo $review_description; ?></textarea>
    </div>
</div>
<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Overall Rating out of 10</label>
    <div class="col-sm-10">
     <input type="number" min="0" max="10" class="form-control" id="overall_rating" name="overall_rating" placeholder="Game Rating" value="<?php if (isset($overall_rating)) echo $overall_rating; ?>">    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default"><?php if (isset($buttonText)) echo $buttonText; else echo "Add Review"; ?></button>
    </div>

</div>