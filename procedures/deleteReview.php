<?php

require_once __DIR__ . '/../inc/header.php';
require_once __DIR__ . '/../bootstrap.php';
requireAuth();

$review = getReview(request()->get('review_ID'));

deleteReview($review['review_ID']);

redirect('/php_reflection/reviews.php');