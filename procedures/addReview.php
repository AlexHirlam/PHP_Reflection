<?php
require_once __DIR__ . '/../inc/header.php';
require_once __DIR__ . '/../bootstrap.php';


$gametitle = request()->get('gametitle');
$review_description = request()->get('review_description');
$overall_rating = request()->get('overall_rating');

$user = findUserByAccessToken();

$createdBy = $user['username'];



try {
    $newReview = addReview($gametitle, $review_description, $overall_rating, $createdBy);
    $response = \Symfony\Component\HttpFoundation\Response::create(null, \Symfony\Component\HttpFoundation\Response::HTTP_FOUND,['Location' => '/../php_reflection/reviews.php']);
    $response->send();
    exit;
} catch (\Exception $e) {
    $response = \Symfony\Component\HttpFoundation\Response::create(null, \Symfony\Component\HttpFoundation\Response::HTTP_FOUND,['Location' => '/../php_reflection/add.php']);
    $response->send();
    exit;
    $e->getMessage();
}