<?php 
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/inc/header.php';
?>




<div class="container">
    <div class="well col-sm-6 col-sm-offset-3">

    <!-- <form class="form-horizontal" method="post" action="/php_reflection/procedures/addReview.php">
         <?php //include_once __DIR__ .'/inc/reviewForm.php'; ?>
    </form> -->


        <form class="form-signin" method="post" action="/procedures/doRegister.php">
            <h2 class="form-signin-heading">Registration</h2>
            <?php //print display_errors(); ?>
            <label for="inputEmail" class="sr-only">First Name</label>
            <input type="firstName" id="inputFirstName" name="email" class="form-control" placeholder="First Name" required autofocus>
            <br>
            <label for="inputEmail" class="sr-only">Last Name</label>
            <input type="lastName" id="inputLastName" name="email" class="form-control" placeholder="Last Name" required autofocus>
            <br>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
            <br>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <br>
            <label for="inputPassword" class="sr-only">Confirm Password</label>
            <input type="password" id="inputPassword" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        </form>
    </div>
</div>

