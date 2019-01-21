<?php 
require_once __DIR__ . '/../bootstrap.php';
requireAuth();


$currPassword = request()->get('current_password');
$newPassword = request()->get('password');
$confirmPassword = request()->get('confirm_password');


if ($newPassword != $confirmPassword) {
    $session->getFlashBag()->add('error', 'New passwords do not match, please try again.');
    redirect('/php_reflection/account.php');
}

$user = findUserByAccessToken();

if (empty($user)) {
    $session->getFlashBag()->add('error', 'Some Error Happened. Try again. If it continues please log out and log back in.');
    redirect('/php_reflection/account.php');
}

if (!password_verify($currPassword, $user['password'])) {
    $session->getFlashBag()->add('error', 'Current Password is incorrect, please try again.');
    redirect('/php_reflection/account.php');
}

$updated = updatePassword(password_hash($newPassword, PASSWORD_DEFAULT), $user['id']);

if (!$updated) {
    $session->getFlashBag()->add('error', 'Could not update password, Please try again.');
    redirect('/php_reflection/account.php');
}

$session->getFlashBag()->add('success', 'Password Updated');
redirect('/php_reflection/account.php');
