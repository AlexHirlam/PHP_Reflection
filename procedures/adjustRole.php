<?php 

require_once __DIR__ . '/../bootstrap.php';

$userId = request()->get('userId');
$role = request()->get('role');

switch (strtolower($role)) {
    case 'promote':
        promote($userId);
        $session->getFlashBag()->add('success', "Promoted to Admin!");
        break;
    case 'demote':
        demote($userId);
        $session->getFlashBag()->add('success', "Demoted from Admin!");
        break;
}
redirect('/php_reflection/admin.php'); 

$jwt = \Firebase\JWT\JWT::encode([
    'iss' => request()->getBaseUrl(),
    'sub' => "{$user['ID']}",
    'exp' => $expTime,
    'iat' => time(),
    'nbf' => time(),
    'is_admin' => $user['role_id'] == 1
    ], getenv("SECRET_KEY"), 'HS256');