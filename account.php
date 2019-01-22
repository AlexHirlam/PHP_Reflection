
<?php 
require_once __DIR__ . '/bootstrap.php';
requireAuth();
require_once __DIR__ . '/inc/header.php';
require_once 'background.php';

    //notify home page that we are logged in:
        // print '<pre>';
        // echo request();
        // print '</pre>';

?>


<div class="container add">
<div class="well col-sm-6 col-sm-offset-3">
        <form class="form-signin" method="post" action="/php_reflection/procedures/changePassword.php">
            <h2 class="form-signin-heading">My Account</h2>
            <h4>Account Information:</h4>
                <?php $user = findUserByAccessToken(); 
                    echo "Username: " . $user['username']; 
                    echo "<br />";
                    echo "Email Address: " . $user['email'];
                    echo "<br />";
                    echo "User Status: ";
                     if ($user['role_id'] == 2) {
                        echo "Normal User";
                    } elseif ($user['role_id'] == 1) {
                        echo "Admin";
                    }
                
                ?>
            <h4>Change Password</h4>
            <?php print display_errors(); ?>
            <?php print display_success(); ?>
            <label for="inputCurrentPassword" class="sr-only">Current Password</label>
            <input type="password" id="inputCurrentPassword" name="current_password" class="form-control" placeholder="Current Password" required autofocus>
            <br>
            <label for="inputPassword" class="sr-only">New Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="New Password" required>
            <br>
            <label for="inputPassword" class="sr-only">Confirm New Password</label>
            <input type="password" id="inputPassword" name="confirm_password" class="form-control" placeholder="Confirm New Password" required>
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Change Password</button>
        </form>
    </div>
</div>


