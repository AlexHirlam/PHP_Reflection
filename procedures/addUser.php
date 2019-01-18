<?php

require_once __DIR__ . '/../bootstrap.php';


$username = request()->get('username');
$email = request()->get('email');
$password = request()->get('password');
$confirmPassword = request()->get('confirm_password');

if ($password != $confirmPassword) {
    Redirect('/php_reflection/register.php', false);
}
    
$user = findUserByName($username);
if (!empty($user)) {
    Redirect('/php_reflection/register.php', false);
}

$hashed = password_hash($password, PASSWORD_BCRYPT);

$user = register($username, $email, $hashed);

Redirect('/php_reflection', false);    
