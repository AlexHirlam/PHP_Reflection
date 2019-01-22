<?php
require_once __DIR__ . '/../bootstrap.php';
?>

<div class="header container-fluid ">

    <div class="left-header">
        <a href="/php_reflection"><img class="logo" src="/php_reflection/images/logo.png"></a>
        <h3 class="headline">A Simple but Effective Review Site</h3>
    </div>

    <div class="right-header">
    <?php if (!isAuthenticated()) : ?>
        <a href="/php_reflection/login.php"><button class="btn-lg btn-default"> Login </button></a>
        <a href="/php_reflection/register.php"><button class="btn-lg btn-default"> Register </button></a>
    <?php else: ?>
        <a href="/php_reflection/account.php"><button class="btn-lg btn-default"> My Account </button></a>
        <a href="/php_reflection/admin.php"><button class="btn-lg btn-default btn-admin-pos"> Admin Page </button></a>
        <a href="/php_reflection/procedures/doLogout.php"><button class="btn-lg btn-default"> Logout </button></a>

    <?php endif; ?>
    </div>

</div>