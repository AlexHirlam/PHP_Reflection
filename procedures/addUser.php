<<<<<<< HEAD
<?php

require_once __DIR__ . '/../bootstrap.php';


$username = request()->get('username');
$email = request()->get('email');
$password = request()->get('password');
$confirmPassword = request()->get('confirm_password');

if ($password != $confirmPassword) {
    // Redirect('/php_reflection/register.php', false);
    Redirect('/register.php', false);
}
    
$user = findUserByName($username);
if (!empty($user)) {
    Redirect('/php_reflection/register.php', false);
}

$hashed = password_hash($password, PASSWORD_BCRYPT);

$user = register($username, $email, $hashed);

Redirect('/php_reflection', false);    




=======
<?php

require_once __DIR__ . '/../bootstrap.php';


$username = request()->get('username');
$email = request()->get('email');
$password = request()->get('password');
$confirmPassword = request()->get('confirm_password');

if ($password != $confirmPassword) {
    Redirect('/register.php', false);
}
    
$user = findUserByName($username);
if (!empty($user)) {
    Redirect('/register.php', false);
}

    try {
        $newReview = addReview($username, $email, $password, $confirmPassword);
        $response = \Symfony\Component\HttpFoundation\Response::create(null, \Symfony\Component\HttpFoundation\Response::HTTP_FOUND,['Location' => '/../php_reflection/reviews.php']);
        $response->send();
        exit;
    } catch (\Exception $e) {
        $response = \Symfony\Component\HttpFoundation\Response::create(null, \Symfony\Component\HttpFoundation\Response::HTTP_FOUND,['Location' => '/../php_reflection/add.php']);
        $response->send();
        exit;
        $e->getMessage();
    }




>>>>>>> 315850a75637b7e18d1aa8ed178a453ed1ff67dd
