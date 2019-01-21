<?php
require_once __DIR__ . '/../bootstrap.php';

$accessToken = new \Symfony\Component\HttpFoundation\Cookie("access_token", "Expired",
          time() -3600, '/php_reflection', getenv('COOKIE_DOMAIN'));
          redirect('/php_reflection', ['cookies' => [$accessToken]]);