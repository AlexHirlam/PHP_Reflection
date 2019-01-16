<?php
require_once __DIR__ . '/../inc/header.php';
require_once __DIR__ . '/../bootstrap.php';

$review_id = request()->get('review_id');
$gametitle = request()->get('gametitle');
$review_description = request()->get('review_description');
$overall_rating = request()->get('overall_rating');

try {
    $newReview = editReview($review_id, $gametitle, $review_description, $overall_rating);
    $response = \Symfony\Component\HttpFoundation\Response::create(null, \Symfony\Component\HttpFoundation\Response::HTTP_FOUND,['Location' => '/../php_reflection/reviews.php']);
    $response->send();
    exit;
} catch (\Exception $e) {
    $response = \Symfony\Component\HttpFoundation\Response::create(null, \Symfony\Component\HttpFoundation\Response::HTTP_FOUND,['Location' => '/../php_reflection/reviews.php']);
    $response->send();
    exit;
}