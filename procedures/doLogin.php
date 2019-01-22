<?php

require_once __DIR__ . '/../bootstrap.php';

$user = findUserByName(request()->get('username'));
if (empty($user)) {
    $session->getFlashBag()->add('error', 'Username was not found');
    redirect('/php_reflection/login.php');
}

if (!password_verify(request()->get('password'), $user['password'])) {
    $session->getFlashBag()->add('error', 'Password or Username was incorrect');
    redirect('/php_reflection/login.php');

}


echo $user['username'];


$expTime = time() + 3600;

$jwt = \Firebase\JWT\JWT::encode([
    'iss' => request()->getBaseUrl(),
    'sub' => "{$user['ID']}",
    'exp' => $expTime,
    'iat' => time(),
    'nbf' => time(),
    'is_admin' => $user['role_id'] == 1
    ], getenv("SECRET_KEY"), 'HS256');

$accessToken =  new Symfony\Component\HttpFoundation\Cookie('access_token', $jwt, $expTime, '/php_reflection', getenv('COOKIE_DOMAIN'));

redirect('/php_reflection',['cookies' => [$accessToken]]);