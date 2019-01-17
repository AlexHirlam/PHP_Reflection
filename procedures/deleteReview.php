<?php

require_once __DIR__ . '/../inc/header.php';
require_once __DIR__ . '/../bootstrap.php';

$review = getReview(request()->get('review_ID'));

deleteReview($review['review_ID']);

Redirect('/php_reflection/reviews.php', false);