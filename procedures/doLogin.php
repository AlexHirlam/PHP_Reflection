<?php

require_once __DIR__ . '/../bootstrap.php';

$user = findUserByName(request()->get('username'));
if (empty($user)) {
    Redirect('/php_reflection/login.php', false);
}

if (!password_verify(request()->get('password'), $user['password'])) {
    Redirect('/php_reflection/login.php', false);

}


echo $user['username'];






// $expTime = time() + 3600;

// $jwt = \Firebase\JWT\JWT::encode([
//     'iss' => request()->getBaseUrl(),
//     'sub' => "{$user['id']}",
//     'exp' => $expTime,
//     'iat' => time(),
//     'nbf' => time(),
//     'is_admin' => $user['role_id'] == 1
//     ], getenv("SECRET_KEY"), 'HS256');

// $accessToken =  new Symfony\Component\HttpFoundation\Cookie('access_token', $jwt, $expTime, '/', getenv('COOKIE_DOMAIN'));