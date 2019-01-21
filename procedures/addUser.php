<?php

require_once __DIR__ . '/../bootstrap.php';


$username = request()->get('username');
$email = request()->get('email');
$password = request()->get('password');
$confirmPassword = request()->get('confirm_password');

if ($password != $confirmPassword) {
    redirect('/php_reflection/register.php');
}
    
$user = findUserByName($username);
if (!empty($user)) {
    redirect('/php_reflection/register.php');
}


$hashed = password_hash($password, PASSWORD_BCRYPT);

$user = register($username, $email, $hashed);

redirect('/php_reflection');    
