<?php 
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/inc/header.php';
require_once 'background.php';
?>


<div class="container add">
    <div class="well col-sm-6 col-sm-offset-3">


        <form class="form-signin" method="post" action="/php_reflection/procedures/addUser.php">
            <h2 class="form-signin-heading">Registration</h2>
            <?php //print display_errors(); ?>
            <label for="username" class="sr-only">Username</label>
            <input type="username" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
            <br>
            <label for="email" class="sr-only">Email Address</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required autofocus>
            <br>
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            <br>
            <label for="confirm_password" class="sr-only">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        </form>
    </div>
</div>

