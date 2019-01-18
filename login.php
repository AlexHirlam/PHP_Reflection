<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/inc/header.php';


?>

<div class="container add">
    <div class="well col-sm-6 col-sm-offset-3">
        <form class="form-signin" method="post" action="/procedures/doLogin.php">
            <h2 class="form-signin-heading">Please sign in</h2>
            <?php // echo display_errors(); ?>
            <?php // echo display_success(); ?>
            <label for="username" class="sr-only">Username</label>
            <input type="username" id="username" name="emausernameil" class="form-control" placeholder="Username" required autofocus>
            <br>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div>
</div>


