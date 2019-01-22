<?php

require_once __DIR__ . '/../inc/header.php';
require_once __DIR__ . '/../bootstrap.php';
requireAuth();


$user = findUserByAccessToken();
$createdBy = $user['username'];


$review = getReview(request()->get('review_ID'));

if ($user['username'] == $review['createdBy'] || $user['role_id'] == 1 ) {

} else {
    redirect('/php_reflection/reviews.php');
}

deleteReview($review['review_ID']);

redirect('/php_reflection/reviews.php');